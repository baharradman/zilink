<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
  
    public function definition(): array
    {
        return [
            'email' => fake()->email(),
            'mobile' => fake()->phoneNumber(),
            'password' => fake()->password(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'username' => fake()->userName(),
            'slug' => fake()->slug(),
            'email_verified_at' =>now()
        ];
    }
}
