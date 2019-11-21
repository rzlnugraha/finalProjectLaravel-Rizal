<table class="table myTable">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Perusahaan</th>
            <th scope="col">Pekerjaan</th>
            <th scope="col">Tanggal Apply</th>
            <th scope="col">Status Apply</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @forelse ($data as $item)
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $item->job->company->nama_perusahaan }}</td>
            <td>{{ $item->job->nama_pekerjaan }}</td>
            <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
            <td>{{ strtoupper($item->status_apply) }}</td>
        </tr>
        @empty
        <tr>
            <th colspan="5" align="center">DATA TIDAK ADA</th>
        </tr>
        @endforelse
    </tbody>
</table>