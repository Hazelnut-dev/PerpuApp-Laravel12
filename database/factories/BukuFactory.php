<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    public function definition(): array
    {
        static $kodeBuku = 1;
        $stok = $this->faker->numberBetween(10, 50);
        $rusak = $this->faker->numberBetween(0, 5);
        
        return [
            'KodeBuku' => 'B' . str_pad($kodeBuku++, 4, '0', STR_PAD_LEFT),
            'NoUDC' => $this->faker->unique()->numerify('UDC###'),
            'Judul' => $this->faker->sentence(3),
            'Penerbit' => $this->faker->company(),
            'Pengarang' => $this->faker->name(),
            'TahunTerbit' => $this->faker->dateTimeBetween('-20 years', 'now'),
            'Deskripsi' => $this->faker->paragraph(),
            'ISBN' => $this->faker->unique()->isbn13(),
            'Stok' => $stok,
            'Rusak' => $rusak,
            'Total' => $stok + $rusak,
            'kategori_id' => Kategori::inRandomOrder()->first()->id,
            'rak_id' => Rak::inRandomOrder()->first()->id,
        ];
    }
}
