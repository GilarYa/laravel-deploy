<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'User Demo',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create Sample Products
        $products = [
            [
                'name' => 'Laptop Gaming',
                'description' => 'Laptop gaming dengan spesifikasi tinggi untuk gaming dan produktivitas.',
                'price' => 15000000,
                'stock' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'Smartphone Android',
                'description' => 'Smartphone Android terbaru dengan kamera canggih dan performa optimal.',
                'price' => 5000000,
                'stock' => 25,
                'is_active' => true,
            ],
            [
                'name' => 'Headphone Wireless',
                'description' => 'Headphone wireless dengan noise cancelling dan kualitas suara premium.',
                'price' => 1500000,
                'stock' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'Keyboard Mechanical',
                'description' => 'Keyboard mechanical RGB dengan switch premium untuk gaming dan typing.',
                'price' => 800000,
                'stock' => 20,
                'is_active' => true,
            ],
            [
                'name' => 'Mouse Gaming',
                'description' => 'Mouse gaming dengan sensor presisi tinggi dan desain ergonomis.',
                'price' => 500000,
                'stock' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Monitor 4K',
                'description' => 'Monitor 4K 27 inch dengan teknologi IPS dan refresh rate tinggi.',
                'price' => 4000000,
                'stock' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
