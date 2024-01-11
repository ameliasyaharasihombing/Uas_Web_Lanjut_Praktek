@extends('layout.template')
@section('title', 'Input Data Negara')
@section('content')
    <h2 class="mb-4">Tambah Negara </h2>
    <form action="/negara/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID Negara:</label>
            <input type="text" class="form-control" id="id" name="id" required="">
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required="">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah:</label>
            <textarea class="form-control" id="sejarah" name="sejarah" rows="4" required=""></textarea>
        </div>
        <div class="mb-3">
            <label for="tahunmerdeka" class="form-label">Tahun Merdeka:</label>
            <input type="number" class="form-control" id="tahunmerdeka" name="tahunmerdeka" required="">
        </div>
        <div class="mb-3">
            <label for="pendiri" class="form-label">Pendiri:</label>
            <input type="text" class="form-control" id="pendiri" name="pendiri" required="">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul" required="">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/negaras/data" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection
