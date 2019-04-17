<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\lecturer;
use App\Course;
use App\Position;
use App\ComplaintHandler;
use App\Complaint;
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
      $year = date("Y");
      $complaints = Complaint::whereYear('created_at', $year )->get(); //complaints for this year

      $complaint_stats = stats($complaints);

      return view('sys_admin.index',array(
                          'complaints_per_month'          => $complaint_stats['complaints_per_month'],
                          'solved_complaints_per_month'   => $complaint_stats['solved_complaints_per_month'],
                          'unsolved_complaints_per_month' => $complaint_stats['unsolved_complaints_per_month'],
                          'students' => count(Student::all()),
                          'lecturers' => count(Lecturer::where('id','!=',1)->get()),
                        ));

    }

    public function students()
    {
      $students = Student::all();
      return view('sys_admin.students.index',compact('students'));
    }


    public function store_student(Request $request)
    {
       $request->validate([
          'fullname' => 'required',
      ]);


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

      $request->session()->flash('success', 'Task was successful!');
      return redirect()->back();
    }


    public function lecturers()
    {
      $lecturers = Lecturer::where('id','!=',1)->get(); //sys-admin id =1
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

      $request->session()->flash('success', 'Task was successful!');
      return redirect()->back();
    }

    public function config()
    {
      $courses = Course::paginate(6);
      $lecturers = Lecturer::where('id','!=',1)->get(); //sys-admin id =1
      $positions = Position::all();
      $grade_handers = ComplaintHandler::where('complaint_type', config('const.complaint_type.grade'))->get();
      $lecturer_handers = ComplaintHandler::where('complaint_type', config('const.complaint_type.lecturer'))->get();
      return view('sys_admin.config.index',compact('courses','lecturers','grade_handers','lecturer_handers','positions'));
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
    public function add_position(Request $request)
    {
      //TODO : validate duplicate

      $position = new Position;
      $position->title = $request->position_title;
      $position->save();

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
          $handler->position_id = $request->position_id;
          $handler->save();

          $request->session()->flash('success', 'Task was successful!');
          return redirect()->back();
       }

       $request->session()->flash('error', 'Task Failed!');
        return redirect()->back();
      }
}
