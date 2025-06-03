<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $categories = Kategori::all();
        $racks = Rak::all();

        for ($i = 1; $i <= 50; $i++) {
            $kategori = $categories->random();
            $rak = $racks->random();
            
            Buku::create([
                'KodeBuku' => sprintf('B%04d', $i),
                'NoUDC' => 'UDC' . $faker->numberBetween(100, 999),
                'Judul' => $faker->sentence(3),
                'Penerbit' => $faker->company,
                'Pengarang' => $faker->name,
                'TahunTerbit' => $faker->date(),
                'Deskripsi' => $faker->paragraph,
                'ISBN' => $faker->isbn13,
                'Stok' => $faker->numberBetween(10, 50),
                'Rusak' => $faker->numberBetween(0, 5),
                'Total' => $faker->numberBetween(10, 50) + $faker->numberBetween(0, 5),
                'kategori_id' => $kategori->id,
                'rak_id' => $rak->id,
            ]);
        }
    }
}
