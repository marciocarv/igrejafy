<?php

namespace App\Http\Controllers;
use App\Models\Person;


class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard.index', [

            'totalPeople' => Person::count(),

            'totalMembers' => Person::where('person_type', 'member')->count(),

            'totalCongregants' => Person::where('person_type', 'congregant')->count(),

            'totalVisitors' => Person::where('person_type', 'visitor')->count(),

        ]);
    }
}
