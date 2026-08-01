<?php

namespace App\Repositories\Contracts;

interface DashboardRepositoryInterface
{
    public function countPeople(): int;

    public function countMembers(): int;

    public function countCongregants(): int;

    public function countVisitors(): int;

    public function countVisitsThisMonth(): int;

    public function countBaptisms(): int;

    public function countInactivePeople(): int;

    public function countBirthdaysThisMonth(): int;

    public function getRecentPeople(int $limit = 5);

    public function getRecentVisits(int $limit = 5);

    public function getReturningVisitors(int $limit = 5);

    public function getUpcomingBirthdays(int $limit = 5);
}
