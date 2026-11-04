<?php

namespace Tests\Feature;

use App\Models\Pagamento;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagamentoRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_logado_pode_ver_a_lista_de_pagamentos(): void
    {
        $user = User::factory()->create();
        $student = Student::factory()->create();

        Pagamento::factory()->create([
            'student_id' => $student->id,
            'forma_pagamento' => 'Pix',
        ]);

        $response = $this->actingAs($user)->get(route('pagamentos.index'));

        $response->assertOk();
        $response->assertSee('Pagamentos');
        $response->assertSee($student->name);
        $response->assertSee('Pix');
    }
}
