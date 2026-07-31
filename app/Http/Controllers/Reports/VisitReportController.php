<?php

namespace App\Http\Controllers\Reports;

use App\Enums\PersonType;
use App\Filters\VisitReportFilters;
use App\Http\Controllers\Controller;
use App\Services\VisitService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VisitReportController extends Controller
{
    public function __construct(
        private readonly VisitService $visitService
    ) {
    }

    public function index(Request $request): View
    {
        $filters = VisitReportFilters::fromRequest($request);

        $visits = $this->visitService->report($filters);

        $summary = $this->visitService->reportSummary($filters);

        return view('reports.visits.index', [
            'visits' => $visits,
            'summary' => $summary,
            'filters' => $filters,
            'personTypes' => PersonType::options(),
        ]);
    }
}
