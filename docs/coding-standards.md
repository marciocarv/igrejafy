# IMIDE - Coding Standards

Version: 1.0

---

# Purpose

This document defines the architectural and coding conventions adopted in IMIDE.

Every new module should follow these standards to keep the project consistent, maintainable and scalable.

---

# Technology Stack

- PHP 8.3+
- Laravel 13
- MySQL / MariaDB
- Bootstrap 5
- Bootstrap Icons
- Blade Templates

---

# Architecture

IMIDE follows the layered architecture below:

Controller
↓
Service
↓
Repository
↓
Model

## Responsibilities

### Controller

- Receive requests
- Validate input
- Create Data objects
- Call Services
- Return Views or Redirects

Controllers should remain as thin as possible.

---

### Service

Services contain all business rules.

Examples:

- Register a baptism
- Promote a visitor to congregant
- Register a visit
- Generate reports
- Validate church rules

Services should never contain SQL queries.

---

### Repository

Repositories are responsible only for persistence.

Examples:

- find()
- findOrFail()
- paginate()
- create()
- update()
- delete()

Business rules do not belong here.

---

### Model

Models represent the database entities.

Models should not contain business rules.

---

# Module Structure

Each module should follow the same organization.

Example:

people/

    index.blade.php

    create.blade.php

    edit.blade.php

    show.blade.php

    _form.blade.php

    _filters.blade.php

    _table.blade.php

    sections/

        _profile.blade.php

        _personal.blade.php

        _contact.blade.php

        _address.blade.php

        _modules.blade.php

The same structure should be adopted whenever applicable.

---

# Sections

Large pages should be divided into sections.

Examples:

- Person Profile
- Dashboard
- Reports

Rules:

- Store inside a sections folder.
- Prefix filenames with "_".
- Each section must have a single responsibility.

Example:

show.blade.php

@include('people.sections._profile')

@include('people.sections._contact')

@include('people.sections._address')

The main page should orchestrate the layout only.

---

# Reusable Blade Files

Small reusable view fragments should remain in the module root.

Examples:

_form.blade.php

_filters.blade.php

_table.blade.php

These files are shared between pages of the same module.

---

# Naming

## Models

Person

Baptism

Visit

Family

Ministry

Attendance

---

## Controllers

PersonController

BaptismController

VisitController

---

## Report Controllers

PersonReportController

BirthdayReportController

BaptismReportController

---

## Services

PersonService

BaptismService

VisitService

---

## Repositories

PersonRepository

BaptismRepository

VisitRepository

---

## Interfaces

PersonRepositoryInterface

BaptismRepositoryInterface

VisitRepositoryInterface

---

# Data Objects

Communication between Controllers and Services must use Data classes.

Examples:

PersonData

BaptismData

VisitData

Avoid passing arrays between layers.

---

# Filters

Every listing or report with filters should have its own Filter class.

Examples:

PersonFilters

BirthdayReportFilters

Each module owns its own filters.

---

# Enums

Every Enum must expose the same API.

Example:

public function label(): string

public static function options(): array

Convention:

value

Database value.

label()

Text displayed to the user.

options()

Options for Select components.

Never duplicate labels inside Blade templates.

---

# Database

Tables

people

baptisms

visits

ministries

families

attendances

Columns

id

created_at

updated_at

deleted_at

Soft Deletes should be used whenever appropriate.

---

# Views

Complete pages

index.blade.php

create.blade.php

edit.blade.php

show.blade.php

Reusable files

_form.blade.php

_filters.blade.php

_table.blade.php

Large page fragments

sections/

---

# Frontend

Use Bootstrap only.

Allowed

Bootstrap 5

Bootstrap Icons

Blade

Not Allowed

Tailwind CSS

Vue

React

Livewire

Alpine (unless strictly necessary)

---

# UI Standards

Every page should follow the same visual language.

Cards

card shadow-sm

Headers

card-header

Content

card-body

Layout

Bootstrap Grid

Labels

<strong>

Values

<p class="mb-0">

Status

Bootstrap Badges

Icons

Bootstrap Icons

Avoid emojis.

---

# Forms

Prefer reusable Blade Components.

Examples:

<x-form.input>

<x-form.select>

<x-form.textarea>

Keep validation messages consistent.

---

# Components

Blade Components should be created only when reused across multiple modules.

Good examples

Form Inputs

Cards

Person Avatar

Status Badge

Avoid creating components used only once.

---

# Reports

Reports are independent modules.

Structure

reports/

    people/

        index.blade.php

        _filters.blade.php

        _table.blade.php

    birthdays/

        index.blade.php

        _filters.blade.php

        _table.blade.php

Each report should expose a single public method.

index()

Reports should be read-only.

---

# Business Rules

Business rules belong exclusively to Services.

Repositories should never decide:

Who can be baptized

Who becomes a member

Church rules

Promotion rules

Those belong to Services.

---

# General Principles

Keep it simple.

Prefer readability over clever code.

Avoid unnecessary abstractions.

One responsibility per class.

One responsibility per view.

One responsibility per section.

One step at a time.

Write code for the next developer.

That developer will probably be yourself in six months.

---

# Future Modules

Every future module should follow these standards.

Examples:

People

Baptism

Visits

Family

Ministries

Attendance

Finance

Events

Reports

Consistency is more important than cleverness.
