<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = \App\Customer::all();

        foreach($customers as $customer)
        {
            $customer->products()->save(factory(\App\Product::class)->make());
        }
    }
}
