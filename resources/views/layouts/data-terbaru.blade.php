<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">Kerjaan Untuk Antum</span>
        <h2 class="mb-2">Semoga Cocok Dengan Antum</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($job as $item)
        <div class="col-md-4">
            <div class="property-wrap ftco-animate">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('/images/perusahaan/'.$item->company->foto_perusahaan) }}');">
                    <a href="{{ route('detail_job',$item->id) }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                        <span class="ion-ios-link"></span>
                    </a>
                    <div class="list-agent d-flex align-items-center">
                        <a href="#" class="agent-info d-flex align-items-center">
                            <h3 class="mb-0 ml-2">{{ $item->company->nama_perusahaan }}</h3>
                        </a>
                    </div>
                </div>
                <div class="text">
                    <p class="price mb-3"><span class="old-price"></span><span class="orig-price">{{ Sentinel::check() ? 'Rp. '. number_format($item->gaji,0,',','.').'/bulan' : 'Login untuk melihat gaji' }}<small></small></span></p>
                    <h3 class="mb-0"><a href="{{ route('detail_job',$item->id) }}">{{ $item->nama_pekerjaan }}</a></h3>
                    <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{ $item->company->alamat_perusahaan }}</span>
                    <ul class="property_list">
                        <li><span class="flaticon-bed"></span>Dibuat {{ $item->created_at->diffForHumans() }}</li>
                        <li><span class="flaticon-floor-plan"></span>Tutup lamaran {{ date('d F Y' , strtotime($item->tanggal_expired)) }}</li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>