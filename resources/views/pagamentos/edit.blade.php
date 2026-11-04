<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold text-gray-800">Editar pagamento</h2></x-slot>
    <div class="py-8"><div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="rounded bg-white p-6 shadow">
            <form method="POST" action="{{ route('pagamentos.update', $pagamento) }}">
                @method('PUT')
                @include('pagamentos.form', ['buttonText' => 'Salvar alterações'])
            </form>
        </div>
    </div></div>
</x-app-layout>
