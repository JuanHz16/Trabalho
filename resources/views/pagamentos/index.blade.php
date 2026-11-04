<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Pagamentos</h2>
                <p class="text-sm text-gray-500">Lista de pagamentos dos alunos</p>
            </div>
            <a href="{{ route('pagamentos.create') }}" class="rounded bg-gray-800 px-4 py-2 text-sm text-white hover:bg-gray-700">Novo pagamento</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">{{ session('success') }}</div>
            @endif

            <div class="overflow-hidden rounded bg-white shadow">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Aluno</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Plano</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Data</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium uppercase text-gray-500">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse ($pagamentos as $pagamento)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $pagamento->student->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $pagamento->plano }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $pagamento->dia_pagamento?->format('d/m/Y') ?? 'Não informado' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $pagamento->status_pagamento }}</td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <a href="{{ route('pagamentos.show', $pagamento) }}" class="text-blue-600 hover:text-blue-800">Ver</a>
                                        <a href="{{ route('pagamentos.edit', $pagamento) }}" class="ml-3 text-gray-600 hover:text-gray-900">Editar</a>
                                        <form action="{{ route('pagamentos.destroy', $pagamento) }}" method="POST" class="ml-3 inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Excluir este pagamento?')" class="text-red-600 hover:text-red-800">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">Nenhum pagamento cadastrado.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4">{{ $pagamentos->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
