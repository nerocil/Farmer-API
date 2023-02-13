<?php

namespace Database\Factories\VersionOne;

use App\Models\VersionOne\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VersionOne\Farm>
 */
class FarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $region = Region::inRandomOrder()->first();
        return [
            'region_id' => $region->id,
            'farm_size' => rand(1,20),

        ];
    }
}
