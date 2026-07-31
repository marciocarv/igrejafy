<div class="card shadow-sm">

    <div class="card-header">

        <strong>Resultado</strong>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-striped mb-0">

                <thead>

                    <tr>

                        <th>Data</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Telefone</th>
                        <th>Observações</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($visits as $visit)

                        <tr>

                            <td>

                                {{ $visit->visit_date->format('d/m/Y') }}

                            </td>

                            <td>

                                <a
                                    href="{{ route(
                                        'people.show',
                                        $visit->person
                                    ) }}"
                                    class="text-decoration-none fw-semibold">

                                    {{ $visit->person->name }}

                                </a>

                            </td>

                            <td>

                                {{ $visit->person->person_type->label() }}

                            </td>

                            <td>

                                {{ $visit->person->phone ?: '-' }}

                            </td>

                            <td>

                                {{ $visit->notes ?: '-' }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="text-center py-4">

                                Nenhuma visita encontrada.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<div class="row mt-3 align-items-center">

    <div class="col-md-6">

        <strong>

            Total de registros:
            {{ $visits->total() }}

        </strong>

    </div>

    <div class="col-md-6 d-flex justify-content-end no-print">

        {{ $visits->links() }}

    </div>

</div>
