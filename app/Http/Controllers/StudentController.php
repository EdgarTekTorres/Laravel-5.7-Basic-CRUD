<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('show_student', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'student_name' => 'required',
            'student_roll' => 'required|numeric',
            'student_email' => 'required|unique:students,email',
            'student_address' => 'required'
        ]);

        $student = Student::create([
            'student_name' => $request->input('student_name'),
            'student_roll' => $request->input('student_roll'),
            'student_address' => $request->input('student_address'),
            'email' => $request->input('student_email'),
        ]);

        if ($student) {
            return redirect()->route('student.index')->with('success', $student->student_name. ' Record Saved Successfully..!');
        }
        return back()->withInput();
        

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

        $student = Student::find($student->id);
        return view('student.edit', ['student'=>$student]);
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
        $student = Student::find($student->id);
        $student->student_name = $request->student_name;
        $student->email = $request->student_email;
        $student->student_roll = $request->student_roll;
        $student->student_address = $request->student_address;

        if ($student->save()) {
            return redirect()->route('student.index')->with('success', $student->student_Name. ' Record Has Been Update Successfully');
        }

        return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $s = Student::find($student->id);
        if ($s->delete()) {
            return redirect()->route('student.index')->with('success', $s->student_Name. ' Record Has Been Deleted Successfully');
        }
        /*if (Student::destroy($student->id)) {
             $stu = Student::onlyTrashed()->get();
             dd($stu);
        }*/

        /*if (Student::destroy($student->id)) {
             return redirect()->route('student.index')->with('success','Student Record Has Been Deleted Successfully');
        }*/
       
    }
}
