<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Carbon;

class PenggunasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengguna::insert([
            [
                'id' => '1',
                'nama' => 'Hassan Fasya Hidayat',
                'email' => 'hassanfhidayat@gmail.com',
                'job' => 'Administrator',
                'password' => '12345678',
                'foto' => 'foto\WhatsApp Image 2020-05-01 at 15.39.35.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => '2',
                'nama' => 'Masaya Hasegawa',
                'email' => 'hasegawamasaya@gmail.com',
                'job' => 'Operator',
                'password' => '12345678',
                'foto' => 'foto\Shogun2_2020_09_03_21_08_08_845.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => '3',
                'nama' => 'Hogan Kenway',
                'email' => 'hogankenway@gmail.com',
                'job' => 'User-Client',
                'password' => '12345678',
                'foto' => 'foto\33089658_973007546201143_2219164405902344192_n.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
