<div class="card shadow-sm mb-4">

    <div class="card-header">

        <strong>Filtros</strong>

    </div>

    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-4">

                    <x-form.input
                        name="name"
                        label="Nome"
                        :value="$filters->name"
                    />

                </div>

                <div class="col-md-3">

                    <x-form.select
                        name="person_type"
                        label="Tipo de Pessoa"
                        :options="$personTypes"
                        :selected="$filters->personType"
                    />

                </div>

                <div class="col-md-3">

                    <x-form.select
                        name="is_active"
                        label="Situação"
                        :options="[
                            '1' => 'Ativo',
                            '0' => 'Inativo',
                        ]"
                        :selected="is_null($filters->isActive) ? '' : ($filters->isActive ? '1' : '0')"
                    />

                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button
                        type="submit"
                        class="btn btn-primary me-2">

                        <i class="bi bi-search"></i>

                    </button>

                    <a
                        href="{{ route('people.index') }}"
                        class="btn btn-outline-secondary">

                        <i class="bi bi-x-circle"></i>

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>
