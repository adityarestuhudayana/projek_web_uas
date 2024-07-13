<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\SpendingHistory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'first_name' => 'admin',
            'last_name' => '1',
            'phone' => '085123123',
            'image' => asset('images/hoodie.png'),
            'is_admin' => 1
        ]);
        User::create([
            'username' => 'penjual',
            'email' => 'penjual@gmail.com',
            'password' => Hash::make('123'),
            'first_name' => 'penjual',
            'last_name' => '1',
            'phone' => '085123123',
            'image' => asset('images/hoodie.png'),
        ]);
        User::create([
            'username' => 'aditya',
            'email' => 'aditya@gmail.com',
            'password' => Hash::make('123'),
            'first_name' => 'aditya',
            'last_name' => '1',
            'phone' => '085123123',
            'image' => asset('images/hoodie.png'),
        ]);

        Category::create([
            'image' => 'test',
            'category_name' => 'Makanan'
        ]);
        Category::create([
            'image' => 'test',
            'category_name' => 'Minuman'
        ]);
        Category::create([
            'image' => 'test',
            'category_name' => 'Skin care'
        ]);
        Category::create([
            'image' => 'test',
            'category_name' => 'Pakaian'
        ]);

        for($i = 1; $i <= 5; $i++) {
            Product::create([
                'product_name' => 'Makanan ' . $i,
                'description' => 'makanan enak cocok untuk yang suka pedas',
                'stock' => '10',
                'price' => 50000,
                'image' => 'test',
                'user_id' => 2,
                'category_id' => 1
            ]);
        }
        for($i = 1; $i <= 5; $i++) {
            Product::create([
                'product_name' => 'Pakaian ' . $i,
                'description' => 'baju bekas kondisi mulus',
                'stock' => '10',
                'price' => 85000,
                'image' => 'test',
                'user_id' => 2,
                'category_id' => 4
            ]);
        }

        
    }
}
