@extends('layouts.app')

@section('title', 'Editar Pessoa')

@section('content')

<x-page-header
    title="Editar Pessoa"
    subtitle="Atualize os dados da pessoa."
/>

<div class="card shadow-sm">

    <div class="card-body">

        <form
            action="{{ route('people.update', $person) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('people._form')

            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-primary">

                    Salvar Alterações

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
