<center>
<ul class="list-inline">
    <li class="list-inline-item">
        <a href="{{ $url_edit }}" class="btn btn-primary" title="Edit {{ $row->email }}"><i class="fas fa-edit"></i></a>
    </li>
    <li class="list-inline-item">
        <a href="{{ $url_show }}" class="btn btn-info" title="Show {{ $row->email }}"><i class="fas fa-eye"></i></a>
    </li>
    <li class="list-inline-item">
        <form action="{{ $url_destroy }}" method="post">
            @csrf @method('delete')
            <button class="btn btn-danger"><i class="fa fa-trash" onclick="return confirm('Yakin hapus data')"></i></button>
        </form>
    </li>
</ul>
</center>