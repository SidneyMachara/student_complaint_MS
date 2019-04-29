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
          'email'    => 'unique:users,email'
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

    public function edit_student(Request $request)
    {

          $request->validate([
             'edit_student_email'    => 'unique:users,email'
         ]);

        $student =  Student::find($request->edit_id);
        $user = User::find($student->user_id);

        $user->email = $request->edit_student_email;
        $user->name = $request->edit_student_name;
        $user->update();

        $student->student_id = $request->edit_student_id;
        $student->update();

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

      $request->validate([
         'email'    => 'unique:users,email'
       ]);


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

    public function edit_lecturer(Request $request)
    {

      

        $lecturer =  Lecturer::find($request->edit_id);
        $user = User::find($lecturer->user_id);

        $user->email = $request->edit_lecturer_email;
        $user->name = $request->edit_lecturer_name;
        $user->update();

        $lecturer->lecturer_id = $request->edit_lecturer_id;
        $lecturer->update();

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
      $request->validate([
         'course_code'    => 'unique:courses,course_code'
       ]);

      $course = new Course;
      $course->course_code = $request->course_code;
      $course->save();

      $request->session()->flash('success', 'Task was successful!');
      return redirect()->back();
    }

    public function edit_course(Request $request)
    {
      $request->validate([
         'course_code'    => 'unique:courses,course_code'
       ]);

      $course =  Course::find($request->edit_course_id);
      $course->course_code = $request->edit_course_code;
      $course->update();

      $request->session()->flash('success', 'Task was successful!');
      return redirect()->back();
    }


    public function add_position(Request $request)
    {
      $request->validate([
         'position_title'    => 'unique:positions,title'
       ]);

      $position = new Position;
      $position->title = $request->position_title;
      $position->save();

      $request->session()->flash('success', 'Task was successful!');
      return redirect()->back();
    }

    public function edit_position(Request $request)
    {
      $request->validate([
         'position_title'    => 'unique:positions,title'
       ]);

        $position = Position::find($request->edit_position_id);
        $position->title = $request->edit_position_title;
        $position->update();

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

      public function update_handler(Request $request)
      {
          $handler = ComplaintHandler::find($request->complaint_id);

          $handler->lecturer_id = $request->lecturer_id;
          $handler->position_id = $request->position_id;
          $handler->update();

          // Session::flash('success',"Update successful");
          $request->session()->flash('success', 'Task was successful!');
          return redirect()->back();
      }
}
