<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::latest()->paginate(10);
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'JudulBuku' => 'required|string|max:255',
            'Penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'TahunTerbit' => 'required|date',
            'Deskripsi' => 'required|string',
            'ISBN' => 'required|string|unique:buku,ISBN',
            'Stok' => 'required|integer|min:0',
        ]);

        $kodeBuku = 'B' . str_pad(Buku::max('id') + 1, 4, '0', STR_PAD_LEFT);
        $request->merge(['KodeBuku' => $kodeBuku]);

        Buku::create($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'JudulBuku' => 'required|string|max:255',
            'Penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'TahunTerbit' => 'required|date',
            'Deskripsi' => 'required|string',
            'ISBN' => 'required|string|unique:buku,ISBN,' . $buku->KodeBuku . ',KodeBuku',
            'Stok' => 'required|integer|min:0',
        ]);

        $buku->update($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
