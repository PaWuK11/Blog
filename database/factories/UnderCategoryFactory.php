<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UnderCategoryFactory extends Factory
{
    private $cycles = 0;

    private $array_cars = ['Sedan', 'Suv'];
    private $array_cars_count = 0;

    private $array_sport = ['Basketball', 'Volleyball'];
    private $array_sports_count = 0;

    private $array_computers = ['PC', 'Laptop'];
    private $array_computers_count = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->cycles++;

        if($this->cycles <= 2){

            $title = $this->array_cars[$this->array_cars_count];
            $this->array_cars_count++;

            return [
                'title' => $title,
                'category_id' => 1,
                'slug' => Str::slug($title),
            ];
        }else if($this->cycles > 2 and $this->cycles <= 4){

            $title = $this->array_sport[$this->array_sports_count];
            $this->array_sports_count++;

            return [
                'title' => $title,
                'category_id' => 2,
                'slug' => Str::slug($title),
            ];
        }else if($this->cycles > 4 and $this->cycles <=6){

            $title = $this->array_computers[$this->array_computers_count];
            $this->array_computers_count++;

            return [
                'title' => $title,
                'category_id' => 3,
                'slug' => Str::slug($title),
            ];
        }else {
            $title = $this->faker->text(6);
            return [
                'title' => $title,
                'category_id' => rand(1, 3),
                'slug' => Str::slug($title),
            ];
        }

    }
}
