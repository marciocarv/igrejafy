<div class="card shadow-sm">

    <div class="card-header">

        <strong>Histórico de Visitas</strong>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-striped mb-0">

                <thead>

                    <tr>

                        <th>Data</th>
                        <th>Observações</th>
                        <th class="text-end">Ações</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($visits as $visit)

                        <tr>

                            <td>

                                {{ $visit->visit_date->format('d/m/Y') }}

                            </td>

                            <td>

                                {{ $visit->notes ?: '-' }}

                            </td>

                            <td class="text-end">

                                <form
                                    method="POST"
                                    action="{{ route(
                                        'people.visits.destroy',
                                        [$person, $visit]
                                    ) }}"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Deseja remover esta visita?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="3"
                                class="text-center py-4">

                                Nenhuma visita registrada.

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
            Total de visitas: {{ $visits->total() }}
        </strong>

    </div>

    <div class="col-md-6 d-flex justify-content-end">

        {{ $visits->links() }}

    </div>

</div>
