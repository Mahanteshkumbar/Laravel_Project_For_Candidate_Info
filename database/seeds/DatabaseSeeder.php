<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB:: table('Admin')->insert([

        	'name' => 'Mant',
        	'email' => 'mant.kumbar@gmail.com',
        	'state' => 'Karnataka',
        	'city' => 'Belagavi',
        	'password' => Hash::make('123456')
        ]);
    }
}
