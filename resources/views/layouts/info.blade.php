<section class="ftco-counter ftco-section img" id="section-counter">
        <div class="overlay"></div>
    <div class="container">
        <div class="row">
        @foreach ($kategori as $item)
        <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
                <div class="text text-border d-flex align-items-center">
                    <strong class="number">{{ $item->total }}</strong>
                    <span>{{ $item->tipe }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>