# IMIDE

**IMIDE (Igreja Missionária IDE)** is a church management system developed with **Laravel 13**, designed to simplify member registration, visitor follow-up, baptisms, reports, and church administration.

The project follows a clean architecture (Controller → Service → Repository → Model) to ensure maintainability, scalability, and readability.

---

# Features

## Dashboard

- Church statistics
- Total people
- Members
- Congregants
- Visitors
- Baptisms
- Visits this month
- Upcoming birthdays
- Returning visitors
- Recent activity
- Quick actions

---

## People

- Register people
- Edit people
- View profile
- Soft delete
- Dynamic person types:
  - Visitor
  - Congregant
  - Member

Profile includes:

- Personal information
- Contact information
- Address
- Baptism information
- Visit history

---

## Baptism Module

- Register baptism
- Edit baptism
- Baptism certificate
- Landscape print layout

---

## Visits Module

- Register visits
- Visit history
- Last visit
- Number of visits
- Visitor follow-up

---

## Reports

### People

- Filter by person type
- Filter by active/inactive
- Print

### Birthdays

- Monthly birthdays
- Print

### Visits

- Date filters
- Summary cards
- Print

### Returning Visitors

- Visitors who returned
- Date filters
- Print

---

# Technology Stack

- PHP 8.3+
- Laravel 13
- MySQL / MariaDB
- Bootstrap 5
- Bootstrap Icons

---

# Architecture

The project follows the architecture:

```
Controller
    ↓
Service
    ↓
Repository
    ↓
Model
```

### Controller

Responsible only for handling requests and responses.

### Service

Contains business rules.

### Repository

Responsible only for database persistence.

### Model

Represents the database entities.

---

# Project Structure

```
app/

    Data/

    Enums/

    Filters/

    Http/

    Models/

    Repositories/

    Services/

resources/

    views/

        dashboard/

        people/

        reports/

        layouts/

routes/

database/
```

Views follow a modular structure.

Example:

```
people/

    index.blade.php

    create.blade.php

    edit.blade.php

    show.blade.php

    _form.blade.php

    _filters.blade.php

    _table.blade.php

    sections/

        _personal.blade.php

        _contact.blade.php

        _address.blade.php

        _baptism.blade.php

        _visits.blade.php
```

---

# Installation

Clone the repository.

```bash
git clone https://github.com/your-user/imide.git
```

Install dependencies.

```bash
composer install
```

Copy the environment file.

```bash
cp .env.example .env
```

Generate the application key.

```bash
php artisan key:generate
```

Configure your database in `.env`.

Run the migrations.

```bash
php artisan migrate
```

(Optional) Seed sample data.

```bash
php artisan db:seed
```

Start the local server.

```bash
php artisan serve
```

Open:

```
http://127.0.0.1:8000
```

---

# Database

Main tables:

```
people

baptisms

visits
```

All tables follow Laravel conventions:

- id
- timestamps
- soft deletes

---

# Coding Standards

The project follows the internal IMIDE Coding Standards.

Highlights:

- Thin Controllers
- Business rules in Services
- Database access through Repositories
- Bootstrap only
- Blade templates only
- One responsibility per class
- Readability over clever code

---

# Current Modules

- ✅ Dashboard
- ✅ People
- ✅ Baptism
- ✅ Visits
- ✅ People Reports
- ✅ Birthday Reports
- ✅ Visit Reports
- ✅ Returning Visitors Reports

---

# Roadmap

Future modules planned:

- Ministries
- Ministry Members
- Worship Services
- Attendance
- Classes / Discipleship
- Marriage
- Child Dedication
- Death Records
- Financial Management
- User Authentication & Roles
- PDF Reports
- Dashboard Analytics

---

# Screenshots

Future documentation will include screenshots of:

- Dashboard
- People Profile
- Baptism Module
- Visits Module
- Reports

---

# License

This project was developed exclusively for **Igreja Missionária IDE**.

All rights reserved.

---

# Author

Developed with ❤️ using Laravel.

**IMIDE – Igreja Missionária IDE**
