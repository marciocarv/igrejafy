<?php

namespace App\Data;

use App\Http\Requests\StoreVisitRequest;

readonly class VisitData
{
    public function __construct(
        public string $visitDate,
        public ?string $notes,
    ) {
    }

    public static function fromRequest(StoreVisitRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            visitDate: $validated['visit_date'],
            notes: $validated['notes'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'visit_date' => $this->visitDate,
            'notes' => $this->notes,
        ];
    }
}
