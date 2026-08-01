<?php

namespace App\Data;

use Illuminate\Support\Collection;

readonly class DashboardData
{
    public function __construct(
        public int $totalPeople,
        public int $totalMembers,
        public int $totalCongregants,
        public int $totalVisitors,

        public int $totalVisitsThisMonth,
        public int $totalBaptisms,
        public int $inactivePeople,
        public int $upcomingBirthdays,

        public Collection $recentVisits,
        public Collection $recentPeople,
        public Collection $returningVisitors,
        public Collection $birthdayPeople,
    ) {}
}
