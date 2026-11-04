<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagamentoRequest;
use App\Models\Pagamento;
use App\Models\Student;
use App\Services\PagamentoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PagamentoController extends Controller
{
    public function __construct(
        private readonly PagamentoService $pagamentoService,
    ) {
    }

    public function index(): View
    {
        $pagamentos = Pagamento::with('student')
            ->orderByDesc('dia_pagamento')
            ->orderByDesc('id')
            ->paginate(10);

        return view('pagamentos.index', compact('pagamentos'));
    }

    public function create(): View
    {
        $students = Student::orderBy('name')->get();

        return view('pagamentos.create', compact('students'));
    }

    public function store(PagamentoRequest $request): RedirectResponse
    {
        $this->pagamentoService->criar($request->validated());

        return redirect()->route('pagamentos.index')
            ->with('success', 'Pagamento criado com sucesso.');
    }

    public function show(Pagamento $pagamento): View
    {
        $pagamento->load('student');

        return view('pagamentos.show', compact('pagamento'));
    }

    public function edit(Pagamento $pagamento): View
    {
        $students = Student::orderBy('name')->get();

        return view('pagamentos.edit', compact('pagamento', 'students'));
    }

    public function update(PagamentoRequest $request, Pagamento $pagamento): RedirectResponse
    {
        $this->pagamentoService->atualizar($pagamento, $request->validated());

        return redirect()->route('pagamentos.index')
            ->with('success', 'Pagamento atualizado com sucesso.');
    }

    public function destroy(Pagamento $pagamento): RedirectResponse
    {
        $this->pagamentoService->excluir($pagamento);

        return redirect()->route('pagamentos.index')
            ->with('success', 'Pagamento excluído com sucesso.');
    }
}
