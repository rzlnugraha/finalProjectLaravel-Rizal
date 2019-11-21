@extends('layouts.app')
@section('title','Profile '.Sentinel::getUser()->first_name)
@push('style')
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/datatables.min.css') }}">
@endpush

@section('content')
<section class="ftco-section goto-here">
    <div class="row">
        <div class="container">
            {{-- <form action="" method="post" class="form-inline">
                @csrf
                <input type="search" name="cari" id="cari-apply" class="form-control col-md-2 mb-3" placeholder="Cari data">
            </form> --}}
            <h2>Data Applyan Antum</h2>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <div class="data-applyan">
                        @include('visitor.data-applyan')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
    <script src="{{ asset('assets/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.myTable').DataTable();

            $('#cari-apply').on('keyup', function () {
                $.ajax({
                    url : '{{ route("history") }}',
                    type : 'GET',
                    dataType : 'json',
                    data : {
                        'cari' : $('#cari-apply').val()
                    },
                    success : function(data) {
                        $('.data-applyan').html(data['view']);
                        console.log(data);
                    },
                    error : function (xhr, status) {
                        console.log(xhr.error + "Error : " + status);
                    }
                });
            });
        });
    </script>
@endpush