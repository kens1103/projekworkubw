<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run()
    {
        About::create([
            'title' => ' Usaha Bersama Wikrama adalah unit bisnis yang dikelola oleh Teaching Factory 
        Wikrama Satu Garut, sebagai wujud nyata penerapan pendidikan berbasis industri. 
        Kami berkomitmen untuk menghubungkan dunia pendidikan dengan kebutuhan dunia 
        usaha melalui penyediaan berbagai produk dan layanan berkualitas. Melalui 
        kolaborasi antara peserta didik, guru, dan mitra industri, kami mengembangkan 
        layanan profesional di bidang teknologi, administrasi, jaringan, serta hospitality. 
        Usaha Bersama Wikrama tidak hanya menghadirkan solusi inovatif untuk masyarakat, 
        tetapi juga menjadi sarana pembelajaran nyata bagi peserta didik dalam membentuk 
        kompetensi, karakter, dan daya saing di era global.',
            'visi' => 'Menjadi pusat pengembangan usaha berbasis pendidikan yang inovatif, profesional, dan berdaya saing global.',
            'misi' => 'Menyelenggarakan layanan dan produk yang berkualitas melalui penerapan sistem Teaching Factory.
                    Menumbuhkan jiwa kewirausahaan dan profesionalisme peserta didik melalui pengalaman dunia nyata.
                    Membangun kemitraan yang erat antara dunia pendidikan dan dunia industri.
                    Mendorong inovasi berkelanjutan dalam bidang teknologi, administrasi, jaringan, dan hospitality.
                    Memberikan kontribusi positif bagi pengembangan ekonomi lokal dan masyarakat sekitar.',
]);
}
}