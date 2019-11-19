<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Biodata {{ Sentinel::getUser()->first_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('biodata.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('visitor._form', [
                'biodata' => new \App\Biodata,
                'button' => 'Save'
            ])
        </form>
      </div>
    </div>
  </div>
</div>

@if (!empty($biodata))
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Biodata {{ Sentinel::getUser()->first_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('biodata.update',$biodata->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            @include('visitor._form', [
              'button' => 'Edit'
              ])
        </form>
      </div>
    </div>
  </div>
</div>
@endif

@if (!empty($pendidikan))
<!-- Modal Isi Pendidikan -->
<div class="modal fade" id="modalPendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Biodata {{ Sentinel::getUser()->first_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('biodata.update',$biodata->id) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    @include('visitor._form', [
                        'button' => 'Edit'
                        ])
                </form>
            </div>
        </div>
    </div>
</div>
@endif