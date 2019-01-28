<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory('App\User')->create([
            'name'     => 'Alice',
            'email'    => 'operator@makeitall.co.uk',
            'password' => Hash::make('password'),
        ]);

        factory('App\User')->create([
            'name'     => 'Bert',
            'email'    => 'specialist@makeitall.co.uk',
            'password' => Hash::make('password'),
        ]);

        factory('App\User')->create([
            'name'     => 'Dave',
            'email'    => 'analyst@makeitall.co.uk',
            'password' => Hash::make('password'),
        ]);
    }
}
