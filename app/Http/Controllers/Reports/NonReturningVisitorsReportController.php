<?php

namespace App\Http\Controllers\Reports;

use App\Filters\NonReturningVisitorsReportFilters;
use App\Http\Controllers\Controller;
use App\Services\VisitService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NonReturningVisitorsReportController extends Controller
{
    public function __construct(
        private readonly VisitService $visitService
    ) {
    }

    public function index(Request $request): View
    {
        $filters = NonReturningVisitorsReportFilters::fromRequest($request);

        $visitors = $this->visitService
            ->nonReturningVisitorsReport($filters);

        return view('reports.non-returning-visitors.index', [
            'visitors' => $visitors,
            'filters' => $filters,
        ]);
    }
}
