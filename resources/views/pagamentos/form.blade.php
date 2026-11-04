@csrf

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label for="student_id" class="block text-sm font-medium text-gray-700">Aluno</label>
        <select id="student_id" name="student_id" required class="mt-1 block w-full rounded border-gray-300">
            <option value="">Selecione um aluno</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}" @selected((string) old('student_id', $pagamento->student_id ?? '') === (string) $student->id)>
                    {{ $student->name }} - {{ $student->registration }}
                </option>
            @endforeach
        </select>
        @error('student_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="dia_pagamento" class="block text-sm font-medium text-gray-700">Data do pagamento</label>
        <input id="dia_pagamento" name="dia_pagamento" type="date"
            value="{{ old('dia_pagamento', isset($pagamento) && $pagamento->dia_pagamento ? $pagamento->dia_pagamento->format('Y-m-d') : '') }}"
            class="mt-1 block w-full rounded border-gray-300">
        @error('dia_pagamento') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="forma_pagamento" class="block text-sm font-medium text-gray-700">Forma de pagamento</label>
        <input id="forma_pagamento" name="forma_pagamento" maxlength="30"
            value="{{ old('forma_pagamento', $pagamento->forma_pagamento ?? '') }}"
            class="mt-1 block w-full rounded border-gray-300">
        @error('forma_pagamento') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="plano" class="block text-sm font-medium text-gray-700">Plano</label>
        <select id="plano" name="plano" required class="mt-1 block w-full rounded border-gray-300">
            @foreach (['Mensal', 'Anual'] as $plano)
                <option value="{{ $plano }}" @selected(old('plano', $pagamento->plano ?? 'Mensal') === $plano)>{{ $plano }}</option>
            @endforeach
        </select>
        @error('plano') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="status_pagamento" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="status_pagamento" name="status_pagamento" required class="mt-1 block w-full rounded border-gray-300">
            @foreach (['Devendo', 'Pago', 'Cancelado'] as $status)
                <option value="{{ $status }}" @selected(old('status_pagamento', $pagamento->status_pagamento ?? 'Devendo') === $status)>{{ $status }}</option>
            @endforeach
        </select>
        @error('status_pagamento') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2 pt-6">
        <input type="hidden" name="ativo" value="0">
        <input id="ativo" name="ativo" type="checkbox" value="1" @checked(old('ativo', $pagamento->ativo ?? true))>
        <label for="ativo" class="text-sm text-gray-700">Pagamento ativo</label>
    </div>
</div>

<div class="mt-6 flex gap-3">
    <button type="submit" class="rounded bg-gray-800 px-4 py-2 text-sm text-white hover:bg-gray-700">{{ $buttonText }}</button>
    <a href="{{ route('pagamentos.index') }}" class="rounded border px-4 py-2 text-sm text-gray-700">Cancelar</a>
</div>
