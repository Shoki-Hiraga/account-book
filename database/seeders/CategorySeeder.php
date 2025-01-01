<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => '家賃']);
        Category::create(['name' => '駐車場,保険']);
        Category::create(['name' => '電気']);
        Category::create(['name' => '水道']);
        Category::create(['name' => 'ガス']);
        Category::create(['name' => '光通信']);
        Category::create(['name' => '外食']);
        Category::create(['name' => '食費']);
        Category::create(['name' => '日用品']);
        Category::create(['name' => 'レジャー']);
        Category::create(['name' => '家電']);
        Category::create(['name' => '内祝']);
        Category::create(['name' => '妊活']);
        Category::create(['name' => 'その他']);
    }
}
