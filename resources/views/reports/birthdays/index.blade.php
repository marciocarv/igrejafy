@extends('layouts.app')

@section('title', 'Aniversariantes')

@section('content')

<div class="mb-4">

    <h1>Aniversariantes</h1>

    <p class="text-muted">

        Consulte os aniversariantes por mês.

    </p>

</div>

@include('reports.birthdays._filters')

@include('reports.birthdays._table')

@endsection
