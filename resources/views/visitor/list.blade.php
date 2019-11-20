@extends('layouts.app')
@section('title','Lolokeran')
@push('style')
    
@endpush

@section('content')
    
    <section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">What we offer</span>
        <h2 class="mb-2">Exclusive Offer For You</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($job as $item)
        @php
            $fdate=date('Y-m-d');
            $tdate = $item->tanggal_expired;

            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $fdate);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $tdate);
            $diff_in_days = $to->diffInDays($from);
        @endphp
        <div class="col-md-4">
            <div class="property-wrap ftco-animate">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('/images/perusahaan/'.$item->company->foto_perusahaan) }}');">
                    <a href="{{ route('detail_job',$item->id) }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                        <span class="ion-ios-link"></span>
                    </a>
                    <div class="list-agent d-flex align-items-center">
                        <a href="#" class="agent-info d-flex align-items-center">
                            {{-- <div class="img-2 rounded-circle" style="background-image: url('{{ asset('images/perusahaan/'.$item->company->foto_pribadi) }}');"></div> --}}
                            <h3 class="mb-0 ml-2">{{ $item->company->nama_perusahaan }}</h3>
                        </a>
                        {{-- <div class="tooltip-wrap d-flex">
                            <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                <span class="ion-ios-heart"><i class="sr-only">Bookmark</i></span>
                            </a>
                            <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Compare">
                                <span class="ion-ios-eye"><i class="sr-only">Compare</i></span>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="text">
                    <p class="price mb-3"><span class="old-price"></span><span class="orig-price">{{ Sentinel::check() ? 'Rp. '. number_format($item->gaji,0,',','.').'/bulan' : 'Login untuk melihat gaji' }}<small></small></span></p>
                    <h3 class="mb-0"><a href="properties-single.html">{{ $item->nama_pekerjaan }}</a></h3>
                    <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{ $item->company->alamat_perusahaan }}</span>
                    <ul class="property_list">
                        <li><span class="flaticon-bed"></span>Dibuat {{ $item->created_at->diffForHumans() }}</li>
                        <li><span class="flaticon-floor-plan"></span>Lamaran {{ $diff_in_days }} hari lagi</li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $job->links() }}
    </div>
</section>
    
@endsection

@push('script')
    
@endpush