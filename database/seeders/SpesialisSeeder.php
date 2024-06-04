<?php

namespace Database\Seeders;

use App\Models\Spesialis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speciality = array('Dokter Umum', 'Kandungan', 'Gigi', 'Kelamin', 'Mata');
        for ($i=0; $i < sizeof($speciality); $i++) { 
            Spesialis::create([
                'nama_spesialis' => $speciality[$i],
                'img_spesialis' => $speciality[$i].'.jpg'
            ]);
        }
    }
}
