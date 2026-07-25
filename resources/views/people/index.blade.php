@extends('layouts.app')

@section('title', 'Pessoas')

@section('content')

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h1>Pessoas</h1>

                <p class="text-muted">
                    Gerencie membros, congregados e visitantes.
                </p>

            </div>

            <a
                href="{{ route('people.create') }}"
                class="btn btn-primary">

                <i class="bi bi-plus-lg"></i>

                Nova Pessoa

            </a>

        </div>

        @include('people._filters')

        <div class="d-flex justify-content-between align-items-center mb-3">

            <span class="text-muted">

                Total de registros:
                <strong>{{ $people->total() }}</strong>

            </span>

        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Nome</th>

                        <th>Tipo</th>

                        <th>Telefone</th>

                        <th>E-mail</th>

                        <th class="text-center">Status</th>

                        <th class="text-center">Ações</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($people as $person)

                        <tr>

                            <td>

                                {{ $person->name }}

                            </td>

                            <td>

                                {{ $person->person_type->label() }}

                            </td>

                            <td>

                                {{ $person->phone ?? '-' }}

                            </td>

                            <td>

                                {{ $person->email ?? '-' }}

                            </td>

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

                            <td>

                                <a
                                    href="{{ route('people.edit', $person) }}"
                                    class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-pencil"></i>

                                    Editar

                                </a>
                                <form
                                    action="{{ route('people.destroy', $person) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Deseja realmente excluir esta pessoa?')">

                                        <i class="bi bi-trash"></i>

                                        Excluir

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-5">

                                Nenhuma pessoa encontrada.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>
            <div class="mt-3">

                {{ $people->links() }}

            </div>
        </div>
    </div>

</div>

@endsection
