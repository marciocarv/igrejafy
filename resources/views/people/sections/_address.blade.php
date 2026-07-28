<div class="card shadow-sm mb-3">

    <div class="card-header">

        <strong>Endereço</strong>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-12 mb-3">

                <strong>

                    <i class="bi bi-geo-alt-fill me-2"></i>

                    Endereço

                </strong>

                <p class="mb-0">

                    {{ $person->street ?: '-' }}

                    @if($person->number)

                        , {{ $person->number }}

                    @endif

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Bairro</strong>

                <p class="mb-0">

                    {{ $person->neighborhood ?: '-' }}

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Cidade / UF</strong>

                <p class="mb-0">

                    {{ $person->city ?: '-' }}

                    @if($person->state)

                        - {{ $person->state }}

                    @endif

                </p>

            </div>

            @if($person->complement)

                <div class="col-md-12 mb-3">

                    <strong>Complemento</strong>

                    <p class="mb-0">

                        {{ $person->complement }}

                    </p>

                </div>

            @endif

            <div class="col-md-12">

                <strong>CEP</strong>

                <p class="mb-0">

                    {{ $person->zip_code ?: '-' }}

                </p>

            </div>

        </div>

    </div>

</div>
