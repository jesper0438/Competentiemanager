<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $students = Student::where(['user_id' => Auth::user()->id])->get();
        return response()->json([
            'students'    => $students,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'currentproject'  => 'required|max:255',
        ]);

        $student = Student::create([
            'name' => request('name'),
            'currentproject'        => request('currentproject'),
            'user_id'     => Auth::user()->id
        ]);

        return response()->json([
            'student'    => $student,
            'message' => 'Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required',
            'currentproject'        => 'required|max:255',
        ]);

        $student->name = request('name');
        $student->currentproject = request('currentproject');
        $student->save();

        return response()->json([
            'message' => 'Student updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}