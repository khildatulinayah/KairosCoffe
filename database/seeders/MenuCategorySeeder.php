<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categories = [
            'Signature Kairos',
            'Coffee',
            'Non Coffee',
            'Tea & Refreshment',
            'Snacks',
            'Toast & Croffle',
            'Main Course',
            'Dessert',
        ];

        $rows = array_map(function (string $name) use ($now) {
            return [
                'name' => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $categories);

        DB::table('menu_categories')->insertOrIgnore($rows);
    }
}

