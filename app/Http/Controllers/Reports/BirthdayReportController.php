<?php

namespace App\Http\Controllers\Reports;

use App\Enums\PersonType;
use App\Filters\BirthdayReportFilters;
use App\Http\Controllers\Controller;
use App\Services\BirthdayReportService;
use App\Support\Months;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BirthdayReportController extends Controller
{
    public function __construct(
        private readonly BirthdayReportService $birthdayReportService
    ) {
    }

    public function index(Request $request): View
    {
        $filters = BirthdayReportFilters::fromRequest($request);

        $people = $this->birthdayReportService->list($filters);

        return view('reports.birthdays.index', [
            'people' => $people,
            'filters' => $filters,
            'months' => Months::options(),
            'personTypes' => PersonType::options(),
        ]);
    }
}
