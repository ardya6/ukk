<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->delete();
        Kategori::create(['nama' => 'Ballroom']);
        Kategori::create(['nama' => 'metting room']);
        Kategori::create(['nama' => 'Hallroom']);
    }
}
