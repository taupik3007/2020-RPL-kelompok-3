<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([


            'nama_kategori'=>'OSIS'
        ]);

        DB::table('kategori')->insert([


            'nama_kategori'=>'PRAMUKA'
        ]);

        DB::table('kategori')->insert([


            'nama_kategori'=>'PADUAN SUARA'
        ]);
    }
}
