<?php
namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
class EnrollmentController extends Controller { public function index(){ $enrollments=Enrollment::with(['student','course'])->latest()->paginate(12); return view('enrollments.index',compact('enrollments')); } public function create(){ abort_unless(in_array(auth()->user()->role,['admin','secretaria'],true),403); return view('enrollments.create',['students'=>Student::where('status','Ativo')->orderBy('name')->get(),'courses'=>Course::where('active',true)->orderBy('name')->get()]); } public function store(Request $request){ abort_unless(in_array(auth()->user()->role,['admin','secretaria'],true),403); $data=$request->validate(['student_id'=>'required|exists:students,id','course_id'=>'required|exists:courses,id','semester'=>'required|max:30','status'=>'required|in:Cursando,Aprovado,Reprovado,Trancado','final_grade'=>'nullable|numeric|min:0|max:10']); Enrollment::create($data); return redirect()->route('enrollments.index')->with('success','Matrícula registrada com sucesso.'); } }
