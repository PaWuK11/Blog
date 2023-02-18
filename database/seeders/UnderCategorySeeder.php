<?php

namespace Database\Seeders;

use App\Models\UnderCategory;
use Illuminate\Database\Seeder;

class UnderCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnderCategory::factory()->times(6)->create();
    }
}
