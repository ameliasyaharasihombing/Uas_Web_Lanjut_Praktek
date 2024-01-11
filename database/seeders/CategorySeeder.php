<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Tidak Maju',
                'keterangan' => 'Negara Tidak Maju'
            ],
            [
                'nama_kategori' => 'Berkembang',
                'keterangan' => 'Negara Berkembang'
            ],
            [
                'nama_kategori' => 'Maju',
                'keterangan' => 'Negara Maju'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
