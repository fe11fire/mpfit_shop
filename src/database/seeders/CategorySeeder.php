<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO Eloquent
        $titles = ['легкий', 'хрупкий', 'тяжелый'];
        foreach ($titles as $title) {
            DB::table('categories')->insertOrIgnore([
                'title' => $title,
            ]);
        }
    }
}
