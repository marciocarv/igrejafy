<?php

namespace App\Services;

use App\Data\DashboardData;
use App\Repositories\Contracts\DashboardRepositoryInterface;

class DashboardService
{
    public function __construct(
        private readonly DashboardRepositoryInterface $repository
    ) {
    }

    public function getDashboard(): DashboardData
    {
        return new DashboardData(
            totalPeople: $this->repository->countPeople(),
            totalMembers: $this->repository->countMembers(),
            totalCongregants: $this->repository->countCongregants(),
            totalVisitors: $this->repository->countVisitors(),

            totalVisitsThisMonth: $this->repository->countVisitsThisMonth(),
            totalBaptisms: $this->repository->countBaptisms(),
            inactivePeople: $this->repository->countInactivePeople(),
            upcomingBirthdays: $this->repository->countBirthdaysThisMonth(),

            recentVisits: $this->repository->getRecentVisits(),
            recentPeople: $this->repository->getRecentPeople(),
            returningVisitors: $this->repository->getReturningVisitors(),
            birthdayPeople: $this->repository->getUpcomingBirthdays(),
        );
    }
}
