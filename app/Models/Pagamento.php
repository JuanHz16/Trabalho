<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamento';

    protected $fillable = [
        'student_id',
        'dia_pagamento',
        'forma_pagamento',
        'status_pagamento',
        'plano',
        'ativo',
    ];

    protected function casts(): array
    {
        return [
            'dia_pagamento' => 'date',
            'ativo' => 'boolean',
        ];
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
