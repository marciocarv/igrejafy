<?php

namespace App\Filters;

use Illuminate\Http\Request;

class NonReturningVisitorsReportFilters
{
    public function __construct(
        public readonly ?string $startDate = null,
        public readonly ?string $endDate = null,
        public readonly ?bool $isActive = true,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            startDate: $request->filled('start_date')
                ? $request->input('start_date')
                : now()->startOfMonth()->format('Y-m-d'),

            endDate: $request->filled('end_date')
                ? $request->input('end_date')
                : now()->format('Y-m-d'),

            isActive: $request->filled('is_active')
                ? match ($request->input('is_active')) {
                    '1' => true,
                    '0' => false,
                    default => null,
                }
                : true,
        );
    }
}
