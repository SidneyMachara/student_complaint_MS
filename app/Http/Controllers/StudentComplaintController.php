<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      return view('student.index');
    }


    public function store_complaint()
    {
      return view('student.index');
    }

    public function show($complaint_id)
    {
      return view('student.show');
    }
}
