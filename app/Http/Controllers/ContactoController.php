<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::all();
        return response()->json($contactos);
    }

    
    public function store(Request $request)
    {
        $contacto = Contacto::create($request->all());
        $data = [
            'message' => 'Contacto created successfully',
            'contacto' => $contacto
        ];
        return response()->json($data);
    }

  
    public function update(Request $request, string $id)
    {
        $contacto = Contacto::find($id);
        $message = 'Contacto not found';
        if ($contacto != null) {
            $contacto->update($request->all());
            $message = 'Contacto found';
        }
        $data = [
            'message' => $message,
            'contacto' => $contacto
        ];
        return response()->json($data);
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        $data = [
            'message' => 'Contacto deleted successfully',
            'contacto' => $contacto
        ];
        return response()->json($data);
    }
}
