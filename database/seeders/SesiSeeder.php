<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\Sesi;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sesiDari = array(
            DateTime::createFromFormat('H:i:s','08:30:00'),
            DateTime::createFromFormat('H:i:s','09:30:00'),
            DateTime::createFromFormat('H:i:s','10:30:00'),
            DateTime::createFromFormat('H:i:s','11:30:00'),
            DateTime::createFromFormat('H:i:s','13:00:00'),
            DateTime::createFromFormat('H:i:s','14:00:00')
        );

        $sesiSampai = array(
            DateTime::createFromFormat('H:i:s','09:00:00'),
            DateTime::createFromFormat('H:i:s','10:00:00'),
            DateTime::createFromFormat('H:i:s','11:00:00'),
            DateTime::createFromFormat('H:i:s','12:00:00'),
            DateTime::createFromFormat('H:i:s','13:30:00'),
            DateTime::createFromFormat('H:i:s','14:30:00')
        );

        $dokter = Dokter::orderBy('id_dokter', 'asc')->get();
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < sizeof($dokter); $i++) { 
            Sesi::create([
                'dokter_id' => $i+1,
                'dari' => $sesiDari[$i]->format('H:i:s'),
                'sampai' => $sesiSampai[$i]->format('H:i:s'),
                'day' => $faker->randomNumber()
            ]);
        };
    }
}
