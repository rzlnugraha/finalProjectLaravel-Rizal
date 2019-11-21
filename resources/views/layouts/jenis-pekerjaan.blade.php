<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
    <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">Perusahaan</span>
        <h2 class="mb-2">Cari Perusahaan Yang Anda Idamkan</h2>
    </div>
    </div>
    <div class="row">
        @foreach ($company as $item)
        <div class="col-md-4">
            <div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url('{{ asset('images/perusahaan/'.$item->foto_perusahaan) }}');">
                <div class="location">
                    <span class="rounded">{{ $item->nama_perusahaan }}</span>
                </div>
                <div class="text">
                    <h3><a href="#">{{ $item->jenis_industri }}</a></h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>