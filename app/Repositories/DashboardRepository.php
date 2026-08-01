<?php

namespace App\Repositories;

use App\Models\Baptism;
use App\Models\Person;
use App\Models\Visit;
use App\Repositories\Contracts\DashboardRepositoryInterface;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function countPeople(): int
    {
        return Person::count();
    }

    public function countMembers(): int
    {
        return Person::where('person_type', 'member')->count();
    }

    public function countCongregants(): int
    {
        return Person::where('person_type', 'congregant')->count();
    }

    public function countVisitors(): int
    {
        return Person::where('person_type', 'visitor')->count();
    }

    public function countVisitsThisMonth(): int
    {
        return Visit::whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->count();
    }

    public function countBaptisms(): int
    {
        return Baptism::count();
    }

    public function countInactivePeople(): int
    {
        return Person::where('is_active', false)->count();
    }

    public function countBirthdaysThisMonth(): int
    {
        return Person::whereMonth('birth_date', now()->month)->count();
    }

    public function getRecentPeople(int $limit = 5)
    {
        return Person::latest()
            ->take($limit)
            ->get();
    }

    public function getRecentVisits(int $limit = 5)
    {
        return Visit::with('person')
            ->latest('visit_date')
            ->take($limit)
            ->get();
    }

    public function getReturningVisitors(int $limit = 5)
    {
        return Person::where('person_type', 'visitor')
            ->withCount('visits')
            ->having('visits_count', '>', 1)
            ->orderByDesc('visits_count')
            ->take($limit)
            ->get();
    }

    public function getUpcomingBirthdays(int $limit = 5)
    {
        return Person::whereNotNull('birth_date')
            ->whereMonth('birth_date', now()->month)
            ->orderByRaw('DAY(birth_date)')
            ->take($limit)
            ->get();
    }
}
