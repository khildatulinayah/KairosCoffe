<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('book_categories')->insert([
            ['name' => 'Fiksi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nonfiksi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Filsafat', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Psikologi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sejarah', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Teknologi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bisnis & Keuangan', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pendidikan', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Agama', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Biografi', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}




