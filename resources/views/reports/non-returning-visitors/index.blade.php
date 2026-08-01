@extends('layouts.app')

@section('title', 'Visitantes sem Retorno')

@section('content')

<div class="mb-4 no-print">

    <h1 class="mb-1">
        Visitantes sem Retorno
    </h1>

    <p class="text-muted mb-0">
        Visitantes que tiveram apenas uma visita no período selecionado.
    </p>

</div>

@include('reports.non-returning-visitors._header')

@include('reports.non-returning-visitors._filters')

@include('reports.non-returning-visitors._table')

@endsection
