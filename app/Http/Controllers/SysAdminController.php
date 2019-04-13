<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\lecturer;
use App\Course;
use App\ComplaintHandler;
use Illuminate\Support\Facades\Hash;

class SysAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:sys_admin']);
    }

    public function index()
    {
      return view('sys_admin.index');
    }

    public function students()
    {
      $students = Student::all();
      return view('sys_admin.students.index',compact('students'));
    }


    public function store_student(Request $request)
    {
      //TODO :validate


      $user = new User;
      $user->name = $request->fullname;
      $user->email = $request->email;
      $user->password = Hash::make($request->studentId);
      $user->user_type = config('const.user_type.student');
      $user->save();

      $user->assignRole('student');

      $student = new Student;
      $student->user_id = $user->id;
      $student->student_id = $request->studentId;
      $student->save();

      return redirect()->back();
    }


    public function lecturers()
    {
      $lecturers = Lecturer::all();
      return view('sys_admin.lecturers.index',compact('lecturers'));
    }

    public function store_lecturer(Request $request)
    {
      //TODO :validate


      $user = new User;
      $user->name = $request->fullname;
      $user->email = $request->email;
      $user->password = Hash::make($request->lecturerId);
      $user->user_type = config('const.user_type.lecturer');
      $user->save();

       $user->assignRole('lecturer');

      $lecturer = new Lecturer;
      $lecturer->user_id = $user->id;
      $lecturer->lecturer_id = $request->lecturerId;
      $lecturer->save();

      return redirect()->back();
    }

    public function config()
    {
      $courses = Course::paginate(6);
      $lecturers = Lecturer::all();
      $grade_handers = ComplaintHandler::where('complaint_type', config('const.complaint_type.grade'))->get();
      $lecturer_handers = ComplaintHandler::where('complaint_type', config('const.complaint_type.lecturer'))->get();
      return view('sys_admin.config.index',compact('courses','lecturers','grade_handers','lecturer_handers'));
    }

    public function add_course(Request $request)
    {
      //TODO : validate duplicate

      $course = new Course;
      $course->course_code = $request->course_code;
      $course->save();

      $request->session()->flash('success', 'Task was successful!');
      return redirect()->back();
    }

    public function add_handler(Request $request)
    {
      $grade_handlers = ComplaintHandler::where('complaint_type',$request->complaint_type)->get();

      if( $grade_handlers->where('lecturer_id',$request->lecturer_id )->count() < 1) {
          $highest_level = $grade_handlers->max('level');

          $handler = new ComplaintHandler;
          $handler->level = $highest_level == null ? 1: ($highest_level + 1);
          $handler->complaint_type = $request->complaint_type;
          $handler->lecturer_id = $request->lecturer_id;
          $handler->save();

          return redirect()->back();
       }


        return redirect()->back();
      }
}
