<div class="print-only mb-4">

    <div class="text-center">

        <h1 class="mb-1">
            Visitantes que Retornaram
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

        <div class="col-md-4">

            <strong>Período:</strong>

            {{ \Carbon\Carbon::parse($filters->startDate)->format('d/m/Y') }}

            até

            {{ \Carbon\Carbon::parse($filters->endDate)->format('d/m/Y') }}

        </div>

        <div class="col-md-4">

            <strong>Situação:</strong>

            @if($filters->isActive === true)

                Ativo

            @elseif($filters->isActive === false)

                Inativo

            @else

                Todos

            @endif

        </div>

        <div class="col-md-4">

            <strong>Visitantes que retornaram:</strong>

            {{ $visitors->total() }}

        </div>

    </div>

    <hr>

</div>
