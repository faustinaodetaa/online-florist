<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('flowers')->insert([
            'flowertype_id' => '1',
            'name' => 'White Roses',
            'price' => 35000,
            'stock' => 5,
            'description' => 'Luxury white roses with fancy',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '1',
            'name' => 'Just For You',
            'price' => 50000,
            'stock' => 3,
            'description' => 'Beautiful Flowers just for you',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '2',
            'name' => 'Lavish Lilies',
            'price' => 65000,
            'stock' => 2,
            'description' => 'Beautiful white lily, fresh from the garden',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '2',
            'name' => 'Sweet Desire',
            'price' => 92000,
            'stock' => 6,
            'description' => 'Nice pretty sweet pink lilies',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '1',
            'name' => 'Sweet Jade',
            'price' => 10000,
            'stock' => 1,
            'description' => 'Bright fresh roses to lighten up your garden',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '1',
            'name' => 'Sweet Jade Jr.',
            'price' => 15000,
            'stock' => 2,
            'description' => 'Bright fresh roses junior to lighten up your garden',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '2',
            'name' => 'Sweet Desire Jr.',
            'price' => 30000,
            'stock' => 1,
            'description' => 'Nice pretty sweet pink lilies junior',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '2',
            'name' => 'Lavish Lilies Jr.',
            'price' => 80000,
            'stock' => 2,
            'description' => 'Beautiful white lily junior, fresh from the garden',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '1',
            'name' => 'Just For You Jr.',
            'price' => 20000,
            'stock' => 4,
            'description' => 'Beautiful Flowers junior just for you',
            'image' => ''
        ]);
        DB::table('flowers')->insert([
            'flowertype_id' => '1',
            'name' => 'White Roses Jr.',
            'price' => 15000,
            'stock' => 5,
            'description' => 'Luxury white roses junior with fancy',
            'image' => ''
        ]);

    }
}
