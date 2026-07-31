<?php

namespace App\Data;

use Carbon\Carbon;

readonly class VisitSummaryData
{
    public function __construct(
        public int $total,
        public ?Carbon $firstVisit,
        public ?Carbon $lastVisit,
    ) {
    }
}
