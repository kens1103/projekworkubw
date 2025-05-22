<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::insert([
            [
                'icon' => 'bi-code-slash',
                'title' => 'Pengembangan Perangkat Lunak dan Gim',
                'description' => 'Mempelajari cara membangun aplikasi, perangkat lunak, dan gim interaktif yang inovatif dan bermanfaat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'bi-hdd-network',
                'title' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'description' => 'Fokus pada instalasi, perawatan, serta pengelolaan jaringan komputer dan sistem komunikasi modern.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'bi-bar-chart-line-fill',
                'title' => 'Pemasaran',
                'description' => 'Mengembangkan keterampilan promosi, analisis pasar, komunikasi, dan strategi penjualan untuk dunia bisnis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'bi-building',
                'title' => 'Perhotelan',
                'description' => 'Membekali siswa dengan kemampuan pelayanan, tata boga, front office, dan hospitality berstandar industri.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}