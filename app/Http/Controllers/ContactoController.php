<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactos = Contacto::paginate(10);
        return view('contactos.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contactos.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cedula' => 'required|numeric|unique:contactos,cedula',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:16|max:89',
            'genero' => 'required|in:masculino,femenino,otro',
            'telefono' => 'required|regex:/^\d{4}-\d{7}$/',
            'telefono2' => 'nullable|regex:/^\d{4}-\d{7}$/',
            'email' => 'required|email|max:255',
            'email2' => 'nullable|email|max:255',
            'estado_civil' => 'required|in:soltero,casado,divorciado,concubinato,viudo',
            'direccion' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
        ], [
            'cedula.required' => 'La cédula es obligatoria.',
            'cedula.numeric' => 'La cédula debe ser numérica.',
            'cedula.unique' => 'Esta cédula ya está registrada.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.min' => 'La edad debe ser mayor a 15.',
            'edad.max' => 'La edad debe ser menor a 90.',
            'genero.required' => 'El género es obligatorio.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono debe tener el formato XXXX-XXXXXXX.',
            'telefono2.regex' => 'El teléfono 2 debe tener el formato XXXX-XXXXXXX.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser válido.',
            'email2.email' => 'El email 2 debe ser válido.',
            'estado_civil.required' => 'El estado civil es obligatorio.',
            'direccion.required' => 'La dirección es obligatoria.',
            'departamento.required' => 'El departamento es obligatorio.',
            'cargo.required' => 'El cargo es obligatorio.',
        ]);

        Contacto::create($validated);

        return redirect()->route('contactos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contacto = Contacto::findOrFail($id);
        return view('contactos.form', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contacto = Contacto::findOrFail($id);

        $validated = $request->validate([
            'cedula' => 'required|numeric|unique:contactos,cedula,' . $id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:16|max:89',
            'genero' => 'required|in:masculino,femenino,otro',
            'telefono' => 'required|regex:/^\d{4}-\d{7}$/',
            'telefono2' => 'nullable|regex:/^\d{4}-\d{7}$/',
            'email' => 'required|email|max:255',
            'email2' => 'nullable|email|max:255',
            'estado_civil' => 'required|in:soltero,casado,divorciado,concubinato,viudo',
            'direccion' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
        ], [
            'cedula.required' => 'La cédula es obligatoria.',
            'cedula.numeric' => 'La cédula debe ser numérica.',
            'cedula.unique' => 'Esta cédula ya está registrada.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.min' => 'La edad debe ser mayor a 15.',
            'edad.max' => 'La edad debe ser menor a 90.',
            'genero.required' => 'El género es obligatorio.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono debe tener el formato XXXX-XXXXXXX.',
            'telefono2.regex' => 'El teléfono 2 debe tener el formato XXXX-XXXXXXX.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser válido.',
            'email2.email' => 'El email 2 debe ser válido.',
            'estado_civil.required' => 'El estado civil es obligatorio.',
            'direccion.required' => 'La dirección es obligatoria.',
            'departamento.required' => 'El departamento es obligatorio.',
            'cargo.required' => 'El cargo es obligatorio.',
        ]);

        $contacto->update($validated);

        return redirect()->route('contactos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return redirect()->route('contactos.index');
    }
}
