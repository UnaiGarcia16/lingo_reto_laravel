🧩 Lingo Reto Laravel

Este proyecto es una versión del juego Lingo, desarrollada con Laravel y configurada para ejecutarse fácilmente usando Docker.

🚀 Cómo ejecutar el proyecto

Clonar el repositorio

git clone https://github.com/UnaiGarcia16/lingo_reto_laravel.git
cd lingo_reto_laravel


Levantar los contenedores con Docker

docker-compose up -d


Acceder al contenedor PHP

docker exec -it php bash


Instalar dependencias de Laravel

composer install


Configurar el entorno
Copia el archivo de ejemplo y edita tus variables de entorno:

cp .env.example .env
php artisan key:generate


Acceder desde el navegador
Normalmente en: http://localhost:8000

📁 Estructura del proyecto
lingo_reto_laravel/
├── docker/
│   └── php/               # Configuración del contenedor PHP
├── src/                   # Código fuente del proyecto Laravel
├── docker-compose.yml     # Configuración de los servicios
└── README.md

🛠️ Tecnologías utilizadas

Laravel – Framework PHP para el desarrollo backend

Docker – Para crear un entorno de desarrollo aislado

PHP – Lenguaje principal del proyecto

Composer – Gestor de dependencias de PHP

👨‍💻 Autor

Proyecto creado por Unai García como parte de un reto con Laravel y Docker.
