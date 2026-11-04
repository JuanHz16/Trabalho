<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold text-gray-800">Detalhes do pagamento</h2></x-slot>
    <div class="py-8"><div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <div class="rounded bg-white p-6 shadow">
            <dl class="grid gap-4 sm:grid-cols-2">
                <div><dt class="text-sm text-gray-500">Aluno</dt><dd class="font-medium">{{ $pagamento->student->name }}</dd></div>
                <div><dt class="text-sm text-gray-500">Plano</dt><dd class="font-medium">{{ $pagamento->plano }}</dd></div>
                <div><dt class="text-sm text-gray-500">Data</dt><dd class="font-medium">{{ $pagamento->dia_pagamento?->format('d/m/Y') ?? 'Não informado' }}</dd></div>
                <div><dt class="text-sm text-gray-500">Forma</dt><dd class="font-medium">{{ $pagamento->forma_pagamento ?: 'Não informada' }}</dd></div>
                <div><dt class="text-sm text-gray-500">Status</dt><dd class="font-medium">{{ $pagamento->status_pagamento }}</dd></div>
                <div><dt class="text-sm text-gray-500">Ativo</dt><dd class="font-medium">{{ $pagamento->ativo ? 'Sim' : 'Não' }}</dd></div>
            </dl>
            <div class="mt-6 flex gap-3">
                <a href="{{ route('pagamentos.edit', $pagamento) }}" class="rounded bg-gray-800 px-4 py-2 text-sm text-white">Editar</a>
                <a href="{{ route('pagamentos.index') }}" class="rounded border px-4 py-2 text-sm text-gray-700">Voltar</a>
            </div>
        </div>
    </div></div>
</x-app-layout>
