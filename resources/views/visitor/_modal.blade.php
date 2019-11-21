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
        <form action="{{ route('biodata.store',$biodata->id) }}" method="post" enctype="multipart/form-data">
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
            <input type="hidden" name="user_id" value="{{ Sentinel::getUser()->id }}">
            <div class="form-group">
                <label for="TempatLahir" class="control-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="TempatLahir" class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}" placeholder="Tempat Lahir Anda" value="{{ old('tempat_lahir') ?? $biodata->tempat_lahir }}">
            </div>
            <div class="form-group">
                <label for="skill" class="control-label">Skill</label>
                <input type="text" name="skill" id="skill" class="form-control {{ $errors->has('skill') ? 'is-invalid' : '' }}" placeholder="Skill yang anda miliki" value="{{ old('skill') ?? $biodata->skill }}">
                {!! $errors->first('skill','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="prof" class="control-label">Profesi</label>
                <input type="text" name="profesi" id="prof" class="form-control {{ $errors->has('profesi') ? 'is-invalid' : '' }}" placeholder="Tempat Lahir Anda" value="{{ old('profesi') ?? $biodata->profesi }}">
                {!! $errors->first('profesi','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="tgllahir" class="control-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgllahir" class="form-control {{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" value="{{ old('tgl_lahir') ?? $biodata->tgl_lahir }}">
                {!! $errors->first('tgl_lahir','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="keterangan" class="control-label">Keterangan Diri</label>
                <textarea name="keterangan" id="keterangan" cols="5" rows="5" class="form-control" placeholder="Ceritakan mengenai diri anda">{{ old('keterangan') ?? $biodata->keterangan }}</textarea>
                {!! $errors->first('keterangan','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="foto" class="control-label">Foto Pribadi</label>
                <input type="file" name="foto_pribadi" id="foto" class="form-control {{ $errors->has('foto_pribadi') ? 'is-invalid' : ''}}">
                {!! $errors->first('foto_pribadi','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="cv" class="control-label">CV</label>
                <input type="file" name="cv" id="cv" class="form-control {{ $errors->has('cv') ? 'is-invalid' : ''}}">
                {!! $errors->first('cv','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-xs">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endif


<!-- Modal Pendidikan -->
<div class="modal fade" id="modalPendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pendidikan {{ Sentinel::getUser()->first_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('education.store') }}" method="post">
            @csrf
            @include('visitor.form_pendidikan', [
                'pendidikan' => new \App\Education,
                'button' => 'Save'
            ])
        </form>
      </div>
    </div>
  </div>
</div>

@if (!empty($pendidikan))
<!-- Modal Edit Pendidikan -->
<div class="modal fade" id="modalEditPendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Biodata {{ Sentinel::getUser()->first_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('education.update',$pendidikan->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            @include('visitor.form_pendidikan', [
              'button' => 'Edit'
              ])
        </form>
      </div>
    </div>
  </div>
</div>
@endif