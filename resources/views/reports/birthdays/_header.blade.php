<div class="print-only mb-4">

    <div class="text-center">

        <h1 class="mb-1">
            Aniversariantes
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

            <strong>Mês:</strong>

            @if($filters->month)

                {{ $months[$filters->month] }}

            @else

                Todos

            @endif

        </div>

        <div class="col-md-4">

            <strong>Tipo de Pessoa:</strong>

            {{ $filters->personType
                ? ($personTypes[$filters->personType] ?? $filters->personType)
                : 'Todos'
            }}

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

    </div>

    <hr>

</div>
