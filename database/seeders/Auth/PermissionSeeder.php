<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**

     * Run the database seeds.

     */

    public function run(): void
    {
        Permission::create(['name' => 'Manage Customers']);
    }
}
