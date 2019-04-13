<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Complaint;
use App\ComplaintReply;
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

      $complaints = Complaint::where('lecturer_id', Auth::user()->lecturer->id)->get();
      return view('lecturer.complaints',compact('complaints'));
    }

    public function show($complaint_id)
    {

      $complaint = Complaint::find($complaint_id);
      $complaint_replies = ComplaintReply::where('complaint_id',$complaint_id)->paginate(10);
      return view('lecturer.show',compact('complaint','complaint_replies'));
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
