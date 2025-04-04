<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContactController extends Controller
{
    use AuthorizesRequests;
    
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('contacts.index', compact('contacts'));
    }
    
    public function create()
    {
        return view('contacts.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'nullable|email',
        ]);
    
        Contact::create([
            'user_id' => Auth::id(),
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);
    
        return redirect()->route('contacts.index')->with('success', 'Contacto creado correctamente');
    }
    
    public function edit(Contact $contact)
    {
        $this->authorize('update', $contact); // opcional
        return view('contacts.edit', compact('contact'));
    }
    
    public function update(Request $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        $contact->update($request->only('nombre', 'telefono', 'email'));

        return redirect()->route('contacts.index')->with('success', 'Contacto actualizado correctamente');
    }
    
    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contacto eliminado');
    }
}
