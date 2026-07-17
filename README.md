# Sistema de Registro de Vehículos

Proyecto del primer parcial de Programación Web II. Implementa un CRUD de vehículos para un taller automotriz con Laravel, Blade y MySQL.

## Funcionalidades

- Registrar vehículos con placa, marca, modelo, año y color.
- Listar todos los vehículos registrados.
- Editar y actualizar registros.
- Eliminar registros con confirmación.
- Validación de campos y placa única.
- Mensajes de confirmación y diseño adaptable a dispositivos móviles.

## Requisitos

- PHP 8.2 o superior.
- Composer.
- Node.js y npm.
- MySQL.

## Instalación

```bash
composer install
copy .env.example .env
php artisan key:generate
npm install
npm run build
```

Crea en MySQL una base de datos llamada `nandoproyectoevaluacion`. Si tu usuario, contraseña o puerto son diferentes, actualiza esos valores en `.env`.

```sql
CREATE DATABASE nandoproyectoevaluacion
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Luego ejecuta:

```bash
php artisan migrate
php artisan serve
```

Abre `http://127.0.0.1:8000`. Para desarrollo del frontend también puedes ejecutar `npm run dev` en otra terminal.

## Pruebas

Las pruebas usan SQLite en memoria, por lo que no modifican la base MySQL:

```bash
php artisan test
```
