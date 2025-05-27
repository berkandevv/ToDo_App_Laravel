<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    // Mostrar listado de tareas
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('tareas.create');
    }

    // Guardar nueva tarea
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Tarea' => 'required|string|max:255',
            'Estado' => 'in:Pendiente,Terminada',
        ]);

        Tarea::create($validated);

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    // Mostrar detalles de tarea
    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    // Mostrar formulario de edición
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    // Actualizar tarea
    public function update(Request $request, Tarea $tarea)
    {
        $validated = $request->validate([
            'Tarea' => 'required|string|max:255',
            'Estado' => 'required|in:Pendiente,Terminada',
        ]);

        $marcandoComoTerminada = $request->Estado == 'Terminada' && $tarea->Estado != 'Terminada';

        $tarea->fill($validated);

        if ($marcandoComoTerminada) {
            $tarea->Fecha_Completado = now();
        } elseif ($request->Estado != 'Terminada') {
            $tarea->Fecha_Completado = null;
        }

        $tarea->save();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea actualizada correctamente.');
    }

    // Eliminar tarea
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')
            ->with('success', 'Tarea eliminada correctamente.');
    }
}
