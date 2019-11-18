@extends('layouts.app')
@section('title','Lolokeran')
@push('style')
    
@endpush

@section('content')
    
    {{-- Untuk search job --}}
    @include('layouts.cari-job')

    {{-- Beberapa data job terbaru --}}
    @include('layouts.data-terbaru')

    {{-- Deskripsi web --}}
    @include('layouts.description')

    {{-- Jumlah lowongan pekerjaan yang ada --}}
    @include('layouts.info')
    
    {{-- Data berdasarkan job pekerjaan --}}
    @include('layouts.jenis-pekerjaan')

    {{-- Testimoni --}}
    @include('layouts.testimoni')
    
@endsection

@push('script')
    
@endpush