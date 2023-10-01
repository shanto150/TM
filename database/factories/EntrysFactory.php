<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\entrys>
 */
class EntrysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trandate' => $this->faker->date(),
            'amount' => $this->faker->randomNumber(7, true),
            'total_persons' =>$this->faker->randomNumber(2, true),
            'created_by' =>$this->faker->firstNameMale
        ];
    }
}
