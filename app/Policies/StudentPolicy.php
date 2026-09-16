<?php
namespace App\Policies;
use App\Models\Student;
use App\Models\User;
class StudentPolicy { public function viewAny(User $user): bool { return true; } public function view(User $user, Student $student): bool { return $user->role !== 'aluno' || $user->student_id === $student->id; } public function create(User $user): bool { return in_array($user->role,['admin','secretaria'],true); } public function update(User $user, Student $student): bool { return in_array($user->role,['admin','secretaria'],true); } public function delete(User $user, Student $student): bool { return $user->isAdmin(); } }
