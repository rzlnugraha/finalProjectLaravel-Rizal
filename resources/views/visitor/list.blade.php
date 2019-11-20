@extends('layouts.app')
@section('title','Lolokeran')
@push('style')
    <link href="{{ asset('select2.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('baguetteBox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('thumbnail-gallery.css') }}">
@endpush

@section('content')

<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <div class="search-wrap-1 ftco-animate">
                    <form action="" class="search-property-1" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg align-items-end">
                            <div class="form-group">
                                <label for="#">Job Name</label>
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="nama_pekerjaan" id="nama_kerjaan" class="form-control semua">
                                            @foreach ($semua as $item)
                                            <option style="color:black;" value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md align-self-end">
                            <div class="form-group">
                                <div class="form-field">
                                    <input type="button" id="cari-kerjaan" value="Search Job" class="form-control btn btn-primary btn-xs">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                </div>
        </div>
    </div>
</section>
    
    <section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">What we offer</span>
        <h2 class="mb-2">Exclusive Offer For You</h2>
        </div>
    </div>
    <div class="data-pekerjaan">
        @include('visitor.list-pekerjaan')
    </div>
    </div>
</section>
    
@endsection

@push('script')
    <script src="{{ asset('select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.semua').select2();

            // Search Article
            $('#cari-kerjaan').on('click', function() {
                $.ajax({
                    url : '{{ route("cari_kerjaan") }}',
                    type : 'GET',
                    dataType : 'json',
                    data : {
                        'cari' : $('#nama_kerjaan').val(),
                        // '_token' : $('input[name=_token]').val() 
                    },
                    success: function(data) {
                        $('.data-pekerjaan').html(data['view']);
                        console.log(data);
                    },
                    error : function (xhr, status) {
                        console.log(xhr.error + " ERROR MANG : " + status);
                    },
                    complete: function () {
                        alreadyloading = false;
                    }
                });
            });
        });
    </script>
@endpush