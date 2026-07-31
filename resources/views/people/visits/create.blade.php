@extends('layouts.app')

@section('title', 'Registrar Visita - ' . $person->name)

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1>Registrar Visita</h1>

        <p class="text-muted mb-0">
            {{ $person->name }}
        </p>

    </div>

    <a
        href="{{ route('people.visits.index', $person) }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>

        Voltar

    </a>

</div>

<div class="card shadow-sm">

    <div class="card-header">

        <strong>Dados da Visita</strong>

    </div>

    <div class="card-body">

        <form
            method="POST"
            action="{{ route('people.visits.store', $person) }}">

            @csrf

            @include('people.visits._form')

            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-check-lg me-1"></i>

                    Registrar Visita

                </button>

                <a
                    href="{{ route('people.visits.index', $person) }}"
                    class="btn btn-outline-secondary">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
