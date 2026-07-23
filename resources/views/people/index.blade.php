@extends('layouts.app')

@section('title', 'Pessoas')

@section('content')

<x-page-header
    title="Pessoas"
    subtitle="Gerencie membros, congregados e visitantes."
>
    <x-slot:actions>
        <a href="{{ route('people.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Nova Pessoa
        </a>
    </x-slot:actions>
</x-page-header>

<div class="card shadow-sm">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>

                    <th>Nome</th>

                    <th>Tipo</th>

                    <th>Telefone</th>

                    <th>E-mail</th>

                    <th>Status</th>

                    <th width="170">
                        Ações
                    </th>

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

                            @if($person->active)

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

                            <a href="{{ route('people.edit', $person) }}"
                               class="btn btn-sm btn-warning">

                                <i class="bi bi-pencil"></i>

                            </a>

                            <form
                                action="{{ route('people.destroy', $person) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Deseja realmente excluir?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-5">

                            Nenhuma pessoa cadastrada.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="mt-3">

    {{ $people->links() }}

</div>

@endsection
