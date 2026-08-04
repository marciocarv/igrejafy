<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    protected $model = Person::class;

    public function definition(): array
    {
        return [

            'tenant_id' => 1,

            'name' => fake()->name(),

            'person_type' => fake()->randomElement([
                'member',
                'congregant',
                'visitor'
            ]),

            'gender' => fake()->randomElement([
                'male',
                'female'
            ]),

            'birth_date' => fake()->dateTimeBetween(
                '-80 years',
                '-10 years'
            ),

            'email' => fake()->unique()->safeEmail(),

            'phone' => fake()->phoneNumber(),

            'is_active' => fake()->boolean(90),

        ];
    }
}
