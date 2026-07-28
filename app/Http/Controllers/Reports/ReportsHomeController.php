<?php

namespace App\Http\Controllers\Reports;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ReportsHomeController extends Controller
{
    public function index(): View
    {
        return view('reports.index');
    }
}
