<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sayur.test'],
            ['name' => 'Admin Toko Sayur', 'password' => Hash::make('password')]
        );

        $categories = ['Sayuran Daun', 'Bumbu Dapur', 'Buah Segar'];

        foreach ($categories as $name) {
            Category::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'description' => 'Kategori ' . strtolower($name)]
            );
        }

        Product::firstOrCreate(
            ['slug' => 'bayam-segar'],
            [
                'category_id' => Category::where('slug', 'sayuran-daun')->value('id'),
                'name' => 'Bayam Segar',
                'description' => 'Bayam hijau segar untuk masakan harian.',
                'price' => 5000,
                'sale_price' => 4000,
                'sale_ends_at' => now()->addDays(2),
                'stock' => 30,
                'unit' => 'ikat',
                'is_active' => true,
                'is_flash_sale' => true,
            ]
        );

        Recipe::firstOrCreate(
            ['slug' => 'sayur-bening-bayam'],
            [
                'title' => 'Sayur Bening Bayam',
                'description' => 'Menu sederhana, segar, dan cocok untuk makan siang keluarga.',
                'ingredients' => "1 ikat bayam\n2 siung bawang merah\n1 buah jagung manis\nGaram dan gula secukupnya\nAir secukupnya",
                'steps' => "Didihkan air bersama bawang merah.\nMasukkan jagung sampai empuk.\nTambahkan bayam, garam, dan gula.\nMasak sebentar lalu sajikan hangat.",
                'cooking_time' => 20,
                'is_active' => true,
            ]
        );
    }
}
