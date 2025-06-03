<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama' => 'Fiksi', 'deskripsi' => 'Buku-buku fiksi dan novel'],
            ['nama' => 'Non-Fiksi', 'deskripsi' => 'Buku-buku non-fiksi dan pendidikan'],
            ['nama' => 'Referensi', 'deskripsi' => 'Buku-buku referensi dan kamus'],
            ['nama' => 'Sains', 'deskripsi' => 'Buku-buku sains dan teknologi'],
            ['nama' => 'Sejarah', 'deskripsi' => 'Buku-buku sejarah dan biografi'],
        ];

        foreach ($categories as $category) {
            Kategori::create($category);
        }
    }
}
