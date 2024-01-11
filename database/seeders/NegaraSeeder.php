<?php

namespace Database\Seeders;


use App\Models\Negara;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NegaraSeeder extends Seeder
{
    public function run(): void
    {
        $negaras =  [
            [
                'id' => 'id123',
                'nama' => 'Germany',
                'sejarah' => 'Sejarah Jerman melibatkan perkembangan panjang dari suku-suku Jermanik pada zaman kuno hingga pembentukan Jerman modern. Ini termasuk periode Kekaisaran Suci Romawi, Reformasi Protestan, penyatuan Jerman pada tahun 1871, Perang Dunia I dan II, serta pemisahan dan reunifikasi Jerman Timur dan Barat.',
                'tahunmerdeka' => 1871,
                'category_id' => 1,
                'pendiri' => 'Otto von Bismarck',
                'foto_sampul' => 'germany.jpg',
            ],
            [
                'id' => 'id124',
                'nama' => 'Turkey',
                'sejarah' => 'Sejarah Turki mencakup Kekaisaran Seljuk, Kesultanan Ottoman, dan berbagai periode sejarah modern, termasuk pendirian Republik Turki oleh Mustafa Kemal Atatürk pada tahun 1923. Turki juga terlibat dalam peristiwa penting seperti Perang Dunia I dan berbagai transformasi sosial dan politik.',
                'tahunmerdeka' => 1923,
                'category_id' => 1,
                'pendiri' => 'Mustafa Kemal Atatrk',
                'foto_sampul' => 'turkey.jpg',
            ],
            [
                'id' => 'id125',
                'nama' => 'Indonesia',
                'sejarah' => 'Sejarah Indonesia melibatkan rentang waktu yang panjang, dari zaman prasejarah hingga masa kolonial Belanda, dan kemudian perjuangan kemerdekaan yang memuncak pada Proklamasi Kemerdekaan pada tahun 1945. Republik Indonesia didirikan dengan Ir. Soekarno sebagai presiden pertamanya.',
                'tahunmerdeka' => 1945,
                'category_id' => 1,
                'pendiri' => 'Ir. Soekarno',
                'foto_sampul' => 'indonesia.jpg',
            ],
            [
                'id' => 'id126',
                'nama' => 'France',
                'sejarah' => 'Sejarah Perancis kaya dengan berbagai peristiwa termasuk Revolusi Perancis pada abad ke-18, pembentukan Kekaisaran Perancis di bawah Napoleon, serta peranannya dalam Perang Dunia I dan II. Perancis juga merupakan salah satu pendiri Uni Eropa.',
                'tahunmerdeka' => 843,
                'category_id' => 1,
                'pendiri' => 'Tidak Ada Pemimpin Tunggal (Awalnya Merupakan Berbagai Suku dan Kerajaan)',
                'foto_sampul' => 'france.jpg',
            ],
            [
                'id' => 'id127',
                'nama' => 'United States',
                'sejarah' => 'Sejarah Amerika Serikat dimulai dengan kedatangan kolonis Eropa di Amerika Utara pada abad ke-16. Proses kemerdekaan dimulai pada abad ke-18, mencapai puncaknya dengan Deklarasi Kemerdekaan pada tahun 1776. Amerika Serikat tumbuh menjadi negara kuat dan berpengaruh di dunia.',
                'tahunmerdeka' => 1776,
                'category_id' => 1,
                'pendiri' => 'Banyak Tokoh dan Koloni yang Terlibat',
                'foto_sampul' => 'usa.jpg',
            ],
            [
                'id' => 'id128',
                'nama' => 'China',
                'sejarah' => 'Sejarah Tiongkok mencakup ribuan tahun, melibatkan dinasti-dinasti kuno, kekaisaran-kekaisaran besar, dan perubahan sosial yang signifikan. Tiongkok menjadi salah satu peradaban tertua di dunia dan memiliki pengaruh besar di Asia Timur.',
                'tahunmerdeka' => -221,
                'category_id' => 1,
                'pendiri' => 'Tidak Ada Pemimpin Tunggal (Awalnya Berbagai Dinasti)',
                'foto_sampul' => 'china.jpg',
            ],
        ];
        
        foreach ($negaras as $negara) {
            Negara::create([
                'id' => $negara['id'],
                'nama' => $negara['nama'],
                'sejarah' => $negara['sejarah'],
                'tahunmerdeka' => $negara['tahunmerdeka'],
                'category_id' => $negara['category_id'],
                'pendiri' => $negara['pendiri'],
                'foto_sampul' => $negara['foto_sampul'],
            ]);
        }

    }
}
