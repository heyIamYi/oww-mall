<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/json/product.json'), true);
        $this->migrate($data);
    }

    public function migrate($data)
    {
        foreach ($data as $item)
        {
            $user = Product::create($item);
        }
    }
}
