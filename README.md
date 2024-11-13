# Remiesa - Guía de Instalación y Uso

Este documento proporciona instrucciones detalladas para configurar y ejecutar el proyecto **Remiesa** en tu entorno. Asegúrate de seguir estos pasos cuidadosamente para garantizar una instalación exitosa.

## Índice

1. [Requerimientos](#requerimientos)
2. [Configuración de Node.js](#configuración-de-nodejs)
3. [Levantamiento de Contenedores Docker](#levantamiento-de-contenedores-docker)
4. [Instalación del Proyecto Backend (Laravel 8)](#instalación-del-proyecto-backend-laravel-8)
5. [Instalación del Proyecto Frontend (Nuxt 2)](#instalación-del-proyecto-frontend-nuxt-2)
6. [Comandos Básicos de Docker](#comandos-básicos-de-docker)
7. [Uso del proyecto](#uso-del-proyecto)

## Requerimientos

Antes de comenzar, asegúrate de tener los siguientes componentes instalados en tu sistema:

- [Docker](https://www.docker.com/) (Se recomienda en una distribución de Linux)
- [Visual Studio Code](https://code.visualstudio.com/)
- [Node version manager (nvm)](https://github.com/nvm-sh/nvm)

En caso de no tener Node version manager (nvm), sigue las instrucciones en [Instalación de Node version manager (nvm)](#instalación-de-node-version-manager-nvm)

## Instalación de Node version manager (nvm)

#### Linux

Copia y pega el siguiente comando en la terminal

```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh | bash
```

Reinicia la terminal para que los cambios surtan efecto (cierra y vuelve a abrir la terminal).

#### Windows

Descarga el [instalador de nvm para windows](https://github.com/coreybutler/nvm-windows/releases/download/1.1.11/nvm-setup.exe)

## Levantamiento de contenedores Docker

### Paso 1. Actualizar tu rama a la última versión de desarrollo

```bash
cd remiesa
git checkout desarrollo
git pull
git checkout <nombre de tu rama>
git merge desarrollo
```

### Paso 2. Construir los contenedores de Docker y levantarlos

```bash
#Descargar recursos que aún no tengas en tu equipo
docker compose pull

#Construir los contenedores
docker compose build

#Levantar los contenedores
docker compose up -d
```

## Instalación del proyecto Backend ([Laravel 8](https://laravel.com/docs/8.x))

### Paso 1. Instalar las dependencias de PHP (usando el contenedor backend)

```bash
docker compose exec -u devuser backend composer install
```

### Paso 2. Migrar y llenar la base de datos (usando el contenedor backend)

```bash
docker compose exec -u devuser backend php artisan migrate:fresh --seed
```

### Paso 3. Dar permisos a las carpetas correspondientes (Solo en linux)

```bash
sudo chmod 777 -R ./backend/storage
sudo chmod 777 -R ./backend/bootstrap
sudo chmod 777 -R ./backend/public
sudo chmod 777 -R ./backend/vendor
```

## Instalación del proyecto Frontend ([Nuxt 2](https://v2.nuxt.com/docs/get-started/installation))

### Paso 1. Entrar a la carpeta del proyecto frontend

```bash
cd frontend
```

### Paso 2. Usar nvm para instalar y usar la versión de node.js recomendada para este proyecto (v16.x)

```bash
#Automáticamente instalará la versión de node.js recomendada para este proyecto
nvm install

#Automáticamente usará la versión de node.js recomendada para este proyecto
nvm use 
```

### Paso 3. Verificar que estás usando la versión de node.js recomendada para este proyecto (v16.x)

```bash
node -v
```

### Paso 4. Instalar las dependencias del proyecto

```bash
npm install
```

### Paso 5. Iniciar el proyecto para desarrollo

```bash
npm run dev
```

### En caso de querer compilar el proyecto para producción

```bash
npm run build
npm run start
```

## Comandos básicos de Docker

```bash
# Descargar recursos que aún no tengas en tu equipo
docker compose pull

# Construir los contenedores
docker compose build <nombre de contenedor>

# Levantar los contenedores
docker compose up -d <nombre de contenedor>

# Detener los contenedores
docker compose down

# Ver los contenedores activos
docker ps

# Entrar a la consola del contenedor backend
docker compose exec -u devuser backend bash

# Salir de la consola de un contenedor
exit
```

## Uso del proyecto

### Acceso a la base de datos

Para acceder a la base de datos, puedes usar el cliente de base de datos que prefieras.

- **Host:** localhost
- **Puerto:** 8081
- **Usuario:** devuser
- **Contraseña:** root


### Acceso al backend

Para acceder al backend puedes usar las siguientes urls:

- **API URL:** http://localhost:8080/api
- **WebSockets URL:** http://localhost:8082

Para el uso de php artisan, debes entrar a la consola del contenedor backend:

```bash
docker compose exec -u devuser backend bash
```

### Acceso al frontend

Para acceder al frontend puedes usar la siguiente url: (Recuerda usar el comando `npm run dev`)

- **URL:** http://localhost:3000
