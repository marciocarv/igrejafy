@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Bem-vindo ao IMIDE
        </h2>

        <p class="text-muted mb-0">

            Hoje é {{ now()->translatedFormat('l, d \d\e F \d\e Y') }}

        </p>

    </div>

</div>

{{-- ========================================================= --}}
{{-- RESUMO --}}
{{-- ========================================================= --}}

<div class="row g-3 mb-4">

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Pessoas
                        </small>

                        <h2 class="mb-0">

                            {{ $dashboard->totalPeople }}

                        </h2>

                    </div>

                    <i class="bi bi-people-fill fs-1 text-primary"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Membros
                        </small>

                        <h2 class="mb-0 text-success">

                            {{ $dashboard->totalMembers }}

                        </h2>

                    </div>

                    <i class="bi bi-person-check-fill fs-1 text-success"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Congregados
                        </small>

                        <h2 class="mb-0 text-info">

                            {{ $dashboard->totalCongregants }}

                        </h2>

                    </div>

                    <i class="bi bi-person-lines-fill fs-1 text-info"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Visitantes
                        </small>

                        <h2 class="mb-0 text-warning">

                            {{ $dashboard->totalVisitors }}

                        </h2>

                    </div>

                    <i class="bi bi-person-heart fs-1 text-warning"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row g-3 mb-5">

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Visitas no mês

                        </small>

                        <h2 class="mb-0">

                            {{ $dashboard->totalVisitsThisMonth }}

                        </h2>

                    </div>

                    <i class="bi bi-calendar-check fs-1 text-primary"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Batismos

                        </small>

                        <h2 class="mb-0">

                            {{ $dashboard->totalBaptisms }}

                        </h2>

                    </div>

                    <i class="bi bi-droplet-fill fs-1 text-primary"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Aniversários

                        </small>

                        <h2 class="mb-0">

                            {{ $dashboard->upcomingBirthdays }}

                        </h2>

                    </div>

                    <i class="bi bi-cake2-fill fs-1 text-danger"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Inativos

                        </small>

                        <h2 class="mb-0">

                            {{ $dashboard->inactivePeople }}

                        </h2>

                    </div>

                    <i class="bi bi-person-x-fill fs-1 text-secondary"></i>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- ========================================================= --}}
{{-- AÇÕES RÁPIDAS --}}
{{-- ========================================================= --}}
@include('dashboard._quick_actions')


{{-- ========================================================= --}}
{{-- PAINÉIS --}}
{{-- ========================================================= --}}

<div class="row">

    <div class="col-lg-4">

        <div class="card shadow-sm mb-4">

            <div class="card-header">

                <strong>

                    Visitas Recentes

                </strong>

            </div>

            <div class="list-group list-group-flush">

                @forelse($dashboard->recentVisits as $visit)

                    <div class="list-group-item">

                        <strong>

                            {{ $visit->person->name }}

                        </strong>

                        <br>

                        <small class="text-muted">

                            {{ $visit->visit_date->format('d/m/Y') }}

                        </small>

                    </div>

                @empty

                    <div class="list-group-item text-muted">

                        Nenhuma visita registrada.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card shadow-sm h-100">

            <div class="card-header">
                <strong>
                    <i class="bi bi-cake2 me-2"></i>
                    Próximos Aniversários
                </strong>
            </div>

            <div class="card-body">

                @forelse($dashboard->birthdayPeople as $person)

                    <div class="d-flex justify-content-between py-2 border-bottom">

                        <div>

                            <strong>{{ $person->name }}</strong>

                        </div>

                        <span class="text-muted">

                            {{ $person->birth_date?->format('d/m') }}

                        </span>

                    </div>

                @empty

                    <p class="text-muted mb-0">

                        Nenhum aniversário este mês.

                    </p>

                @endforelse

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card shadow-sm h-100">

            <div class="card-header">

                <strong>

                    <i class="bi bi-person-check me-2"></i>

                    Visitantes que Retornaram

                </strong>

            </div>

            <div class="card-body">

                @forelse($dashboard->returningVisitors as $person)

                    <div class="d-flex justify-content-between py-2 border-bottom">

                        <div>

                            <strong>{{ $person->name }}</strong>

                        </div>

                        <span class="badge bg-success">

                            {{ $person->visits_count }} visitas

                        </span>

                    </div>

                @empty

                    <p class="text-muted mb-0">

                        Nenhum visitante retornou.

                    </p>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection
