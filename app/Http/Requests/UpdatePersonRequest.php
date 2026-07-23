<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\PersonType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rule;

class UpdatePersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'person_type' => [
                'required',
                new Enum(PersonType::class),
            ],

            'name' => [
                'required',
                'string',
                'max:150',
            ],

            'gender' => [
                'required',
                new Enum(Gender::class),
            ],

            'birth_date' => [
                'nullable',
                'date',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('people')
                    ->ignore($this->person),
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'is_active' => [
                'boolean',
            ],
        ];
    }
}
