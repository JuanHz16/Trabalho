<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagamentoRequest;
use App\Http\Resources\PagamentoResource;
use App\Models\Pagamento;
use App\Services\PagamentoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PagamentoController extends Controller
{
    public function __construct(
        private readonly PagamentoService $pagamentoService,
    ) {
    }

    public function index()
    {
        return PagamentoResource::collection(
            Pagamento::with('student')->latest('id')->paginate(10),
        );
    }

    public function store(PagamentoRequest $request): JsonResponse
    {
        $pagamento = $this->pagamentoService->criar($request->validated());

        return (new PagamentoResource($pagamento->load('student')))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Pagamento $pagamento): PagamentoResource
    {
        return new PagamentoResource($pagamento->load('student'));
    }

    public function update(PagamentoRequest $request, Pagamento $pagamento): PagamentoResource
    {
        $pagamento = $this->pagamentoService->atualizar(
            $pagamento,
            $request->validated(),
        );

        return new PagamentoResource($pagamento->load('student'));
    }

    public function destroy(Pagamento $pagamento): Response
    {
        $this->pagamentoService->excluir($pagamento);

        return response()->noContent();
    }
}
