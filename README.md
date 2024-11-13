## Requisitos

* Servidor con PHP 8.2.25+
* Servidor MySQL o MariaDB
* Composer

## Instalación

* Clonar el repositorio en el servidor de pruebas (Ejemplos: XAMPP, Laragon, etc...)
* Abrir la terminal dentro de la raiz del proyecto
* Instalar las dependecias con el comando "composer install"
* Crear una base de datos llamada "laravel"
* Si es que se requieren de licencias especificas para la base de datos favor de especificarlas en el archivo .env
* Ejecutar las migraciones "php artisan migrate:fresh --seed"
* Ejecutar el comando php artisan storage:link para almacenar las imagenes de los usuarios
