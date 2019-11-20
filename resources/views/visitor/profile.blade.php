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
              <center><img src="{{ $biodata->foto_pribadi() }}" style="width:300px; height:250px" class="card-img-top" alt="..."></center>
              <div class="card-body">
                  <h5 class="card-title">{{ Sentinel::getUser()->first_name }}</h5>
                  <p class="card-text">Email : {{ Sentinel::getUser()->email }}</p>
                  <button type="button" class="btn btn-primary" {{ !empty($biodata->cv) ? 'disabled' : '' }} data-toggle="modal" data-target="#exampleModal">
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
                  <p class="card-text">Nama Lengkap : {{ Sentinel::getUser()->first_name.' '.Sentinel::getUser()->last_name }}</p>
                  <p class="card-text">Tempat dan Tanggal Lahir : {{ $biodata->tempat_lahir }}, {{ date('d F Y', strtotime($biodata->tgl_lahir)) }}</p>
                  @if (!empty($biodata->cv))
                  <p class="card-text">Skill : {{ $biodata->skill }}
                  <p class="card-text">Profesi : {{ $biodata->profesi }}
                  <p class="card-text">Keterangan : {{ $biodata->keterangan }}
                  
                  
                  </p>
                  <p class="card-text"><embed src="{{ url('/file/cv/'.$biodata->cv) }}" type="application/pdf" width="400" height="300"></p>
                  <a style="color: black;" href="{{ url('/file/cv/'.$biodata->cv) }}">{{ $biodata->cv }}</a><br><br>
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalEdit">Edit Biodata</a>
                  @else
                  <p class="card-text">Silakan isi biodata</p>
                  @endif
                </div>
              </div>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  Pendidikan
                </div>
                <div class="card-body">
                  @if (!empty($pendidikan))
                  <p class="card-text">Nama Lengkap : {{ Sentinel::getUser()->first_name.' '.Sentinel::getUser()->last_name }}</p>
                  <p class="card-text">Tempat dan Tanggal Lahir : {{ $biodata->tempat_lahir }}, {{ date('d F Y', strtotime($biodata->tgl_lahir)) }}</p>
                  <p class="card-text">Keterangan : {{ $biodata->keterangan }}
                  
                  
                  </p>
                  <p class="card-text"><embed src="{{ url('/file/cv/'.$biodata->cv) }}" type="application/pdf" width="400" height="300"></p>
                  <a style="color: black;" href="{{ url('/file/cv/'.$biodata->cv) }}">{{ $biodata->cv }}</a><br><br>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Edit Biodata</a>
                  @else
                  <p class="card-text">Silakan isi pendidikan (Opsional)</p>
                  <p class="card-text"><a href="" data-toggle="modal" data-target="#modalPendidikan" class="btn btn-success" {{ !empty($pendidkan) ? 'disabled' : '' }}>Isi Pendidikan</a></p>
                  @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

@include('visitor._modal')
@endsection

@push('script')
    
@endpush