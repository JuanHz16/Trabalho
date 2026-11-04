<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagamentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => ['required', 'integer', 'exists:students,id'],
            'dia_pagamento' => ['nullable', 'date'],
            'forma_pagamento' => ['nullable', 'string', 'max:30'],
            'status_pagamento' => ['required', 'in:Devendo,Pago,Cancelado'],
            'plano' => ['required', 'in:Mensal,Anual'],
            'ativo' => ['sometimes', 'boolean'],
        ];
    }
}
