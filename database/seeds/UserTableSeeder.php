<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();

        DB::table('users')->insert([
            'name'      => 'Administrator',
            'email'     => 'admin@example.com',
            'password'  => bcrypt('4eFXMnnumKmZ'),
            'is_admin'  => true,
            'created_at'=> $now,
            'updated_at'=> $now,
        ]);
    }
}
