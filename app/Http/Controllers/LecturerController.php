<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Complaint;
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
      return view('lecturer.show',compact('complaint'));
    }
}
