@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Mis Contactos</h1>
        <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Nuevo Contacto
        </a>
    </div>

    @if ($contacts->isEmpty())
        <p class="text-gray-600">No tienes contactos aún.</p>
    @else
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Teléfono</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td class="border px-4 py-2">{{ $contact->nombre }}</td>
                        <td class="border px-4 py-2">{{ $contact->telefono }}</td>
                        <td class="border px-4 py-2">{{ $contact->email }}</td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <a href="{{ route('contacts.edit', $contact) }}" class="text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este contacto?');">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
