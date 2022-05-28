<?php



use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CartSeeder::class);
        $this->call(CourierSeeder::class);
        $this->call(FlowerSeeder::class);
        $this->call(FlowertypeSeeder::class);
        $this->call(TransactionheaderSeeder::class);
        $this->call(TransactiondetailSeeder::class);
        $this->call(UserSeeder::class);
    }
}
