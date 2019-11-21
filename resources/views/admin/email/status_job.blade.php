<style>
    table.blueTable {
        border: 1px solid #1C6EA4;
        background-color: #EEEEEE;
        width: 100%;
        text-align: left;
        border-collapse: collapse;
        }
        table.blueTable td, table.blueTable th {
        border: 1px solid #AAAAAA;
        padding: 3px 2px;
        }
        table.blueTable tbody td {
        font-size: 13px;
        }
        table.blueTable tr:nth-child(even) {
        background: #D0E4F5;
        }
        table.blueTable thead {
        background: #1C6EA4;
        background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
        border-bottom: 2px solid #444444;
        }
        table.blueTable thead th {
        font-size: 15px;
        font-weight: bold;
        color: #FFFFFF;
        border-left: 2px solid #D0E4F5;
        }
        table.blueTable thead th:first-child {
        border-left: none;
        }

        table.blueTable tfoot {
        font-size: 14px;
        font-weight: bold;
        color: #FFFFFF;
        background: #D0E4F5;
        background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        border-top: 2px solid #444444;
        }
        table.blueTable tfoot td {
        font-size: 14px;
        }
        table.blueTable tfoot .links {
        text-align: right;
        }
        table.blueTable tfoot .links a{
        display: inline-block;
        background: #1C6EA4;
        color: #FFFFFF;
        padding: 2px 8px;
        border-radius: 5px;
        }
</style>
<center><h1>Halo {{ $job->user->first_name }}, Berikut adalah hasil lamaran anda!</h1></center>
<table class="blueTable">
<thead>
    <tr>
    <th>Nama</th>
    <th>Pekerjaan</th>
    <th>Tanggal Apply</th>
    <th>Hasil</th>
    </tr>
</thead>
<tbody>
    <tr>
    <td>{{ $job->user->first_name.' '.$job->user->last_name }}</td>
    <td>{{ $job->job->nama_pekerjaan }}</td>
    <td>{{ date('d F Y', strtotime($job->created_at)) }}</td>
    <td>{{ strtoupper($job->status_apply) }}</td>
    </tr>
</tbody>
</table>
@if ($job->status_apply == 'approve')
<center><h2>Silakan anda datang ke kantor {{ $job->job->company->nama_perusahaan }}</h2></center>
<center><h4>Alamat di {{ $job->job->company->alamat_perusahaan }}</h4></center>
<h1>Pada tanggal {{ date('d F Y', strtotime('+7 days', strtotime($job->created_at))) }}</h1>
@else
<center><h1>Maaf lamaran anda ditolak, coba ke perusahaan lain!</h1></center>
@endif