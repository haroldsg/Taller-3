# Phasmophobia Wiki - Sistema de Gestion de Contactos

### Taller 3: Implementacion de Arquitectura MVC y Frameworks

---

## Descripcion del Proyecto

Sistema de gestion de contactos desarrollado con el patron de diseno **Modelo-Vista-Controlador (MVC)** utilizando **Laravel 12** como framework backend. El proyecto integra el diseno responsivo del Taller 1 (Phasmophobia Wiki) con el formulario de contactos del Taller 2, implementando persistencia en base de datos MySQL.

---

## Requisitos Previos

- **PHP** >= 8.2
- **Composer** (Gestor de dependencias de PHP)
- **MySQL** >= 5.7 o **MariaDB** >= 10.3
- **XAMPP**, **Laragon** o servidor web similar
- **Node.js** (opcional, para compilar assets)

---

## Instalacion

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/taller_3.git
cd taller_3
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Configurar el archivo de entorno

Copiar el archivo de ejemplo y configurarlo:

```bash
cp .env.example .env
```

Editar el archivo `.env` con los datos de tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taller_3
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generar la clave de la aplicacion

```bash
php artisan key:generate
```

### 5. Crear la base de datos

Crear una base de datos llamada `taller_3` en MySQL:

```sql
CREATE DATABASE taller_3;
```

### 6. Ejecutar las migraciones

```bash
php artisan migrate
```

### 7. Poblar la base de datos con datos iniciales (20 contactos)

```bash
php artisan db:seed --class=ContactoSeeder
```

### 8. Iniciar el servidor de desarrollo

```bash
php artisan serve
```

## Estructura de la Base de Datos

### Tabla: `contactos`

| Campo         | Tipo                | Restricciones                              |
|---------------|---------------------|-------------------------------------------|
| id            | BIGINT UNSIGNED     | PRIMARY KEY, AUTO_INCREMENT               |
| cedula        | VARCHAR(255)        | UNIQUE, NOT NULL                          |
| nombre        | VARCHAR(255)        | NOT NULL                                  |
| apellido      | VARCHAR(255)        | NOT NULL                                  |
| edad          | TINYINT UNSIGNED    | NOT NULL (16-89)                          |
| genero        | ENUM                | 'masculino', 'femenino', 'otro'           |
| telefono      | VARCHAR(12)         | NOT NULL (formato: XXXX-XXXXXXX)          |
| telefono2     | VARCHAR(12)         | NULLABLE                                  |
| email         | VARCHAR(255)        | NOT NULL                                  |
| email2        | VARCHAR(255)        | NULLABLE                                  |
| estado_civil  | ENUM                | 'soltero', 'casado', 'divorciado', 'concubinato', 'viudo' |
| direccion     | VARCHAR(255)        | NOT NULL                                  |
| departamento  | VARCHAR(255)        | NOT NULL                                  |
| cargo         | VARCHAR(255)        | NOT NULL                                  |
| created_at    | TIMESTAMP           | AUTO                                      |
| updated_at    | TIMESTAMP           | AUTO                                      |

### Tabla: `users`

| Campo              | Tipo            | Restricciones                    |
|--------------------|-----------------|----------------------------------|
| id                 | BIGINT UNSIGNED | PRIMARY KEY, AUTO_INCREMENT      |
| name               | VARCHAR(255)    | NOT NULL                         |
| email              | VARCHAR(255)    | UNIQUE, NOT NULL                 |
| password           | VARCHAR(255)    | NOT NULL                         |
| security_question  | VARCHAR(255)    | NOT NULL                         |
| security_answer    | VARCHAR(255)    | NOT NULL                         |
| created_at         | TIMESTAMP       | AUTO                             |
| updated_at         | TIMESTAMP       | AUTO                             |

---

## Rutas Principales

| Metodo | Ruta                    | Accion                      |
|--------|-------------------------|-----------------------------|
| GET    | /login                  | Formulario de login         |
| POST   | /login                  | Procesar login              |
| GET    | /register               | Formulario de registro      |
| POST   | /register               | Procesar registro           |
| POST   | /logout                 | Cerrar sesion               |
| GET    | /forgot-password        | Recuperar contrasena        |
| GET    | /                       | Pagina de inicio            |
| GET    | /guia                   | Pagina de guia              |
| GET    | /curiosidades           | Pagina de curiosidades      |
| GET    | /contactos              | Lista de contactos          |
| GET    | /contactos/create       | Formulario nuevo contacto   |
| POST   | /contactos              | Guardar nuevo contacto      |
| GET    | /contactos/{id}/edit    | Formulario editar contacto  |
| PUT    | /contactos/{id}         | Actualizar contacto         |
| DELETE | /contactos/{id}         | Eliminar contacto           |

---

## Tecnologias Utilizadas

- **Backend**: Laravel 12 (PHP 8.2)
- **Frontend**: Blade Templates, Bootstrap 5.3, Bootstrap Icons
- **Base de Datos**: MySQL
- **Validacion**: W3C HTML5 y CSS3

