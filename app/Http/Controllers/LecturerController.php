<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Complaint;
use App\ComplaintReply;
use App\ComplaintHandler;
use App\ComplaintHistory;
use Auth;

class LecturerController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware(['role:lecturer']);
  }


    public function index()
    {
      return view('lecturer.index');
    }

    public function complaints()
    {
      if(ComplaintHandler::where('lecturer_id',Auth::user()->lecturer->id)->exists()){

        $handlers = ComplaintHandler::where('lecturer_id',Auth::user()->lecturer->id)->get();

        $complaints_1 = collect();
        foreach ($handlers as $handler) {
          ComplaintHistory::where('complaint_handler_id',$handler->id)
                            ->each(function($h) use (&$complaints_1){
                              $complaints_1->add($h);
                            });
        }
        $complaints_2 = collect();
        ComplaintHistory::where('lecturer_id', Auth::user()->lecturer->id)->each(function($h) use (&$complaints_2){
          $complaints_2->add($h);
        });
        // $complaints = $complaints->unique('complaint_id');
        $complaints = collect();
        $chs = ($complaints_1->merge($complaints_2))->unique('complaint_id');

          foreach ($chs as $ch) {
            $complaints->add($ch->complaint);

          }


      }else{
        $complaints = Complaint::where('lecturer_id', Auth::user()->lecturer->id)->orderBy('updated_at','desc')->get();
      }

      return view('lecturer.complaints',compact('complaints'));
    }

    public function show($complaint_id)
    {

      $complaint = Complaint::find($complaint_id);
      $complaint_replies = ComplaintReply::where('complaint_id',$complaint_id)->paginate(10);
      $history =ComplaintHistory::where('complaint_id',$complaint_id)->orderBy('created_at','desc')->get();
      return view('lecturer.show',compact('complaint','complaint_replies','history'));
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
