@extends('layouts.app')

@section('title', 'Relatório de Pessoas')

@section('content')

<h1 class="mb-1">

    Listagem de Pessoas

</h1>

<p class="text-muted mb-4">
    Gere uma listagem do cadastro de pessoas utilizando os filtros abaixo.
</p>

@include('reports.people._filters')

@include('reports.people._table')

@endsection
