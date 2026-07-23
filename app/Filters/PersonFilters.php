<?php

namespace App\Filters;

use Illuminate\Http\Request;

class PersonFilters
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $personType = null,
        public readonly ?bool $isActive = null,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->filled('name')
                ? $request->string('name')->toString()
                : null,

            personType: $request->filled('person_type')
                ? $request->string('person_type')->toString()
                : null,

            isActive: $request->filled('is_active')
                ? $request->boolean('is_active')
                : null,
        );
    }
}
