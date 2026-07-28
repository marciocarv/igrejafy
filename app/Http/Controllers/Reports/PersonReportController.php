<?php

namespace App\Http\Controllers\Reports;

use App\Filters\PersonFilters;
use App\Http\Controllers\Controller;
use App\Services\PersonService;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PersonReportController extends Controller
{
    public function __construct(
        private readonly PersonService $personService
    ) {
    }

    public function index(Request $request): View
{
    $filters = PersonFilters::fromRequest($request);

    $people = $this->personService->listPeople($filters);

    return view('reports.people.index', [
        'people' => $people,
        'filters' => $filters,
        'personTypes' => [
            'member' => 'Membro',
            'congregant' => 'Congregado',
            'visitor' => 'Visitante',
        ],
    ]);
}
}
