<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

// Ruta para la vista web que muestra el listado de tareas
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');

// Rutas para crear, editar, eliminar, etc. que usarán vistas o formularios web
Route::get('/tareas/create', [TareaController::class, 'create'])->name('tareas.create');
Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
Route::get('/tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
Route::put('/tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
Route::get('/tareas/{tarea}', [TareaController::class, 'show'])->name('tareas.show');
