@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h1 class="mb-4">
    Dashboard
</h1>

<div class="row">

    <div class="col-md-4 mb-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Membros
                </h6>

                <h2>
                    {{ $totalMembers }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Congregados
                </h6>

                <h2>
                    {{ $totalCongregants }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Visitantes
                </h6>

                <h2>
                    {{ $totalVisitors }}
                </h2>

            </div>

        </div>

    </div>

</div>

@endsection
