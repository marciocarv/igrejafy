<div class="card shadow-sm">

    <div class="card-header">

        <strong>Visitantes que Retornaram</strong>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-striped mb-0">

                <thead>

                    <tr>

                        <th>Nome</th>
                        <th>Visitas</th>
                        <th>Primeira Visita</th>
                        <th>Última Visita</th>
                        <th>Telefone</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($visitors as $visitor)

                        <tr>

                            <td>

                                <a
                                    href="{{ route(
                                        'people.show',
                                        $visitor->id
                                    ) }}"
                                    class="text-decoration-none fw-semibold">

                                    {{ $visitor->name }}

                                </a>

                            </td>

                            <td>

                                <span class="badge bg-primary">

                                    {{ $visitor->visits_count }}

                                </span>

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse(
                                    $visitor->first_visit
                                )->format('d/m/Y') }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse(
                                    $visitor->last_visit
                                )->format('d/m/Y') }}

                            </td>

                            <td>

                                {{ $visitor->phone ?: '-' }}

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

            Total de visitantes:

            {{ $visitors->total() }}

        </strong>

    </div>

    <div class="col-md-6 d-flex justify-content-end no-print">

        {{ $visitors->links() }}

    </div>

</div>
