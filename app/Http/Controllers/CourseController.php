<?php
namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
class CourseController extends Controller { public function index(){ $courses=Course::withCount('enrollments')->orderBy('name')->get(); return view('courses.index',compact('courses')); } public function store(Request $request){ abort_unless(in_array(auth()->user()->role,['admin','secretaria'],true),403); $data=$request->validate(['name'=>'required|min:3','code'=>'required|max:20','description'=>'nullable','workload'=>'required|integer|min:1|max:1000']); Course::create($data); return back()->with('success','Curso cadastrado com sucesso.'); } }
