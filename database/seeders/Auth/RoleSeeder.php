<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder

{

    /**

     * Run the database seeds.

     */

    public function run(): void

    {
        Role::create(['name' => 'Super Administrator']);
        Role::create(['name' => 'Administrator']);
    }
}
