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

    <a
        href="{{ route('people.edit', $person) }}"
        class="btn btn-primary">

        <i class="bi bi-pencil"></i>

        Editar

    </a>

</div>

<div class="row">

    <div class="col-lg-3">

        @include('people.partials._profile')

        @include('people.partials._modules')

    </div>

    <div class="col-lg-9">

        @include('people.partials._personal')

        @include('people.partials._contact')

        @include('people.partials._address')

    </div>

</div>

@endsection
