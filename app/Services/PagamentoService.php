<?php

namespace App\Services;

use App\Models\Pagamento;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PagamentoService
{
    public function criar(array $dados): Pagamento
    {
        return Pagamento::create($dados);
    }

    public function atualizar(Pagamento $pagamento, array $dados): Pagamento
    {
        $pagamento->update($dados);

        return $pagamento->refresh();
    }

    public function excluir(Pagamento $pagamento): void
    {
        $pagamento->delete();
    }

    public function atualizarStatus(
        string $statusAtual = 'Devendo',
        string $plano = 'Anual',
        string $novoStatus = 'Pago',
    ): void {
        $status = ['Devendo', 'Pago', 'Cancelado'];
        $planos = ['Mensal', 'Anual'];

        if (! in_array($statusAtual, $status, true)) {
            throw new InvalidArgumentException('Status atual inválido.');
        }

        if (! in_array($novoStatus, $status, true)) {
            throw new InvalidArgumentException('Novo status inválido.');
        }

        if (! in_array($plano, $planos, true)) {
            throw new InvalidArgumentException('Plano inválido.');
        }

        DB::statement(
            'CALL atualizar_pagamento(?, ?, ?)',
            [$statusAtual, $plano, $novoStatus],
        );
    }
}
