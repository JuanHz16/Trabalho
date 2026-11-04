<?php

namespace Tests\Feature;

use App\Models\Pagamento;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagamentoApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_lista_pagamentos_em_json(): void
    {
        $student = Student::factory()->create();
        Pagamento::factory()->create([
            'student_id' => $student->id,
            'forma_pagamento' => 'Pix',
        ]);

        $response = $this->getJson('/api/pagamentos');

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [[
                'id',
                'student_id',
                'student_name',
                'dia_pagamento',
                'forma_pagamento',
                'status_pagamento',
                'plano',
                'ativo',
            ]],
            'links',
            'meta',
        ]);
        $response->assertJsonPath('data.0.forma_pagamento', 'Pix');
        $response->assertJsonPath('data.0.student_name', $student->name);
    }
}
