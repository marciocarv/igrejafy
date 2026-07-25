<div class="card shadow-sm mb-4">

    <div class="card-header">
        <strong>Filtros</strong>
    </div>

    <div class="card-body">

        <form method="GET">

            <div class="row g-3 align-items-end">

                <div class="col-lg-5">

                    <x-form.input
                        name="name"
                        label="Nome"
                        :value="$filters->name" />

                </div>

                <div class="col-lg-3">

                    <x-form.select
                        name="person_type"
                        label="Tipo de Pessoa"
                        :options="$personTypes"
                        :selected="$filters->personType" />

                </div>

                <div class="col-lg-2">

                    <x-form.select
                        name="is_active"
                        label="Situação"
                        :options="[
                            '1' => 'Ativo',
                            '0' => 'Inativo'
                        ]"
                        :selected="is_null($filters->isActive) ? '' : ($filters->isActive ? '1' : '0')" />

                </div>

                <div class="col-lg-2">

                    <label class="form-label">Ações</label>

                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary flex-grow-1">

                            Pesquisar

                        </button>

                        <a
                            href="{{ route('people.index') }}"
                            class="btn btn-outline-secondary">

                            Limpar

                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>
