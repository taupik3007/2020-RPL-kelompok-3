<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nis'=>111,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111'),
            'id_kelas'=>1,
            'level'=>1
        ]);

        DB::table('users')->insert([
            'nis'=>181910091,
            'name' => 'taupik',
            'email' => 'taupik@gmail.com',
            'password' => Hash::make('12345678'),
            'id_kelas'=>1,
            'level'=>2
        ]);

        DB::table('users')->insert([
            'nis'=>181910092,
            'name' => 'serli',
            'email' => 'serli@gmail.com',
            'password' => Hash::make('12345678'),
            'id_kelas'=>2,
            'level'=>2
        ]);
        DB::table('users')->insert([
            'nis'=>181910093,
            'name' => 'rangga',
            'email' => 'rangga@gmail.com',
            'password' => Hash::make('12345678'),
            'id_kelas'=>1,
            'level'=>2
        ]);
        DB::table('users')->insert([
            'nis'=>181910094,
            'name' => 'putri',
            'email' => 'putri@gmail.com',
            'password' => Hash::make('12345678'),
            'id_kelas'=>3,
            'level'=>2
        ]);
        DB::table('users')->insert([
            'nis'=>181910095,
            'name' => 'astri',
            'email' => 'astri@gmail.com',
            'password' => Hash::make('12345678'),
            'id_kelas'=>4,
            'level'=>2
        ]);

    }
}
