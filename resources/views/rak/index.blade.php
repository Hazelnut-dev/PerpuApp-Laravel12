@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Rak</h5>
                    <a href="{{ route('rak.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Rak
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode Rak</th>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rak as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td class="text-center">
                                        <div class="btn-group gap-1" role="group">
                                            <a href="{{ route('rak.show', $item) }}" class="btn btn-info btn-sm" title="Detail"><i class="bx bx-show"></i></a>
                                            <a href="{{ route('rak.edit', $item) }}" class="btn btn-warning btn-sm" title="Edit"><i class="bx bx-edit"></i></a>
                                            <form action="{{ route('rak.destroy', $item) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')"><i class="bx bx-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data rak.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $rak->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
