<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->text(40);
        return [
            'title' => $title,
            'content' => $this->faker->text(500),
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 6),
            'description' => $this->faker->text(100),
            'approved' => 1,
            'slug' => Str::slug($title),
        ];
    }
}
