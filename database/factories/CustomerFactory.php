<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => fake()->uuid,
            'name' => fake()->name,
            'active' => fake()->boolean,
            'address' => fake()->address,
            'city' => fake()->city,
            'state' => fake()->state(),
            'zip' => fake()->randomNumber(5),
            'phone' => fake()->phoneNumber,
            'email' => fake()->email,
            'website' => fake()->url,
            'comments' => fake()->paragraph,
        ];
    }
}
