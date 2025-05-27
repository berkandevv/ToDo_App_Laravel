# Aplicación To-Do en Laravel

Esta es una aplicación sencilla de gestión de tareas (To-Do List) desarrollada con Laravel. Permite crear, modificar, eliminar y gestionar el estado de las tareas de manera fácil y rápida.

## Funcionalidades

- **Agregar tareas:** Puedes crear nuevas tareas con su texto descriptivo.
- **Eliminar tareas:** Puedes borrar tareas que ya no necesites.
- **Marcar tareas como terminadas:** Con un botón puedes marcar una tarea como terminada.
- **Marcar tareas como pendientes:** Si te has equivocado o quieres reactivar una tarea, el mismo botón permite marcarla de nuevo como pendiente.
- **Modificar texto de las tareas:** Puedes editar el texto de una tarea para ajustarlo o corregirlo.
- **Registro de fechas y horas:**  
  - Al agregar una tarea se registra automáticamente la fecha y hora de creación (formato DateTime).  
  - Al marcar una tarea como terminada, se guarda la fecha y hora en la que la completaste.  
  - Si vuelves a marcar la tarea como pendiente, la fecha y hora de finalización se elimina.

## Instalación

1. Clona este repositorio:  
   `git clone <URL-del-repositorio>`

2. Entra en la carpeta del proyecto:  
   `cd nombre-del-proyecto`

3. Instala las dependencias de Laravel:  
   `composer install`

4. Configura tu archivo `.env` con los datos de tu base de datos y otros parámetros necesarios.

5. Genera la clave de la aplicación:  
   `php artisan key:generate`

6. Ejecuta las migraciones para crear las tablas necesarias:  
   `php artisan migrate`

7. Levanta el servidor local:  
   `php artisan serve`

## Uso

1. Navega a la aplicación en `http://localhost:8000/tareas`
2. Usa el formulario para añadir nuevas tareas
3. Cada tarea tiene botones para:
   - Eliminar la tarea
   - Marcar como terminada o pendiente
   - Modificar el texto

## Tecnologías usadas

- **Laravel** (PHP framework)
- **Blade** (sistema de plantillas de Laravel)
- **HTML + CSS** (estructura y estilos)
- **MySQL** (base de datos)

## Contribuciones

Las contribuciones son bienvenidas. Si quieres ayudar, abre un *issue* o un *pull request*.

## Licencia

Este proyecto está licenciado bajo la **MIT License**.
