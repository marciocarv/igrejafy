@extends('layouts.app')

@section('title', $person->name)

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1>{{ $person->name }}</h1>

        <p class="text-muted mb-0">

            Perfil da Pessoa

        </p>

    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('people.index') }}"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>

            Voltar

        </a>

        <a
            href="{{ route('people.edit', $person) }}"
            class="btn btn-primary">

            <i class="bi bi-pencil me-1"></i>

            Editar

        </a>

    </div>

</div>

<div class="row">

    <div class="col-lg-3">

        @include('people.sections._profile')

        @include('people.sections._modules')

    </div>

    <div class="col-lg-9">

        @include('people.sections._personal')

        @include('people.sections._contact')

        @include('people.sections._address')

    </div>

</div>

@endsection
