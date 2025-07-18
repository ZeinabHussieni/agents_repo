<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(2, true), 
            'model_type' => $this->faker->randomElement(['GPT-4', 'BERT', 'Claude', 'Gemini']),
            'accuracy' => $this->faker->randomFloat(2, 70, 100),   
            'is_active' => $this->faker->boolean(80), 
        ];
    }
}
