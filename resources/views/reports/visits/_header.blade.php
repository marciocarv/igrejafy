<div class="print-only mb-4">

    <div class="text-center">

        <h1 class="mb-1">
            Visitas
        </h1>

        <p class="mb-1">
            IMIDE - Sistema de Gestão Eclesiástica
        </p>

        <small class="text-muted">
            Data de emissão: {{ now()->format('d/m/Y') }}
        </small>

    </div>

    <hr>

    <div class="row small">

        <div class="col-md-3">

            <strong>Período:</strong>

            {{ \Carbon\Carbon::parse($filters->startDate)->format('d/m/Y') }}

            até

            {{ \Carbon\Carbon::parse($filters->endDate)->format('d/m/Y') }}

        </div>

        <div class="col-md-3">

            <strong>Tipo:</strong>

            {{ $filters->personType
                ? ($personTypes[$filters->personType] ?? $filters->personType)
                : 'Todos'
            }}

        </div>

        <div class="col-md-3">

            <strong>Situação:</strong>

            @if($filters->isActive === true)
                Ativo
            @elseif($filters->isActive === false)
                Inativo
            @else
                Todos
            @endif

        </div>

        <div class="col-md-3">

            <strong>Total:</strong>

            {{ $visits->total() }}

        </div>

    </div>

    <hr>

    <div class="row small mb-3">

        <div class="col-md-4">
            <strong>Total de visitas:</strong>
            {{ $summary->totalVisits }}
        </div>

        <div class="col-md-4">
            <strong>Pessoas que visitaram:</strong>
            {{ $summary->uniquePeople }}
        </div>

        <div class="col-md-4">
            <strong>Média por pessoa:</strong>
            {{ number_format($summary->averageVisitsPerPerson, 1, ',', '.') }}
        </div>

    </div>

    <hr>

</div>
