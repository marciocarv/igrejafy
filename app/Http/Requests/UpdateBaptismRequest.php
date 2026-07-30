<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBaptismRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'baptism_date' => ['required', 'date'],
            'church_name' => ['required', 'string', 'max:255'],
            'pastor_name' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'size:2'],
            'certificate_book' => ['nullable', 'string', 'max:50'],
            'certificate_page' => ['nullable', 'string', 'max:50'],
            'certificate_number' => ['nullable', 'string', 'max:50'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
