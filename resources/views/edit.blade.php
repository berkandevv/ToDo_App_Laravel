<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Texto de Tarea</title>
    <link rel="stylesheet" href="{{ asset('css/estilos_edit.css') }}">
</head>

<body>

    <h1>Editar Texto de Tarea</h1>

    <form class="edit-form" action="{{ route('tareas.update', $tarea->ID_Tarea) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Tarea">Nuevo texto para la tarea:</label>
            <input type="text" id="Tarea" name="Tarea" value="{{ old('Tarea', $tarea->Tarea) }}" required>
        </div>

        <!-- Campos ocultos para mantener el estado actual -->
        <input type="hidden" name="Estado" value="{{ $tarea->Estado }}">
        @if ($tarea->Estado === 'Terminada' && $tarea->Fecha_Completado)
            <input type="hidden" name="Fecha_Completado" value="{{ $tarea->Fecha_Completado }}">
        @endif

        <div class="task-info">
            <div class="info-item">
                <strong>Estado actual:</strong>
                <span class="status-badge {{ str_replace(' ', '-', strtolower($tarea->Estado)) }}">
                    {{ $tarea->Estado }}
                </span>
            </div>
            <div class="info-item">
                <strong>Creada:</strong> {{ $tarea->Fecha_Creacion->format('d/m/Y H:i') }}
            </div>
            @if ($tarea->Estado === 'Terminada' && $tarea->Fecha_Completado)
                <div class="info-item">
                    <strong>Completada:</strong> {{ $tarea->Fecha_Completado->format('d/m/Y H:i') }}
                </div>
            @endif
        </div>

        <div class="form-actions">
            <a href="{{ route('tareas.index') }}" class="btn btn-cancel">Cancelar</a>
            <button type="submit" class="btn btn-save">Guardar Cambios</button>
        </div>
    </form>
</body>

</html>
