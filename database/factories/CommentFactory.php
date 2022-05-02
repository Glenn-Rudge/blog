<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class CommentFactory extends Factory
{

    public function definition()
    {
        return [
            "user_id" => User::all()->random()->id,
            "post_id" => Post::all()->random()->id,
            "content" => $this->faker->text(125)
        ];
    }
}
