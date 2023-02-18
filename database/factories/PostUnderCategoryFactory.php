<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostUnderCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => rand(1, 29),
            'under_category_id' => rand(1,6)
        ];
    }
}
