<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'John Doe',
            'email' => 'jdoe@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $author = User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'name' => 'Harry Patterson',
            'email' => 'patpat@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
