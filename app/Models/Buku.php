<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'KodeBuku';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'KodeBuku',
        'Judul',
        'Penerbit',
        'Pengarang',
        'TahunTerbit',
        'Deskripsi',
        'ISBN',
        'Stok',
        'KodeKategori',
        'KodeRak'
    ];

    protected $casts = [
        'TahunTerbit' => 'datetime',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'KodeKategori', 'KodeKategori');
    }

    public function rak(): BelongsTo
    {
        return $this->belongsTo(Rak::class, 'KodeRak', 'KodeRak');
    }

    public function detailPeminjamanSiswa(): HasMany
    {
        return $this->hasMany(DetailPeminjamanSiswa::class, 'KodeBuku', 'KodeBuku');
    }

    public function detailPeminjamanNonSiswa(): HasMany
    {
        return $this->hasMany(DetailPeminjamanNonSiswa::class, 'KodeBuku', 'KodeBuku');
    }
}
