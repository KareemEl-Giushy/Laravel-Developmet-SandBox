<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Students;
use App\classes;

class StudentController extends Controller
{
    public function index() {
        // $students = Students::all()->toArray();
        $info = DB::table('classes')
                ->join('students','students.class_id', '=', 'classes.id')
                ->select('classes.className', 'students.name', 'students.email', 'students.degree')
                ->get()->toArray();
        $counter = DB::table('students')->count();
        $sum = 0;
        // return DB::table('students')->select('students.degree')->get()[0]->degree; 
        for ($i = 0;$i < $counter;$i++) {
            $deg = DB::table('students')->select('students.degree')->get()[$i]->degree;
            $sum += $deg;
        }
        
        
        return view('StudentsDash')->with('students', $info)->withAverage($sum/$counter);
    }
    public function create() {
        $classes = classes::all()->toArray();
        return view('students')->with('classes', $classes);
    }
    public function store(Request $request) {
        $input = $request->all();
        // dd($request['name']);
        $student = new Students();
        $student->create($input);
        $student->class()->create();

        return redirect('student');
    }
}
