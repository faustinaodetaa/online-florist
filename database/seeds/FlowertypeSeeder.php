<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('flowertypes')->insert(
            [
                'name' => 'Rose'
            ]
        );
        DB::table('flowertypes')->insert(
            [
                'name' => 'Lily'
            ]
        );
    }
}
