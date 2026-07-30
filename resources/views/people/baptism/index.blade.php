@extends('layouts.app')

@section('title', 'Batismo - ' . $person->name)

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1>Batismo</h1>

        <p class="text-muted mb-0">

            {{ $person->name }}

        </p>

    </div>

    <a
        href="{{ route('people.show', $person) }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>

        Voltar

    </a>

</div>

<div class="card shadow-sm">

    <div class="card-header">

        <strong>
            Dados do Batismo
        </strong>

    </div>

    <div class="card-body">

        <form
            action="{{ $baptism
                ? route('people.baptism.update', $person)
                : route('people.baptism.store', $person) }}"
            method="POST">

            @csrf

            @if($baptism)
                @method('PUT')
            @endif

            @include('people.baptism._form')

            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-check-lg me-1"></i>

                    {{ $baptism ? 'Atualizar Batismo' : 'Registrar Batismo' }}

                </button>

                <a
                    href="{{ route('people.show', $person) }}"
                    class="btn btn-outline-secondary">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
