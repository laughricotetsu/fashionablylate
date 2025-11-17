<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition()

{
    return [


        'first_name'  => $this->faker->firstName(),
        'last_name'   => $this->faker->lastName(),
        'gender'      => $this->faker->numberBetween(1, 3),
        'email'       => $this->faker->unique()->safeEmail(),
        'tel'         => $this->faker->phoneNumber(),
        'address'     => $this->faker->address(),
        'building'    => $this->faker->optional()->secondaryAddress(),
        'detail'      => $this->faker->sentence(10),

        'category_id' => $this->faker->numberBetween(1, 5),

        'created_at'  => now(),
        'updated_at'  => now(),
    ];
}
}
