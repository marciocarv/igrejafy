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
                        <th>Tipo</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Situação</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($people as $person)

                        <tr>

                            <td>{{ $person->name }}</td>

                            <td>
                                @switch($person->person_type->label())
                                    @case('Membro') <span class="badge bg-success"> Membro </span>
                                        @break
                                    @case('Congregado') <span class="badge bg-primary"> Congregado </span>
                                        @break
                                    @default
                                     <span class="badge bg-warning text-dark"> Visitante </span>
                                @endswitch
                            </td>

                            <td>{{ $person->phone }}</td>

                            <td>{{ $person->email }}</td>

                            <td>

                                @if($person->is_active)

                                    <span class="badge bg-success">
                                        Ativo
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inativo
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-4">

                                Nenhum registro encontrado.

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

    <div class="col-md-6 d-flex justify-content-end">
        {{ $people->links() }}
    </div>

</div>
