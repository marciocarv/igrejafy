<?php

namespace App\Data;

class DashboardData
{
    public function __construct(
        public readonly int $totalPeople,
        public readonly int $totalMembers,
        public readonly int $totalCongregants,
        public readonly int $totalVisitors,

        public readonly int $totalVisitsThisMonth,
        public readonly int $totalBaptisms,
        public readonly int $inactivePeople,
        public readonly int $upcomingBirthdays,

        public readonly iterable $recentVisits,
        public readonly iterable $returningVisitors,
        public readonly iterable $latestPeople,
    ) {
    }
}
