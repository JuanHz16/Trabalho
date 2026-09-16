<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreStudentRequest extends FormRequest { public function authorize(): bool { return true; } public function rules(): array { return ['name'=>['required','string','min:3','max:120'],'registration'=>['required','string','max:30','unique:students,registration,'.$this->route('student')?->id],'email'=>['required','email','max:120','unique:students,email,'.$this->route('student')?->id],'phone'=>['nullable','string','max:30'],'birth_date'=>['nullable','date','before:today'],'status'=>['required','in:Ativo,Trancado,Concluído']]; } public function attributes(): array { return ['name'=>'nome','registration'=>'matrícula','birth_date'=>'data de nascimento']; } }
