<?php

namespace App\Http\Controllers;

use App\Data\VisitData;
use App\Http\Requests\StoreVisitRequest;
use App\Models\Person;
use App\Models\Visit;
use App\Services\VisitService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VisitController extends Controller
{
    public function __construct(
        private readonly VisitService $visitService
    ) {
    }

    public function index(Person $person): View
    {
        $visits = $this->visitService->listForPerson($person);

        $summary = $this->visitService->summaryForPerson($person);

        return view('people.visits.index', [
            'person' => $person,
            'visits' => $visits,
            'summary' => $summary,
        ]);
    }

    public function create(Person $person): View
    {
        return view('people.visits.create', [
            'person' => $person,
        ]);
    }

    public function store(
        StoreVisitRequest $request,
        Person $person
    ): RedirectResponse {
        $this->visitService->create(
            $person,
            VisitData::fromRequest($request)
        );

        return redirect()
            ->route('people.visits.index', $person)
            ->with('success', 'Visita registrada com sucesso.');
    }

    public function destroy(
        Person $person,
        Visit $visit
    ): RedirectResponse {
        abort_unless($visit->person_id === $person->id, 404);

        $this->visitService->delete($visit);

        return redirect()
            ->route('people.visits.index', $person)
            ->with('success', 'Visita removida com sucesso.');
    }
}
