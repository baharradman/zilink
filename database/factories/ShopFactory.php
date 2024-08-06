<?php

namespace Database\Factories;
use App\Models\Shop;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'creator_id'=>function(){
                return User::factory()->create()->id;
          },
            'title' => fake()->text,
            
            'address' => fake()->address()
        ];
    }
}
