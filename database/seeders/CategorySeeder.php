<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Entrées'
            ],
            [
                'name' => 'Plats principaux',
            ],
            [
                'name' => 'Desserts',
            ],
            [
                'name' => 'Boissons chaudes'
            ],
            [
                'name' => 'Soupes'
            ],
            [
                'name' => 'Salades'
            ],
            [
                'name' => 'Pizzas'
            ],
            [
                'name' => 'Sushis'
            ],
            
        ]);

    }
}
