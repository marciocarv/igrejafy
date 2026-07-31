@extends('layouts.app')

@section('title', 'Visitas - ' . $person->name)

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1>Visitas</h1>

        <p class="text-muted mb-0">
            {{ $person->name }}
        </p>

    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('people.show', $person) }}"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>

            Voltar

        </a>

        <a
            href="{{ route('people.visits.create', $person) }}"
            class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>

            Registrar Visita

        </a>

    </div>

</div>

<div class="row g-3 mb-4">

    <div class="col-md-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex align-items-center">

                    <div class="me-3">

                        <i class="bi bi-calendar-check fs-2 text-primary"></i>

                    </div>

                    <div>

                        <div class="text-muted small">
                            Total de visitas
                        </div>

                        <div class="fs-4 fw-semibold">
                            {{ $summary->total }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex align-items-center">

                    <div class="me-3">

                        <i class="bi bi-calendar-plus fs-2 text-success"></i>

                    </div>

                    <div>

                        <div class="text-muted small">
                            Primeira visita
                        </div>

                        <div class="fs-5 fw-semibold">

                            {{ $summary->firstVisit?->format('d/m/Y') ?? '-' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex align-items-center">

                    <div class="me-3">

                        <i class="bi bi-calendar-event fs-2 text-warning"></i>

                    </div>

                    <div>

                        <div class="text-muted small">
                            Última visita
                        </div>

                        <div class="fs-5 fw-semibold">

                            {{ $summary->lastVisit?->format('d/m/Y') ?? '-' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('people.visits._table')

@endsection
