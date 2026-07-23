<?php

namespace App\Data;

use App\Enums\Gender;
use App\Enums\PersonType;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;

readonly class PersonData
{
    public function __construct(
        public PersonType $personType,
        public string $name,
        public Gender $gender,
        public ?string $birthDate,
        public ?string $email,
        public ?string $phone,
        public bool $active,
    ) {
    }

    public static function fromRequest(
        StorePersonRequest|UpdatePersonRequest $request
    ): self {
        $validated = $request->validated();

        return new self(
            personType: PersonType::from($validated['person_type']),
            name: $validated['name'],
            gender: Gender::from($validated['gender']),
            birthDate: $validated['birth_date'] ?? null,
            email: $validated['email'] ?? null,
            phone: $validated['phone'] ?? null,
            active: $validated['active'] ?? true,
        );
    }

    public function toArray(): array
    {
        return [
            'person_type' => $this->personType->value,
            'name' => $this->name,
            'gender' => $this->gender->value,
            'birth_date' => $this->birthDate,
            'email' => $this->email,
            'phone' => $this->phone,
            'active' => $this->active,
        ];
    }
}
