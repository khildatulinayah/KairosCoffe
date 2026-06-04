<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create a test user if not exists
        if (! User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // create single admin from seeder (uses ADMIN_EMAIL/ADMIN_PASSWORD env vars)
        $this->call(AdminUserSeeder::class);

        // seed categories for books & menus
        $this->call(BookCategorySeeder::class);

        // seed books (requires book_categories already seeded)
        $this->call(BookSeeder::class);
    }
}


