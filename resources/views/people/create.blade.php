@extends('layouts.app')

@section('title', 'Nova Pessoa')

@section('content')

<x-page-header
    title="Nova Pessoa"
    subtitle="Cadastre um membro, congregado ou visitante."
/>

<div class="card shadow-sm">

    <div class="card-body">

        <form
            action="{{ route('people.store') }}"
            method="POST">

            @csrf

            @include('people._form')

            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-check-lg"></i>

                    Salvar

                </button>

                <a
                    href="{{ route('people.index') }}"
                    class="btn btn-secondary">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
