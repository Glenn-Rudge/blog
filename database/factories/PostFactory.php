<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            "user_id" => User::all()->random()->id,
            "title" => $this->faker->name(),
            "description" => $this->faker->sentence(),
            "content" => $this->faker->text(200)
        ];
    }
}
