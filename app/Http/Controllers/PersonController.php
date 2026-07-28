<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use App\Services\PersonService;
use App\Data\PersonData;
use App\Enums\Gender;
use App\Enums\PersonType;
use Illuminate\Http\Request;
use App\Filters\PersonFilters;

class PersonController extends Controller
{
    public function __construct(
        protected PersonService $personService
    ) {
    }

    public function index(Request $request)
    {
        $filters = PersonFilters::fromRequest($request);

        return view('people.index', [

            'people' => $this->personService->listPeople($filters),

            'filters' => $filters,

            'personTypes' => PersonType::options(),

        ]);
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
            ->with('success', 'Pessoa cadastrada com sucesso.');
    }

    public function edit(Person $person)
    {
        return view('people.edit', [
            'person' => $person,
            'personTypes' => PersonType::options(),
            'genders' => Gender::options(),
        ]);
    }

    public function update(UpdatePersonRequest $request, Person $person)
    {
        $this->personService->update(
            $person,
            PersonData::fromRequest($request)
        );

        return redirect()
            ->route('people.index')
            ->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function destroy(Person $person)
    {
        $this->personService->delete($person);

        return redirect()
            ->route('people.index')
            ->with('success', 'Pessoa removida com sucesso.');
    }

    public function show(int $id)
    {
        $person = $this->personService->getPerson($id);

        return view('people.show', compact('person'));
    }
}
