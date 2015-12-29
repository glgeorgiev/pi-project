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
            'name'      => 'Georgi Georgiev',
            'email'     => 'georgi.georgiev@delta.bg',
            'password'  => bcrypt('tainaparola123'),
            'is_admin'  => true,
            'created_at'=> $now,
            'updated_at'=> $now,
        ]);
    }
}
