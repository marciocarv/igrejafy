<?php

namespace App\Data;

use App\Http\Requests\StoreBaptismRequest;
use App\Http\Requests\UpdateBaptismRequest;

readonly class BaptismData
{
    public function __construct(
        public string $baptismDate,
        public string $churchName,
        public ?string $pastorName,
        public ?string $city,
        public ?string $state,
        public ?string $certificateBook,
        public ?string $certificatePage,
        public ?string $certificateNumber,
        public ?string $notes,
    ) {
    }

    public static function fromRequest(
        StoreBaptismRequest|UpdateBaptismRequest $request
    ): self {

        $data = $request->validated();

        return new self(

            baptismDate: $data['baptism_date'],

            churchName: $data['church_name'],

            pastorName: $data['pastor_name'] ?? null,

            city: $data['city'] ?? null,

            state: $data['state'] ?? null,

            certificateBook: $data['certificate_book'] ?? null,

            certificatePage: $data['certificate_page'] ?? null,

            certificateNumber: $data['certificate_number'] ?? null,

            notes: $data['notes'] ?? null,

        );
    }

    public function toArray(): array
    {
        return [

            'baptism_date' => $this->baptismDate,

            'church_name' => $this->churchName,

            'pastor_name' => $this->pastorName,

            'city' => $this->city,

            'state' => $this->state,

            'certificate_book' => $this->certificateBook,

            'certificate_page' => $this->certificatePage,

            'certificate_number' => $this->certificateNumber,

            'notes' => $this->notes,

        ];
    }
}
