<?php

namespace App\Http\Controllers\Reports;

use App\Filters\ReturningVisitorsReportFilters;
use App\Http\Controllers\Controller;
use App\Services\VisitService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReturningVisitorsReportController extends Controller
{
    public function __construct(
        private readonly VisitService $visitService
    ) {
    }

    public function index(Request $request): View
    {
        $filters = ReturningVisitorsReportFilters::fromRequest($request);

        $visitors = $this->visitService
            ->returningVisitorsReport($filters);

        return view('reports.returning-visitors.index', [
            'visitors' => $visitors,
            'filters' => $filters,
        ]);
    }
}
