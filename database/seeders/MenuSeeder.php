<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $categories = DB::table('menu_categories')
            ->select('id', 'name')
            ->get()
            ->keyBy('name');

        $categoryId = function (string $name) use ($categories): int {
            $row = $categories->get($name);
            if (! $row) {
                throw new \RuntimeException("Menu category not found: {$name}. Did you run MenuCategorySeeder?");
            }

            return (int) $row->id;
        };

        $now = now();

        $bestSellers = [
            'Kairos Signature Latte',
            'Kopi Susu Aren',
            'Matcha Latte',
            'Lotus Biscoff Croffle',
            'Chicken Rice Bowl',
            'Truffle Fries',
            'Lychee Tea',
            'Brownies Ice Cream',
        ];

        $menus = [
            // ☕ Signature Kairos
            ['name' => 'Kairos Signature Latte', 'category' => 'Signature Kairos', 'price' => 22000, 'is_featured' => true],
            ['name' => 'Kairos Aren Cloud', 'category' => 'Signature Kairos', 'price' => 23000, 'is_featured' => false],
            ['name' => 'Midnight Mocha', 'category' => 'Signature Kairos', 'price' => 24000, 'is_featured' => false],
            ['name' => 'Caramel Serenity Latte', 'category' => 'Signature Kairos', 'price' => 22000, 'is_featured' => false],
            ['name' => 'Vanilla Horizon', 'category' => 'Signature Kairos', 'price' => 22000, 'is_featured' => false],

            // ☕ Coffee
            ['name' => 'Espresso', 'category' => 'Coffee', 'price' => 12000, 'is_featured' => false],
            ['name' => 'Americano', 'category' => 'Coffee', 'price' => 15000, 'is_featured' => false],
            ['name' => 'Cappuccino', 'category' => 'Coffee', 'price' => 18000, 'is_featured' => false],
            ['name' => 'Café Latte', 'category' => 'Coffee', 'price' => 19000, 'is_featured' => false],
            ['name' => 'Flat White', 'category' => 'Coffee', 'price' => 19000, 'is_featured' => false],
            ['name' => 'Hazelnut Latte', 'category' => 'Coffee', 'price' => 21000, 'is_featured' => false],
            ['name' => 'Caramel Macchiato', 'category' => 'Coffee', 'price' => 22000, 'is_featured' => false],
            ['name' => 'Mocha Latte', 'category' => 'Coffee', 'price' => 22000, 'is_featured' => false],
            ['name' => 'Cold Brew', 'category' => 'Coffee', 'price' => 20000, 'is_featured' => false],
            ['name' => 'Kopi Susu Aren', 'category' => 'Coffee', 'price' => 18000, 'is_featured' => true],

            // 🍵 Non Coffee
            ['name' => 'Matcha Latte', 'category' => 'Non Coffee', 'price' => 22000, 'is_featured' => true],
            ['name' => 'Chocolate Supreme', 'category' => 'Non Coffee', 'price' => 20000, 'is_featured' => false],
            ['name' => 'Red Velvet Latte', 'category' => 'Non Coffee', 'price' => 20000, 'is_featured' => false],
            ['name' => 'Taro Latte', 'category' => 'Non Coffee', 'price' => 19000, 'is_featured' => false],
            ['name' => 'Thai Tea', 'category' => 'Non Coffee', 'price' => 15000, 'is_featured' => false],
            ['name' => 'Fresh Milk Brown Sugar', 'category' => 'Non Coffee', 'price' => 17000, 'is_featured' => false],
            ['name' => 'Cookies & Cream Milk', 'category' => 'Non Coffee', 'price' => 20000, 'is_featured' => false],
            ['name' => 'Strawberry Milk', 'category' => 'Non Coffee', 'price' => 18000, 'is_featured' => false],

            // 🧋 Tea & Refreshment
            ['name' => 'Lychee Tea', 'category' => 'Tea & Refreshment', 'price' => 15000, 'is_featured' => true],
            ['name' => 'Peach Tea', 'category' => 'Tea & Refreshment', 'price' => 15000, 'is_featured' => false],
            ['name' => 'Lemon Tea', 'category' => 'Tea & Refreshment', 'price' => 13000, 'is_featured' => false],
            ['name' => 'Mango Yakult', 'category' => 'Tea & Refreshment', 'price' => 18000, 'is_featured' => false],
            ['name' => 'Strawberry Yakult', 'category' => 'Tea & Refreshment', 'price' => 18000, 'is_featured' => false],
            ['name' => 'Blue Ocean Soda', 'category' => 'Tea & Refreshment', 'price' => 17000, 'is_featured' => false],
            ['name' => 'Mojito Lime Mint', 'category' => 'Tea & Refreshment', 'price' => 17000, 'is_featured' => false],
            ['name' => 'Passion Fruit Sparkling', 'category' => 'Tea & Refreshment', 'price' => 19000, 'is_featured' => false],

            // 🍟 Snacks
            ['name' => 'French Fries', 'category' => 'Snacks', 'price' => 15000, 'is_featured' => false],
            ['name' => 'Truffle Fries', 'category' => 'Snacks', 'price' => 20000, 'is_featured' => true],
            ['name' => 'Chicken Wings', 'category' => 'Snacks', 'price' => 25000, 'is_featured' => false],
            ['name' => 'Mix Platter', 'category' => 'Snacks', 'price' => 32000, 'is_featured' => false],
            ['name' => 'Cireng Rujak', 'category' => 'Snacks', 'price' => 12000, 'is_featured' => false],
            ['name' => 'Tahu Crispy', 'category' => 'Snacks', 'price' => 10000, 'is_featured' => false],
            ['name' => 'Onion Rings', 'category' => 'Snacks', 'price' => 15000, 'is_featured' => false],
            ['name' => 'Cheese Nachos', 'category' => 'Snacks', 'price' => 20000, 'is_featured' => false],

            // 🍞 Toast & Croffle
            ['name' => 'Butter Croffle', 'category' => 'Toast & Croffle', 'price' => 15000, 'is_featured' => false],
            ['name' => 'Chocolate Croffle', 'category' => 'Toast & Croffle', 'price' => 18000, 'is_featured' => false],
            ['name' => 'Lotus Biscoff Croffle', 'category' => 'Toast & Croffle', 'price' => 22000, 'is_featured' => true],
            ['name' => 'Matcha Croffle', 'category' => 'Toast & Croffle', 'price' => 22000, 'is_featured' => false],
            ['name' => 'Kaya Toast', 'category' => 'Toast & Croffle', 'price' => 15000, 'is_featured' => false],
            ['name' => 'Garlic Cheese Toast', 'category' => 'Toast & Croffle', 'price' => 18000, 'is_featured' => false],
            ['name' => 'Tuna Melt Toast', 'category' => 'Toast & Croffle', 'price' => 24000, 'is_featured' => false],

            // 🍝 Main Course
            ['name' => 'Chicken Rice Bowl', 'category' => 'Main Course', 'price' => 25000, 'is_featured' => true],
            ['name' => 'Sambal Matah Chicken Bowl', 'category' => 'Main Course', 'price' => 27000, 'is_featured' => false],
            ['name' => 'Beef Teriyaki Bowl', 'category' => 'Main Course', 'price' => 30000, 'is_featured' => false],
            ['name' => 'Aglio Olio', 'category' => 'Main Course', 'price' => 25000, 'is_featured' => false],
            ['name' => 'Carbonara Pasta', 'category' => 'Main Course', 'price' => 28000, 'is_featured' => false],
            ['name' => 'Chicken Katsu Curry', 'category' => 'Main Course', 'price' => 30000, 'is_featured' => false],
            ['name' => 'Nasi Goreng Kairos', 'category' => 'Main Course', 'price' => 22000, 'is_featured' => false],

            // 🍰 Dessert
            ['name' => 'New York Cheesecake', 'category' => 'Dessert', 'price' => 25000, 'is_featured' => false],
            ['name' => 'Tiramisu Cake', 'category' => 'Dessert', 'price' => 27000, 'is_featured' => false],
            ['name' => 'Chocolate Lava Cake', 'category' => 'Dessert', 'price' => 24000, 'is_featured' => false],
            ['name' => 'Matcha Cheesecake', 'category' => 'Dessert', 'price' => 27000, 'is_featured' => false],
            ['name' => 'Brownies Ice Cream', 'category' => 'Dessert', 'price' => 22000, 'is_featured' => true],
            ['name' => 'Affogato', 'category' => 'Dessert', 'price' => 20000, 'is_featured' => false],
        ];

        foreach ($menus as $menu) {
            $name = $menu['name'];
            $categoryName = $menu['category'];

            $categoryIdValue = $categoryId($categoryName);

            $isFeatured = (bool) ($menu['is_featured'] ?? false);
            // extra safety: ensure only best seller list is featured
            if ($isFeatured && ! in_array($name, $bestSellers, true)) {
                $isFeatured = false;
            }

            DB::table('menus')->updateOrInsert(
                [
                    'category_id' => $categoryIdValue,
                    'name' => $name,
                ],
                [
                    'description' => null,
                    'price' => $menu['price'],
                    'image' => null,
                    'is_featured' => $isFeatured,
                    'updated_at' => $now,
                    // created_at will be set on insert only
                    'created_at' => $now,
                ]
            );
        }
    }
}

