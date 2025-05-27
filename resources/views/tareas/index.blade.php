<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="{{ asset('css/estilos_index.css') }}">
</head>

<body>

    <h1>Lista de Tareas</h1>

    <form id="new-task" action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <input type="text" name="Tarea" placeholder="Nueva tarea..." required>
        <button type="submit">Agregar</button>
    </form>

    <ul class="task-list">
        @php $counter = 1; @endphp
        @foreach ($tareas as $tarea)
            <li class="task-item {{ $tarea->Estado === 'Terminada' ? 'completed' : '' }}">
                <div class="task-content-wrapper">
                    <span class="task-number">{{ $counter++ }}.</span>

                    <div class="task-main-content">
                        <div class="task-header">
                            <span class="task-title {{ $tarea->Estado === 'Terminada' ? 'completed' : '' }}">
                                {{ $tarea->Tarea }}
                            </span>
                            <span class="task-status {{ str_replace(' ', '-', strtolower($tarea->Estado)) }}">
                                {{ $tarea->Estado }}
                            </span>
                        </div>

                        <div class="task-meta">
                            <span class="task-date">
                                Creada: {{ $tarea->Fecha_Creacion->format('d/m/Y H:i') }}
                            </span>
                            @if ($tarea->Estado === 'Terminada' && $tarea->Fecha_Completado)
                                <span class="task-date">
                                    Completada: {{ $tarea->Fecha_Completado->format('d/m/Y H:i') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="task-actions">
                    <a href="{{ route('tareas.edit', $tarea->ID_Tarea) }}" class="btn-edit">Modificar Texto</a>

                    <form action="{{ route('tareas.update', $tarea->ID_Tarea) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="Tarea" value="{{ $tarea->Tarea }}">
                        <input type="hidden" name="Estado"
                            value="{{ $tarea->Estado === 'Terminada' ? 'Pendiente' : 'Terminada' }}">
                        <button type="submit" class="btn-toggle">
                            {{ $tarea->Estado === 'Terminada' ? 'Marcar Pendiente' : 'Marcar Terminada' }}
                        </button>
                    </form>

                    <form action="{{ route('tareas.destroy', $tarea->ID_Tarea) }}" method="POST"
                        onsubmit="return confirm('¿Eliminar esta tarea?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

</body>

</html>
