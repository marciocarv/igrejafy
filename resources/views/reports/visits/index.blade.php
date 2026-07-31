@extends('layouts.app')

@section('title', 'Visitas')

@section('content')

<div class="mb-4 no-print">

    <h1 class="mb-1">
        Visitas
    </h1>

    <p class="text-muted mb-0">
        Consulte as visitas registradas em determinado período.
    </p>

</div>

<div class="row g-3 mb-4 no-print">

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
                            {{ $summary->totalVisits }}
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

                        <i class="bi bi-people fs-2 text-success"></i>

                    </div>

                    <div>

                        <div class="text-muted small">
                            Pessoas que visitaram
                        </div>

                        <div class="fs-4 fw-semibold">
                            {{ $summary->uniquePeople }}
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

                        <i class="bi bi-bar-chart-line fs-2 text-warning"></i>

                    </div>

                    <div>

                        <div class="text-muted small">
                            Média de visitas por pessoa
                        </div>

                        <div class="fs-4 fw-semibold">
                            {{ number_format($summary->averageVisitsPerPerson, 1, ',', '.') }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('reports.visits._header')

@include('reports.visits._filters')

@include('reports.visits._table')

@endsection
