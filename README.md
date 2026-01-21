# Library Management System (Laravel 11)

## Overview

The **Library Management System** is a Laravel 11 web application designed to manage books, authors, students, and categories within a library environment. The system provides full CRUD (Create, Read, Update, Delete) functionality for all resources, supports authentication-protected routes, and includes image upload capabilities for book covers and author profiles.

This README provides a high-level view of the system architecture, core entities, technology stack, and workflows.

---

## Purpose & Scope

The system is built to:

* Manage library resources efficiently.
* Track book ownership, borrowing, and categorization.
* Provide a secure, user-friendly web interface for administrators and staff.

It supports:

* Role-based access (via authentication middleware).
* File uploads and automatic file management.
* RESTful route structure.
* API access using token-based authentication (Sanctum).

---

## System Architecture

The application follows Laravel’s **Model-View-Controller (MVC)** architecture with clear separation of concerns.

### High-Level MVC Structure

* **Routing Layer** – `routes/web.php`

  * Defines all web routes grouped by resource.
  * Follows RESTful conventions for all CRUD operations.

* **Middleware Layer** – `app/Http/Middleware/Auth.php`

  * Protects all resource routes.
  * API routes use `auth:sanctum` for token-based authentication.

* **Controller Layer** – `app/Http/Controllers/`

  * `BookController`, `AuthorController`, `StudentController`, `CategoryController` handle business logic.
  * `AuthController` manages registration, login, and logout.

* **Model Layer** – `app/Models/`

  * Eloquent ORM models define database relationships and abstractions.
  * `Book` is the central model linking authors, students, and categories.

* **View Layer** – `resources/views/`

  * Blade templates render HTML pages.
  * All pages extend the master layout in `resources/views/layout/master.blade.php`.

---

## Core Resources

| Resource   | Controller         | Model    | Key Features                                                                                      |
| ---------- | ------------------ | -------- | ------------------------------------------------------------------------------------------------- |
| Books      | BookController     | Book     | Name, description, price, cover image, author assignment, student assignment, multiple categories |
| Authors    | AuthorController   | Author   | Name, email, bio, job description, profile picture, associated book                               |
| Students   | StudentController  | Student  | Name, email, phone, borrowed books                                                                |
| Categories | CategoryController | Category | Name, associated books (many-to-many)                                                             |

Each resource implements full CRUD functionality with validation and authentication.

---

## Route Structure

All resources follow the same RESTful pattern:

* `GET /resource` → List
* `GET /resource/create` → Show create form
* `POST /resource` → Store
* `GET /resource/{id}/edit` → Show edit form
* `PUT/PATCH /resource/{id}` → Update
* `DELETE /resource/{id}` → Delete

All routes are wrapped with authentication middleware to ensure only logged-in users can access them.

---

## Technology Stack

### Backend

* **Framework:** Laravel 11
* **Language:** PHP ^8.2
* **Authentication:** Laravel Sanctum (API tokens) + Session-based auth (web)
* **Testing:** Pest
* **Code Style:** Laravel Pint
* **Scaffolding:** Laravel Breeze

### Frontend

* **Templating:** Blade
* **Styling:** Bootstrap 5
* **Icons:** Font Awesome
* **Interactivity:** Alpine.js
* **Asset Bundling:** Vite

---

## Authentication & Request Flow

### Authentication Methods

1. **Session-Based Authentication (Web)**

   * Custom `Auth` middleware protects all web routes.
   * Unauthenticated users are redirected to `/auth/login`.

2. **Token-Based Authentication (API)**

   * Laravel Sanctum issues API tokens stored in the `personal_access_tokens` table.

### Public Authentication Endpoints

* `GET /auth/register` – Registration form
* `POST /auth/register` – Create new user
* `GET /auth/login` – Login form
* `POST /auth/login` – Authenticate user
* `GET /auth/logout` – Log out user

---

## Data Model & Relationships

The data model centers around the **Book** entity:

* **Book → Author** (belongsTo)

  * Each book optionally belongs to one author via `author_id`.

* **Book → Student** (belongsTo)

  * Each book optionally belongs to one student via `student_id`, indicating borrowing/assignment.

* **Book → Category** (belongsToMany)

  * Books can belong to multiple categories through a pivot table.

* **Author → Book** (hasOne)

  * Authors reference one featured book via `book_id`.

All models use Laravel’s Eloquent ORM with the `HasFactory` trait.

---

## Key Features

### CRUD Operations

* Full management of books, authors, students, and categories.
* Server-side validation on all create and update operations.
* Soft delete support for all resources.

### File Management

* Image uploads for book covers and author profiles.
* Files stored in: `public/assets/files/`
* Automatic cleanup of old files on update.
* Validation for image formats: jpeg, jpg, gif, webp.

### User Interface

* Master layout with fixed sidebar navigation.
* Top navbar with search functionality.
* Authentication-aware UI using `@auth` and `@guest`.
* Session flash messages displayed using Bootstrap toasts.
* User profile display for authenticated users.

### Data Integrity

* Many-to-many category assignment via pivot table.
* Foreign key constraints enforce referential integrity.
* Cascade deletion for related entities.

### API Support

* Token-based authentication via Sanctum.
* Separate API routes from web routes.
* Token management through `personal_access_tokens` table.

---

## Directory Structure

```text
app/Http/Controllers/   # Business logic controllers
app/Http/Middleware/    # Custom middleware (Auth)
app/Models/             # Eloquent ORM models
database/migrations/    # Database schema definitions
resources/views/        # Blade templates
resources/views/layout/ # Master layout and partials
routes/                 # Web and API route definitions
public/assets/files/    # Uploaded images storage
composer.json           # PHP dependency configuration
package.json            # JavaScript dependency configuration
```

---

## Additional Documentation (PDFs)

You can find detailed technical documentation in the following PDF files:

* 📄 [Authentication & Security](docs/authentication.pdf)
* 📄 [Database Design](docs/database.pdf)
* 📄 [MVC Structure](docs/MVC%20structure.pdf)
* 📄 [Routing System](docs/Routes.pdf)

---

## Next Steps

For more detailed information:

* **Installation & Setup:** See *Getting Started*
* **MVC Architecture Details:** See *Application Architecture*
* **Authentication & Security:** See *Authentication & Security*
* **Resource CRUD Details:** See *Resource Management*
* **Frontend UI:** See *Frontend & User Interface*
* **Database Schema:** See *Data Layer*

---

*Maintained by Steven Hany Elia*
