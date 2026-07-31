@extends('layouts.app')

@section('title', 'Visitantes que Retornaram')

@section('content')

<div class="mb-4 no-print">

    <h1 class="mb-1">
        Visitantes que Retornaram
    </h1>

    <p class="text-muted mb-0">
        Identifique visitantes que retornaram à igreja durante o período selecionado.
    </p>

</div>

@include('reports.returning-visitors._header')

@include('reports.returning-visitors._filters')

@include('reports.returning-visitors._table')

@endsection
