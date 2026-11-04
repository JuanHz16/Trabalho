<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Student extends Model {
 use HasFactory;
 protected $fillable=['name','registration','email','phone','birth_date','status'];
 protected function casts(): array { return ['birth_date'=>'date']; }
 public function enrollments(){ return $this->hasMany(Enrollment::class); }
 public function pagamentos(){ return $this->hasMany(Pagamento::class); }
 public function user(){ return $this->hasOne(User::class,'student_id'); }
}
