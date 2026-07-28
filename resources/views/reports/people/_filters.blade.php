<div class="card shadow-sm mb-4">

    <div class="card-header">
        <strong>Filtros</strong>
    </div>

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('reports.people') }}">

            <div class="row g-3 align-items-end">

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
                            '0' => 'Inativo',
                            'all' => 'Todos',
                        ]"
                        :selected="match ($filters->isActive) {
                            true => '1',
                            false => '0',
                            null => 'all',
                        }"
                    />

                </div>

                <div class="col-lg-4">

                    <label class="form-label">Ações</label>

                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-file-earmark-text me-1"></i>

                            Gerar Relatório

                        </button>

                        <button
                            type="button"
                            class="btn btn-outline-secondary"
                            disabled>

                            <i class="bi bi-printer"></i>

                            Imprimir

                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>
