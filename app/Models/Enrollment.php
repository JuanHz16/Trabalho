<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Enrollment extends Model {
 use HasFactory;
 protected $fillable=['student_id','course_id','semester','status','final_grade'];
 protected function casts(): array { return ['final_grade'=>'decimal:2']; }
 public function student(){ return $this->belongsTo(Student::class); }
 public function course(){ return $this->belongsTo(Course::class); }
}
