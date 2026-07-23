<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use App\Services\PersonService;
use App\Data\PersonData;
use App\Enums\Gender;
use App\Enums\PersonType;

class PersonController extends Controller
{
    public function __construct(
        protected PersonService $personService
    ) {
    }

    public function index()
    {
        $people = $this->personService->listPeople();

        return view('people.index', compact('people'));
    }

    public function create()
    {
        return view('people.create', [
            'personTypes' => PersonType::options(),
            'genders' => Gender::options(),
        ]);
    }

    public function store(StorePersonRequest $request)
    {
        $this->personService->create(
            PersonData::fromRequest($request)
        );

        return redirect()
            ->route('people.index')
            ->with('success', 'Pessoa criada com sucesso.');
    }

    public function show(Person $person)
    {
        return view('people.show', compact('person'));
    }

    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    public function update(
    UpdatePersonRequest $request,
    Person $person
    ) {
            $this->personService->update(
                $person,
                PersonData::fromRequest($request)
            );

            return redirect()
                ->route('people.index')
                ->with('success', 'Pessoa atualizada com sucesso.');
        }

    public function destroy(Person $person)
    {
        $this->personService->delete($person);

        return redirect()
            ->route('people.index')
            ->with('success', 'Pessoa excluída com sucesso.');
    }
}
