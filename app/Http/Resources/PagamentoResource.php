<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PagamentoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'student_name' => $this->whenLoaded('student', fn () => $this->student->name),
            'dia_pagamento' => $this->dia_pagamento?->format('Y-m-d'),
            'forma_pagamento' => $this->forma_pagamento,
            'status_pagamento' => $this->status_pagamento,
            'plano' => $this->plano,
            'ativo' => $this->ativo,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
