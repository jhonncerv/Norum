# Exámen Norum

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Descripción del problema

Haciendo uso de cualquier framework, microframework o bibliotecas de terceros, desarrolla en HTML+JS+PHP un sitio web que cumpla con todas las condiciones descritas a continuación:

1. Crear una página que permita subir gifs animados y almacenarlos en el servidor.
2. Crear una página que despliegue todos los gifs subidos en una cuadrícula.
3. Agregar un sistema de usuarios (registro/login).
4. Crear una página para usuarios (autenticados) que permita marcar los gifs como “aceptados” o “rechazados”.
5. Modificar la funcionalidad (2) para que únicamente despliegue los gifs marcados como “aceptados”.
6. Permitir, además de la vista en cuadrícula, un modo slideshow o carrusel.
7. Al dar clic en una imagen la debe mostrar en tamaño real en un lightbox.
9. Incluir la opción para compartir las imágenes de forma individual en al menos una red social.

## Requisitos 

* Composer 
* Virtual Box
* Vagrant


## Instalación

Clonar el proyecto de Github

```
git clone https://github.com/jhonncerv/Norum.git
```

Instalar todos los componentes de terceros con composer 

```
composer update
```

Generar los archivos necesarios para crear la maquina virtual donde correra el proyecto
  
  * Para Mac/Linux
  
```
php vendor/bin/homestead make
```

  * Para Windows

```
vendor\\bin\\homestead make
```

Se crea la maquina virtual con el código

```
vagrant up
```

Listo el proyecto esta listo para usarse en la siguiente dirección: [Abrir Proyecto](https://192.168.10.10)


#### Notas


* La presentación del sitio es muy importante, puedes basarte en cualquier sitio existente, y hacer uso de assets gráficos de terceros, con la finalidad de que el resultado sea agradable a la vista y a la experiencia del usuario.
* Todas las vistas deben poderse desplegar correctamente en resoluciones desde 320px hasta 1600px de ancho.
* Todas las secciones deben estar coherentemente entrelazadas (p.ej. debe haber una liga de registro/login en todas las demás vistas cuando no te encuentres autenticado).
* Mientras más AJAX, mejor.
* Valida la mayor cantidad de datos posibles.
* Asegúrate de no dar pie a brechas de seguridad, como inyecciones SQL.
* Los comentarios a nivel código son un plus.
* Incluye un volcado de la base de datos, organizando estructura y datos de la forma que consideres más correcta.
* Especifica los pasos y requerimientos para instalar y probar el proyecto.
* Considera documentar de forma sencilla los servicios para su uso por parte de un tercero.
* Organiza tu progreso en commits dentro de un repositorio de control de versiones.
