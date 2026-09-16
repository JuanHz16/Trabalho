<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
class DashboardController extends Controller { public function index(){ return view('dashboard',['studentCount'=>Student::count(),'courseCount'=>Course::where('active',true)->count(),'enrollmentCount'=>Enrollment::where('status','Cursando')->count(),'recentStudents'=>Student::latest()->take(5)->get()]); } }
