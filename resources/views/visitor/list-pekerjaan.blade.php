<div class="container gallery-container">
    <div class="tz-gallery">

        <div class="row">
            @foreach ($data as $item)
            @php
                $fdate=date('Y-m-d');
                $tdate = $item->tanggal_expired;

                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $fdate);
                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $tdate);
                $diff_in_days = $to->diffInDays($from);
            @endphp
                
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="{{ route('detail_job',$item->id) }}">
                        <center><img src="{{ asset('/images/perusahaan/'.$item->company->foto_perusahaan) }}" width="300px" height="250px" alt="Park"></center>
                    </a>
                    <div class="caption">
                        <h3>{{ $item->company->nama_perusahaan }}</h3>
                        <p>{{ str_limit($item->company->alamat_perusahaan, 30) }}</p>
                        <h5>{{ $item->nama_pekerjaan }}</h5>
                        <h5>{{ Sentinel::check() ? 'Rp. '. number_format($item->gaji,0,',','.').'/bulan' : 'Login untuk melihat gaji' }}</h5>
                        <p>Dibuat {{ $item->created_at->diffForHumans() }}</p>
                        <p>Ditutup tanggal {{ date('d F Y' ,strtotime($item->tanggal_expired)) }} - {{ $diff_in_days.' hari lagi' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</div>