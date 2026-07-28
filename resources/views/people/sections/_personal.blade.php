<div class="card shadow-sm mb-3">

    <div class="card-header">

        <strong>Dados Pessoais</strong>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <strong>Nome</strong>

                <p class="mb-0">

                    {{ $person->name }}

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Tipo</strong>

                <p class="mb-0">

                    {{ $person->person_type->label() }}

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Gênero</strong>

                <p class="mb-0">

                    {{ $person->gender->label() }}

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Data de Nascimento</strong>

                <p class="mb-0">

                    {{ $person->birth_date?->format('d/m/Y') ?? '-' }}

                </p>

            </div>

            <div class="col-md-6">

                <strong>Situação</strong>

                <p class="mb-0">

                    {{ $person->is_active ? 'Ativo' : 'Inativo' }}

                </p>

            </div>

        </div>

    </div>

</div>
