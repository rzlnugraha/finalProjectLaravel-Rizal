@extends('layouts.app')
@section('title','Profile '.Sentinel::getUser()->first_name)
@push('style')
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
@endpush

@section('content')
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">Halo {{ Sentinel::getUser()->first_name }}</span>
            <h2 class="mb-2">Your Profile!</h2>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 25rem;">
              <center><img src="{{ empty($biodata) ? '/images/images.jpg' : $biodata->foto_pribadi() }}" style="width:300px; height:250px" class="card-img-top" alt="..."></center>
              <div class="card-body">
                  <h5 class="card-title">{{ Sentinel::getUser()->first_name }}</h5>
                  <p class="card-text">Email : {{ Sentinel::getUser()->email }}</p>
                  <button type="button" class="btn btn-primary" {{ !empty($biodata) ? 'disabled' : '' }} data-toggle="modal" data-target="#exampleModal">
                      Isi Biodata
                  </button>
              </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  Biodata
                </div>
                <div class="card-body">
                  @if (!empty($biodata))
                  <p class="card-text">Nama Lengkap : {{ $biodata->nama }}</p>
                  <p class="card-text">Agama : {{ $biodata->agama }}</p>
                  <p class="card-text">Tempat dan Tanggal Lahir : {{ $biodata->tempat_lahir }}, {{ date('d F Y', strtotime($biodata->tgl_lahir)) }}</p>
                  <p class="card-text"></p>
                  <a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Edit Biodata</a>
                  @else
                  <p class="card-text">Silakan isi biodata</p>
                  @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Biodata {{ Sentinel::getUser()->first_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('biodata.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('visitor._form', [
                'biodata' => new \App\Biodata,
                'button' => 'Save'
            ])
        </form>
      </div>
    </div>
  </div>
</div>
@if (!empty($biodata))
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Biodata {{ Sentinel::getUser()->first_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('biodata.update',$biodata->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            @include('visitor._form', [
              'button' => 'Edit'
              ])
        </form>
      </div>
    </div>
  </div>
</div>
@endif
@endsection

@push('script')
    
@endpush