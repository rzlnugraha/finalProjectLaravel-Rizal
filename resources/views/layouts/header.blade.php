<div class="hero-wrap" style="background-image: url('{{ asset('users') }}/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="overlay-2"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-center align-items-center">
      <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
        <div class="text text-center w-100">
          <h1 class="mb-4">Cari Pekerjaan <br>Lebih Mudah</h1>
          <h3>
            @if (Sentinel::check())
            @php
                  $jam = date('G');
                  $username = Sentinel::getUser()->first_name;
                  if ( $jam >= 5 && $jam <= 11 ) {
                    echo "Good Morning, $username";
                  } else if ( $jam >= 12 && $jam <= 18 ) {
                    echo "Good Afternoon, $username";
                  } else if ( $jam >= 19 || $jam <= 4 ) {
                    echo "Good Evening, $username";
                  }
            @endphp 
            @else
                Halo
            @endif
            Your Dream
            <br><span>Job is Waiting</span></h1>
            @include('layouts._toast')
          </h3>
        </div>
      </div>
    </div>
  </div>
  <div class="mouse">
    <a href="#" class="mouse-icon">
      <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
    </a>
  </div>
</div>