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
        DB::table('users')->insert([
            'name' => 'administrator',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(RuanganSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(JamSeeder::class);
//        $this->call(MhsSeeder::class);
//        $this->call(DosenSeeder::class);
    }
}