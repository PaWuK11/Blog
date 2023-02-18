<?php

namespace Database\Seeders;

use App\Models\PostUnderCategory;
use Illuminate\Database\Seeder;

class PostUnderCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostUnderCategory::factory()->times(29)->create();
    }
}
