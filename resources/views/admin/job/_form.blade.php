<div class="row">
    <div class="col-sm-12">
        <!-- select -->
        <div class="form-group">
            <label>Jenis Pekerjaan</label>
            <select class="form-control {{ $errors->has('tipe_job') ? 'is-invalid' : '' }}" name="tipe_job">
                @foreach ($tipe_job->get() as $item)
                <option {{ $item->id == $job->tipe_job ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->job_type }}</option>
                @endforeach
            </select>
            {!! $errors->first('tipe_job','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="col-sm-12">
        <!-- select -->
        <div class="form-group">
            <label>Perusahaan</label>
            <select class="form-control {{ $errors->has('company_id') ? 'is-invalid' : '' }}" name="company_id">
                <option value="" selected>Pilih</option>
                @foreach ($company->get() as $item)
                <option {{ $item->id == $job->company_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                @endforeach
            </select>
            {!! $errors->first('company_id','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
        <label>Nama Pekerjaan</label>
        <input type="text" class="form-control {{ $errors->has('nama_pekerjaan') ? 'is-invalid' : '' }}" placeholder="Contoh : Programmer" name="nama_pekerjaan" value="{{ old('nama_pekerjaan') ?? $job->nama_pekerjaan}}">
        {!! $errors->first('nama_pekerjaan','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
        <label>Tanggal Akhir Apply</label>
        <input type="date" name="tanggal_expired" id="tanggal_expired" class="form-control {{ $errors->has('tanggal_expired') ? 'is-invalid' : '' }}" value="{{ old('tanggal_expired') ?? $job->tanggal_expired}}">
        {!! $errors->first('tanggal_expired','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
        <label>Gaji</label>
        <input type="number" class="form-control {{ $errors->has('gaji') ? 'is-invalid' : '' }}" placeholder="Rp." name="gaji" value="{{ old('gaji') ?? $job->gaji}}">
        {!! $errors->first('gaji','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="form-group">
    <label>Deskripsi Pekerjaan</label>
    <textarea class="form-control {{ $errors->has('deskripsi_pekerjaan') ? 'is-invalid' : '' }}" rows="3" placeholder="Deskripsi Pekerjaan" name="deskripsi_pekerjaan">{{ old('deskripsi_pekerjaan') ?? $job->deskripsi_pekerjaan}}</textarea>
    {!! $errors->first('deskripsi_pekerjaan','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Requirement</label>
    <textarea class="form-control {{ $errors->has('requirements') ? 'is-invalid' : '' }}" rows="3" placeholder="Keahlian yang di butuhkan" name="requirements" >{{ old('requirements') ?? $job->requirements }}</textarea>
    {!! $errors->first('requirements','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>