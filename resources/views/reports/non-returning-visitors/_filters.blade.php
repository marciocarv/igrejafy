<div class="card shadow-sm mb-4 no-print">

    <div class="card-header">

        <strong>Filtros</strong>

    </div>

    <div class="card-body">

        <form
            method="GET"
            action="{{ route('reports.non-returning-visitors') }}">

            <div class="row g-3 align-items-end">

                <div class="col-lg-3">

                    <x-form.input
                        name="start_date"
                        type="date"
                        label="Data inicial"
                        :value="$filters->startDate" />

                </div>

                <div class="col-lg-3">

                    <x-form.input
                        name="end_date"
                        type="date"
                        label="Data final"
                        :value="$filters->endDate" />

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

                    <label class="form-label">
                        Ações
                    </label>

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
                            onclick="window.print()">

                            <i class="bi bi-printer me-1"></i>

                            Imprimir

                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>
