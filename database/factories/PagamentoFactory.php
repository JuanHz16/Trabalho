<?php

namespace Database\Factories;

use App\Models\Pagamento;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagamentoFactory extends Factory
{
    protected $model = Pagamento::class;

    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'dia_pagamento' => fake()->date(),
            'forma_pagamento' => fake()->randomElement(['Pix', 'Cartão', 'Dinheiro']),
            'status_pagamento' => 'Devendo',
            'plano' => fake()->randomElement(['Mensal', 'Anual']),
            'ativo' => true,
        ];
    }
}
