@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Editar Contacto</h1>

    <form action="{{ route('contacts.update', $contact) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nombre</label>
            <input type="text" name="nombre" value="{{ $contact->nombre }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Teléfono</label>
            <input type="text" name="telefono" value="{{ $contact->telefono }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ $contact->email }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('contacts.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar</button>
        </div>
    </form>
</div>
@endsection
