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
                'icon' => 'bi-lightbulb-fill',
                'title' => 'Inovatif',
                'description' => 'Kami selalu membawa ide-ide segar untuk solusi digital Anda.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'bi-people-fill',
                'title' => 'Kolaboratif',
                'description' => 'Kerjasama tim kami membantu mewujudkan visi Anda dengan maksimal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'bi-globe2',
                'title' => 'Global Mindset',
                'description' => 'Kami membangun produk digital yang siap bersaing secara global.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}