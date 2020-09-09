<?php

use Illuminate\Database\Seeder;

class CalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calon')->insert([

            'id_calon'=>3,
            'id_kategori'=>1,
            'id_wakil'=>4,
            'visi'=>'memperkokoh silaturahmi',
            'misi'=>'melakukan bersih bersih kelas tiap hari',
            'status'=>2
        ]);
        DB::table('calon')->insert([

            'id_calon'=>5,
            'id_kategori'=>1,
            'id_wakil'=>6,
            'visi'=>'memperkokoh silaturahmi',
            'misi'=>'melakukan bersih bersih kelas tiap hari',
            'status'=>2
        ]);
        DB::table('calon')->insert([

            'id_calon'=>3,
            'id_kategori'=>2,
            'id_wakil'=>5,
            'visi'=>'memperkokoh silaturahmi',
            'misi'=>'melakukan bersih bersih kelas tiap hari',
            'status'=>2
        ]);
        DB::table('calon')->insert([

            'id_calon'=>4,
            'id_kategori'=>2,
            'id_wakil'=>6,
            'visi'=>'memperkokoh silaturahmi',
            'misi'=>'melakukan bersih bersih kelas tiap hari',
            'status'=>2
        ]);
    }
}
