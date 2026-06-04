<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insertOrIgnore([
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'category_id' => 1,
                'stock' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bumi',
                'author' => 'Tere Liye',
                'category_id' => 1,
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'category_id' => 1,
                'stock' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Harry Potter and the Sorcerer Stone',
                'author' => 'J.K. Rowling',
                'category_id' => 1,
                'stock' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'category_id' => 1,
                'stock' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'category_id' => 4,
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Think and Grow Rich',
                'author' => 'Napoleon Hill',
                'category_id' => 7,
                'stock' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rich Dad Poor Dad',
                'author' => 'Robert Kiyosaki',
                'category_id' => 7,
                'stock' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sapiens',
                'author' => 'Yuval Noah Harari',
                'category_id' => 5,
                'stock' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Homo Deus',
                'author' => 'Yuval Noah Harari',
                'category_id' => 5,
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'category_id' => 6,
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt',
                'category_id' => 6,
                'stock' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Deep Work',
                'author' => 'Cal Newport',
                'category_id' => 4,
                'stock' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Psychology of Money',
                'author' => 'Morgan Housel',
                'category_id' => 7,
                'stock' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Filosofi Teras',
                'author' => 'Henry Manampiring',
                'category_id' => 4,
                'stock' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Madilog',
                'author' => 'Tan Malaka',
                'category_id' => 3,
                'stock' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Meditations',
                'author' => 'Marcus Aurelius',
                'category_id' => 3,
                'stock' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Republic',
                'author' => 'Plato',
                'category_id' => 3,
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sejarah Dunia',
                'author' => 'E. H. Gombrich',
                'category_id' => 5,
                'stock' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pengantar Ilmu Komputer',
                'author' => 'Sutarman',
                'category_id' => 6,
                'stock' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}



