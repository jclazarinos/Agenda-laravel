@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Nuevo Contacto</h1>

    <form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Nombre</label>
            <input type="text" name="nombre" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Teléfono</label>
            <input type="text" name="telefono" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('contacts.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Guardar</button>
        </div>
    </form>
</div>
@endsection
