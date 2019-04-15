<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Lecturer;
use App\Complaint;
use App\ComplaintAttachment;
use App\ComplaintReply;
use App\ComplaintHistory;
use App\ComplaintHandler;

use Auth;

class StudentComplaintController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:student']);
    }

    public function index()
    {
      $courses = Course::all();
      $lecturers = Lecturer::all();
      $complaints = Complaint::where('student_id',Auth::user()->student->id)->orderBy('updated_at','desc')->get();
      return view('student.index',compact('courses','lecturers','complaints'));
    }

    public function note()
    {
      $courses = Course::all();
      $lecturers = Lecturer::all();
      return view('note',compact('courses','lecturers'));
    }


    public function store_complaint(Request $request)
    {

      $this->validate($request,[
        'c_files.*' => 'image|nullable|mimes:jpeg,png,jpg'
        // 'c_files.*' => 'image|nullable|max:1999|mimes:jpeg,png,jpg'
      ]);

      $complaint = new Complaint;
      $complaint->student_id = Auth::user()->student->id;
      $complaint->lecturer_id = $request->lecturer_id;
      $complaint->course_id = $request->course_id;
      $complaint->complaint_type = $request->complaint_type;
      $complaint->status = config('const.complaint_status.unsolved');
      $complaint->title = $request->title;
      $complaint->body = $request->body;
      $complaint->save();


      //handle file upload
      if($request->hasFile('c_files')){

        foreach ($request->c_files as $file) {

          //get filename with th extention
          $filenameWithExt = $file->getClientOriginalName();
          //get file name
          $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);
          //get uopz_extend
          $extension = $file->getClientOriginalExtension();
          //file to Store
          $fileNameToStore = $fileName.'_'.time().'.'.$extension;
          //upload
          $path = $file->storeAs('public/complaint_files',$fileNameToStore);

          $attch = new ComplaintAttachment;
          $attch->complaint_id = $complaint->id;
          $attch->attachment = $fileNameToStore;
          $attch->type = $file->extension();
          $attch->save();
        }

      }

      $history = new ComplaintHistory;
      $history->complaint_id = $complaint->id;
      $history->lecturer_id = $complaint->lecturer_id;
      $history->complaint_handler_id = -1; //not yet at handelr level
      $history->is_active = config('const.is_active.true');
      $history->save();


      return redirect()->back();
    }

    public function show($complaint_id)
    {

      $courses = Course::all();
      $lecturers = Lecturer::all();
      $complaint = Complaint::find($complaint_id);
      $complaint_replies = ComplaintReply::where('complaint_id',$complaint_id)->paginate(10);
      $history = ComplaintHistory::where('complaint_id',$complaint_id)->orderBy('created_at','desc')->get();

      return view('student.show',compact('courses','lecturers','complaint','complaint_replies','history'));
    }

    public function reply(Request $request)
    {
      $reply = new ComplaintReply;
      $reply->complaint_id = $request->complaint_id;
      $reply->user_id = Auth::user()->id;
      $reply->reply_to = -1;
      $reply->body = $request->body;
      $reply->save();

      return redirect()->back();
    }

    public function escalate(Request $request)
    {

      if(count(ComplaintHandler::where('complaint_type',$request->complaint_type)->get()) > 0) {
        $latest_complain_history = ComplaintHistory::where('complaint_id',$request->complaint_id)->latest()->first();

        if($latest_complain_history->complaint_handler_id == -1) { //if  hasnt been assigned to hander (still at lecturer level)
          $next_handler = ComplaintHandler::where('complaint_type',$request->complaint_type)->first()->id;
        }else{

          $last_handler_level = ComplaintHandler::where('complaint_type',$request->complaint_type)->max('level');
  // dd($latest_complain_history->complaint_handler());
          if($latest_complain_history->complaint_handler->level  < $last_handler_level){

            $next_handler = ComplaintHandler::where([
                                                ['complaint_type',$request->complaint_type],
                                                ['level',( $latest_complain_history->complaint_handler->level + 1 )]
                                              ])->first()->id;

          }else{
            return redirect()->back();
          }

        }

        $history = new ComplaintHistory;
        $history->complaint_id = $request->complaint_id;
        $history->lecturer_id = $latest_complain_history->lecturer_id;
        $history->complaint_handler_id = $next_handler; //not yet at handelr level
        $history->is_active = config('const.is_active.true');
        $history->save();

        return redirect()->back();
      }
      return redirect()->back();
    }

    public function solved(Request $request)
    {
      $complaint = Complaint::find($request->complaint_id);
      $complaint->status = config('const.complaint_status.solved');
      $complaint->save();

      return redirect()->back();
    }
}
