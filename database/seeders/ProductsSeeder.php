<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            ['name' => 'ваза', 'category_id' => 2, 'price' => 3000.00, 'description' => 'фарфоровая ваза с цветочным декором, выполненным в технике пекинского лака'],
            ['name' => 'телевизор', 'category_id' => 3, 'price' => 35000.00, 'description' => 'жидкокристаллический телевизор'],
            ['name' => 'фигурка', 'category_id' => 1, 'price' => 500.00, 'description' => 'фигурка персонажа фильма'],
        ];

        foreach ($products as $item){
            Product::create($item);
        }
    }
}
