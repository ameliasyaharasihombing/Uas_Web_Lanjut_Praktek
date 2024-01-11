@extends('layout.template')

@section('title', 'Data Negara')

@section('content')

    <h1>Data Negara</h1>
    <a href="/negaras/create" class="btn btn-primary">Input Negara</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Negara</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun Merdeka</th>
                <th scope="col">pendiri</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($negaras as $negara)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $negara->nama }}</td>
                    <td>{{ $negara->category->nama_kategori }}</td>
                    <td>{{ $negara->tahunmerdeka }}</td>
                    <td>{{ $negara->pendiri }}</td>
                    <td class="text-nowrap">
                        <a href="/negara/{{ $negara['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/negara/delete/{{ $negara->id }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $negaras->links() }}
    </div>
@endsection
