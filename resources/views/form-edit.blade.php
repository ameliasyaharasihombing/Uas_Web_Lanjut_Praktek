@extends('layout.template')
@section('title', 'Edit Data Negara')
@section('content')
    <h2 class="mb-4">Edit Negara</h2>
    <form action="/negara/{{ $negara->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID Negara:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $negara->id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Negara:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $negara->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $negara->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah:</label>
            <textarea class="form-control" id="sejarah" name="sejarah" rows="4" required>{{ $negara->sejarah }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tahunmerdeka" class="form-label">Tahun Merdeka:</label>
            <input type="number" class="form-control" id="tahunmerdeka" name="tahunmerdeka" value="{{ $negara->tahunmerdeka }}" required>
        </div>
        <div class="mb-3">
            <label for="pendiri" class="form-label">Pendiri:</label>
            <input type="text" class="form-control" id="pendiri" name="pendiri" value="{{ $negara->pendiri }}" required>
        </div>
        <div class="mb-3">
            <label for="change_foto" class="form-label">Ganti Foto Sampul:</label>
            <input type="checkbox" id="change_foto" name="change_foto" value="1">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <img src="/images/{{ $negara->foto_sampul }}" class="img-thumbnail" alt="Foto Sampul" width="100px">
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul" accept="image/*">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
