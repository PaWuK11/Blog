<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    private $categories = ['Cars', 'Sport', 'Computers'];
    private $i = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->categories[$this->i];
        $this->i++;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
        ];
    }
}
