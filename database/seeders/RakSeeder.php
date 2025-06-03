<?php

namespace Database\Seeders;

use App\Models\Rak;
use Illuminate\Database\Seeder;

class RakSeeder extends Seeder
{
    public function run(): void
    {
        $racks = [
            ['nama' => 'A1', 'lokasi' => 'Lantai 1 Barat', 'deskripsi' => 'Rak untuk buku fiksi'],
            ['nama' => 'A2', 'lokasi' => 'Lantai 1 Barat', 'deskripsi' => 'Rak untuk buku non-fiksi'],
            ['nama' => 'B1', 'lokasi' => 'Lantai 1 Timur', 'deskripsi' => 'Rak untuk buku referensi'],
            ['nama' => 'B2', 'lokasi' => 'Lantai 1 Timur', 'deskripsi' => 'Rak untuk buku sains'],
            ['nama' => 'C1', 'lokasi' => 'Lantai 2 Barat', 'deskripsi' => 'Rak untuk buku sejarah'],
        ];

        foreach ($racks as $rack) {
            Rak::create($rack);
        }
    }
}
