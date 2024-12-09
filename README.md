## API para aplicativo de gestion de tareas

Esta es una API desarrollada con Laravel usando JWT para la autorizacion

## Instructivo

El api cuenta con 4 endpoints principales para la autenticacion de usuarios

POST /api/auth/login
POST /api/auth/register
POST /api/auth/logout
POST /api/auth/me

Tambien cuenta con 4 endpoints para la gestio de tareas

GET /api/tareas
POST /api/tareas
PUT /api/tareas/id
DELETE /api/tareas/id

en la ruta /api/auth/register se podra realizar el registro, para esto en necesario que en cuerpo de la peticion vayan los siguietnes datos:

    {
        "name": "daniel"
        "email": "test@test1",
        "password": "123456789"
    }
 pára el login es los mismo, sin el nombre

    {
        "email": "test@test1",
        "password": "123456789"
    }

## Gestio de tareas

Para le gestion de tareas se crearo seeders para la tabla relacional de las prioridades de la tarea, se crean tres registro ('Alto id:1', 'Medio id:2', 'Bajo id:3')
estos resigtros con sus respectivos id son los que se usaran par ala creacion de tareas:

    {
        "nombre_tarea" : "Tarea 1"
        "descripcion": "descripcion de la tarea 1",
        "id_prioridad" : 1 //id del registro de la prioridad
    }