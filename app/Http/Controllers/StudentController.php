<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Students;
use App\classes;

class StudentController extends Controller
{
    public function index() {
        $students = Students::all()->toArray();
        $info = DB::table('classes')
                ->join('students','students.class_id', '=', 'classes.id')
                ->select('classes.className', 'students.name', 'students.email')
                ->get()->toArray();

        return view('StudentsDash')->with('students', $info);
    }
    public function create() {
        $classes = classes::all()->toArray();
        return view('students')->with('classes', $classes);
    }
    public function store(Request $request) {
        // dd($request['name']);
        $student = new Students();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->class_id = $request->input('classes');
        $student->save();

        return redirect('student');
    }
}
