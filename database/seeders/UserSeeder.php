<?php



namespace Database\Seeders;



use App\Models\User;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder

{

    /**

     * Run the database seeds.

     */

    public function run(): void

    {

        $admin = User::create([

            //'setup' => true,

            'name' => 'Administrator',

            'email' => 'admin@admin.com',

            'password' => bcrypt('password'),

            'email_verified_at' => now(),

        ]);



        $admin->assignRole(Role::whereName('Super Administrator')->firstOrFail());

    }

}
