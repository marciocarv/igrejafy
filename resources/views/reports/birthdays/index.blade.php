@extends('layouts.app')

@section('title', 'Aniversariantes')

@section('content')

<div class="mb-4 no-print">

    <h1 class="mb-1">
        Aniversariantes
    </h1>

    <p class="text-muted mb-0">
        Consulte os aniversariantes por mês.
    </p>

</div>

@include('reports.birthdays._header')

@include('reports.birthdays._filters')

@include('reports.birthdays._table')

@endsection
