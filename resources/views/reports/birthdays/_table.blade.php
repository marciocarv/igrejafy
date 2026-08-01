<div class="card shadow-sm">

    <div class="card-header">

        <strong>Resultado</strong>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-striped mb-0">

                <thead>

                    <tr>

                        <th>Nome</th>
                        <th>Aniversário</th>
                        <th>Idade</th>
                        <th>Tipo</th>
                        <th>Telefone</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($people as $person)

                        <tr>

                            <td>
                                {{ $person->name }}
                            </td>

                            <td>
                                {{ $person->birth_date->format('d/m') }}
                            </td>

                            <td>
                                {{ $person->birth_date->age }}
                            </td>

                            <td>

                                {{ $person->person_type->label() }}

                            </td>

                            <td>

                                {{ $person->phone ?: '-' }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="text-center py-4">

                                <div class="text-center py-5">

                                    <i class="bi bi-inbox display-4 text-secondary"></i>

                                    <h5 class="mt-3">

                                        Nenhum registro encontrado

                                    </h5>

                                    <p class="text-muted mb-0">

                                        Ajuste os filtros ou realize um novo cadastro.

                                    </p>

                                </div>

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
            Total de registros: {{ $people->total() }}
        </strong>

    </div>

    <div class="col-md-6 d-flex justify-content-end no-print">

        {{ $people->links() }}

    </div>

</div>
