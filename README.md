# Proyecto de Software

Este proyecto está dividido en dos partes principales:

1. **`api`**: Maneja la lógica de la API, incluyendo la conexión con la base de datos, la estructura de rutas, controladores y modelos.
2. **`2024`**: Contendrá el frontend del proyecto (actualmente en configuración).

---

## Estructura del proyecto

### Carpeta `api`

La carpeta `api` es responsable de gestionar la API del proyecto y se ejecuta en la URL:  
`http://localhost/software/api/#varible/#id`

#### Subcarpetas

Dentro de la carpeta `api`, se encuentran las siguientes subcarpetas:

1. **`controllers`**

   - Contiene archivos que gestionan las validaciones de las solicitudes y se encargan de llamar a los modelos correspondientes.
   - Ejemplo: Para la ruta `#ejemplo`, se creará un archivo llamado `EjemploController`.

2. **`config`**

   - Incluye configuraciones específicas del proyecto.

3. **`include`**

   - Contiene:
     - La configuración de la conexión a la base de datos.
     - Un archivo global que gestiona la carga de los modelos.

4. **`models`**

   - Define la lógica de negocio y las consultas directas a la base de datos.
   - Ejemplo: Para la ruta `#ejemplo`, se creará un archivo llamado `EjemploModel`.

5. **`routes`**
   - Gestiona las rutas de la API. Cada ruta debe estar vinculada a su controlador correspondiente.
   - Ejemplo: Para la ruta `#ejemplo`, se creará un archivo llamado `ejemploRoute` con los métodos permitidos (`GET`, `POST`, `PUT`, `DELETE`).

---

### Carpeta `2024`

El frontend del proyecto estará ubicado en esta carpeta. Actualmente, se encuentra en configuración y se integrará con la API en el futuro.

---

## Proceso para agregar una nueva ruta a la API

1. **Crear el archivo de ruta en `routes`**

   - Nombra el archivo como `#ejemploRoute`.
   - Este archivo se encargará de manejar las solicitudes hacia `#ejemplo` y redirigirlas a su respectivo controlador.

2. **Crear el archivo de controlador en `controllers`**

   - Nombra el archivo como `EjemploController`.
   - Aquí se definirán las validaciones necesarias para la ruta y se llamará al modelo correspondiente.

3. **Crear el archivo del modelo en `models`**

   - Nombra el archivo como `EjemploModel`.
   - Aquí se realizarán las consultas necesarias a la base de datos.

4. **Asegurarse de registrar la nueva ruta**
   - Incluye la nueva ruta en la configuración principal para que sea accesible desde la API.

---

## Notas importantes

- Solo se permiten los métodos HTTP: `GET`, `POST`, `PUT` y `DELETE`.
- Mantén una separación clara entre rutas, controladores y modelos para garantizar la organización y mantenibilidad del proyecto.

---
