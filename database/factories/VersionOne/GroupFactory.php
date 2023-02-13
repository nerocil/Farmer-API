<?php

namespace Database\Factories\VersionOne;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VersionOne\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $groupNames = [
          "Wazoefu",
          "Umoja Wakulima",
          "Kilimo Bora",
          "Mshikamano",
          "Wapambanaji",
        ];
        return [
            "created_by" => $user->id,
            "updated_by" => $user->id,
            "name" => $groupNames[rand(0,4)],
            "profile_icon" => $this->faker->imageUrl(100,100),
//            "profile_icon" => $this->faker->image(public_path('group_avatars'), 100, 100, null, false),
        ];
    }
}
