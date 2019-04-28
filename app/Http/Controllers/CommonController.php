<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use App\Course;
use App\Lecturer;

class CommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        switch ( Auth::user()->user_type ) {
          case config('const.user_type.student'):

            $courses = Course::all();
            $lecturers = Lecturer::where('id','!=',1)->get(); //sys-admin id =1
            return view('student.profile',compact('courses','lecturers'));
            break;

          case config('const.user_type.lecturer'):

            // $courses = Course::all();
            // $lecturers = Lecturer::where('id','!=',1)->get(); //sys-admin id =1
            return view('lecturer.profile');
            break;

          default:
            // code...
            break;
        }

    }

    public function change_password(Request $request)
    {
        $this->validate($request,[
          'current_pwd' => 'required',
          'new_pwd' => 'required',
          'confirm_pwd' => 'required',
        ]);

        $user = Auth::user();

        if(  Hash::make($request->current_pwd)  != Auth::user()->password ) {
          Session::flash('error','Wrong Current password');
          return redirect()->back();
        }

        if( $request->new_pwd != $request->confirm_pwd ) {
          Session::flash('error','New and confirm password dont match');
          return redirect()->back();
        }

        $user->password = $request->new_pwd;
        $user->update();


    }
}
