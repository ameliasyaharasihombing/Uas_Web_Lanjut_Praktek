@extends('layout.template')

@section('title', $negara ? $negara->nama : 'Detail Negara')

@section('content')
    @if ($negara)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body">
                        <h2 class="card-title">{{ $negara->nama }}</h2>
                        <p class="card-text">{{ $negara->sejarah }}</p>
                        <p class="card-text">Kategori :
                            {{ $negara->category ? $negara->category->nama_kategori : 'Tidak ada kategori' }}</p>
                        <p class="card-text">Tahun Merdeka: {{ $negara->tahunmerdeka }}</p>
                        <p class="card-text">Pendiri : {{ $negara->pendiri }}</p>
                        <a href="/" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/images/{{ $negara->foto_sampul }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    @else
        <p>Data Negara tidak ditemukan.</p>
    @endif
@endsection
