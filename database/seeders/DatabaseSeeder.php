<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      //  if (app()->environment('local')) {
            DB::table('customers')->insert([
                //'name' => Str::random(10),
                //'email' => Str::random(10).'@gmail.com',
                //'password' => Hash::make('password'),
                'customer_id' => fake()->uuid,
                'name' => fake()->name,
                'active' => fake()->boolean,
                'address' => fake()->address,
                'city' => fake()->city,
                'state' => fake()->state(),
                'zip' => fake()->randomNumber(5),
                'phone' => fake()->phoneNumber,
                'email' => fake()->email,
                'company_name' => fake()->company,
                'website' => fake()->url,
                'comments' => fake()->paragraph,
        ]);

        //$this->call(Auth\RoleSeeder::class);
        //$this->call(UserSeeder::class);
        //if (app()->environment('local')) {
        //$this->call(CustomerSeeder::class);
    }
}
