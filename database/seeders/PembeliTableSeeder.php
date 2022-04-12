<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembeli;

class PembeliTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pembeli::create([
            'name' => 'rois',
            'email' => 'rois@gmail.com',
            'no_telp' => '08212121212'
        ]);
    }
}
