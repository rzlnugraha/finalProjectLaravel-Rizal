<div class="row">
    <div class="col-sm-12">
        <!-- select -->
        <div class="form-group">
            <label>Jenis Pekerjaan</label>
            <select class="form-control {{ $errors->has('tipe_job') ? 'is-invalid' : '' }}" name="tipe_job">
                <option value="" selected>Pilih</option>
                @foreach ($tipe_job->get() as $item)
                <option value="{{ $item->id }}">{{ $item->job_type }}</option>
                @endforeach
            </select>
            {!! $errors->first('tipe_job','<span class="invalid-feedback">:message</span>') !!}
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
    <label>Nama Perusahaan</label>
    <input type="text" class="form-control {{ $errors->has('nama_perusahaan') ? 'is-invalid' : '' }}" placeholder="Nama Perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') ?? $job->nama_perusahaan}}">
    {!! $errors->first('nama_perusahaan','<span class="invalid-feedback">:message</span>') !!}
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
    <label>Alamat Perusahaan</label>
    <textarea class="form-control {{ $errors->has('alamat_perusahaan') ? 'is-invalid' : '' }}" rows="3" placeholder="Alamat Lengkap Perusahaan" name="alamat_perusahaan">{{ old('alamat_perusahaan') ?? $job->alamat_perusahaan}}</textarea>
    {!! $errors->first('alamat_perusahaan','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Deskripsi</label>
    <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" rows="3" placeholder="Deskripsi Pekerjaan" name="deskripsi">{{ old('deskripsi') ?? $job->deskripsi}}</textarea>
    {!! $errors->first('deskripsi','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Requirement</label>
    <textarea class="form-control {{ $errors->has('requirements') ? 'is-invalid' : '' }}" rows="3" placeholder="Keahlian yang di butuhkan" name="requirements" >{{ old('requirements') ?? $job->requirements }}</textarea>
    {!! $errors->first('requirements','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Foto Perusahaan</label>
    <input type="file" name="foto_perusahaan" id="foto_perusahaan" class="form-control {{ $errors->has('foto_perusahaan') ? 'is-invalid' : '' }}" {{ empty($job->foto_perusahaan) ? 'required' : '' }}>
    {!! $errors->first('foto_perusahaan','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>