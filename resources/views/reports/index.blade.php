@extends('layouts.app')

@section('title', 'Relatórios')

@section('content')

<h1 class="mb-4">
    Relatórios
</h1>

<div class="list-group shadow-sm">

    <a
        href="{{ route('reports.people') }}"
        class="list-group-item list-group-item-action">

        <i class="bi bi-people me-2"></i>

        Listagem de Pessoas

    </a>

    <a
        href="{{ route('reports.birthdays') }}"
        class="list-group-item list-group-item-action">

        <i class="bi bi-cake2 me-2"></i>

        Aniversariantes

    </a>

    <a
        href="{{ route('reports.visits') }}"
        class="list-group-item list-group-item-action">

        <i class="bi bi-calendar-check me-2"></i>

        Visitas

    </a>

    <a
        href="{{ route('reports.returning-visitors') }}"
        class="list-group-item list-group-item-action">

        <i class="bi bi-arrow-repeat me-2"></i>

        Visitantes que Retornaram

    </a>

    <a
        href="{{ route('reports.non-returning-visitors') }}"
        class="list-group-item list-group-item-action">

        <i class="bi bi-person-x me-2"></i>

        Visitantes sem Retorno

    </a>

</div>

@endsection
