<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Filters\BirthdayReportFilters;
use App\Support\Months;
use Illuminate\Http\Request;
use App\Services\BirthdayReportService;
use App\Enums\PersonType;

class BirthdayReportController extends Controller
{

    public function __construct(
        private readonly BirthdayReportService $birthdayReportService
    ) {
    }
    public function index(Request $request)
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
