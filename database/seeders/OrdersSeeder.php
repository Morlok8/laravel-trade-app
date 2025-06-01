<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Order;


class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $orders = [
            ['FIO' => 'Иванов Иван Иванович', 'status' => false, 'number' => 1, 'order_date' => '2025-02-10', 'price' => '3000.00', 'product_id' => 1],
            ['FIO' => 'Петров Петр Петрович', 'status' => false, 'number' => 2, 'order_date' => '2025-03-12', 'price' => '70000.00', 'product_id' => 2],
        ];

        foreach ($orders as $item){
            Order::create($item);
        }
    }
}
