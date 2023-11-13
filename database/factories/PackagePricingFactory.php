<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackagePricing>
 */
class PackagePricingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'package_id' => 3,
            // 'pricing_option' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            // 'slug' => time().str::random(5).rand(111,9999),
            // 'serial' => 1
        ];
    }
}
