<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('couriers')->insert(
            [
                'name' => 'JNE',
                'cost' => 9000
            ]
        );
        DB::table('couriers')->insert(
            [
                'name' => 'Wahana',
                'cost' => 5000
            ]
        );
        DB::table('couriers')->insert(
            [
                'name' => 'J&T',
                'cost' => 10000
            ]
        );
    }
}
