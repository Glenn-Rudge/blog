<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        $this->call([
            PostSeeder::class,
            CommentSeeder::class,
            TagSeeder::class,
        ]);
    }
}
