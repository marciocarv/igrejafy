<?php

namespace App\Filters;

use Illuminate\Http\Request;

class BirthdayReportFilters
{
    public function __construct(
        public readonly ?int $month = null,
        public readonly ?string $personType = null,
        public readonly ?bool $isActive = true,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            month: $request->filled('month')
                ? (int) $request->input('month')
                : null,

            personType: $request->filled('person_type')
                ? $request->string('person_type')->toString()
                : null,

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
