<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElements(['male', 'female'])[0];
        return [
            'email' => fake()->unique()->safeEmail(),
            'first_name' => fake()->firstName($gender),
            'last_name' => fake()->lastName,
            'gender' => $gender,
            'phone_number' => fake()->e164PhoneNumber(),
            'profile_image' =>    $this->faker->imageUrl(100,100),
//            'profile_image' =>  $this->faker->image(public_path('avatars'), 100, 100, null, false),
            'email_verified_at' => now(),
            'token' => rand(1000,9999).'-'.rand(1000,9999),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
