<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
          
            'angkatan'=>'2018-2019',
            'nama_kelas'=>'XIIRPL1'
        ]);

        DB::table('kelas')->insert([

            'angkatan'=>'2018-2019',
            'nama_kelas'=>'XIIRPL2'
        ]);

        DB::table('kelas')->insert([

            'angkatan'=>'2018-2019',
            'nama_kelas'=>'XIIMM1'
        ]);

        DB::table('kelas')->insert([

            'angkatan'=>'2018-2019',
            'nama_kelas'=>'XIIMM2'
        ]);
    }
}
