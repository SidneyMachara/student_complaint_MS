<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Lecturer;
use App\Complaint;
use App\ComplaintAttachment;
use App\ComplaintReply;

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


      return redirect()->back();
    }

    public function show($complaint_id)
    {

      $courses = Course::all();
      $lecturers = Lecturer::all();
      $complaint = Complaint::find($complaint_id);
      $complaint_replies = ComplaintReply::where('complaint_id',$complaint_id)->paginate(15);

      return view('student.show',compact('courses','lecturers','complaint','complaint_replies'));
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
}
