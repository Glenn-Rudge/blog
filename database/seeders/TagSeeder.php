<?php

    namespace Database\Seeders;

    use App\Models\Tag;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class TagSeeder extends Seeder
    {
        public function run ()
        {
            $createdAt = now();

            $tags = [
                [
                    "created_at" => $createdAt,
                    "name" => "JavaScript",
                ],
                [
                    "created_at" => $createdAt,
                    "name" => "PHP",
                ],
                [
                    "created_at" => $createdAt,
                    "name" => "Laravel",
                ],
                [
                    "created_at" => $createdAt,
                    "name" => "Vue 3",
                ],
            ];

            Tag::insert($tags);
        }
    }
