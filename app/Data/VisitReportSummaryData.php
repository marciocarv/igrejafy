<?php

namespace App\Data;

readonly class VisitReportSummaryData
{
    public function __construct(
        public int $totalVisits,
        public int $uniquePeople,
        public float $averageVisitsPerPerson,
    ) {
    }
}
