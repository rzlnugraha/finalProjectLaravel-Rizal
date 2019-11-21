<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <label>Nama Perusahaan</label>
        <input type="text" class="form-control {{ $errors->has('nama_perusahaan') ? 'is-invalid' : '' }}" placeholder="Contoh : PT. Panjul" name="nama_perusahaan" value="{{ old('nama_perusahaan') ?? $company->nama_perusahaan}}">
        {!! $errors->first('nama_perusahaan','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Waktu Bekerja Perusahaan</label>
    <input type="text" class="form-control {{ $errors->has('waktu_bekerja') ? 'is-invalid' : '' }}" placeholder="Contoh : 8 Jam" name="waktu_bekerja" value="{{ old('waktu_bekerja') ?? $company->waktu_bekerja}}">
    {!! $errors->first('waktu_bekerja','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Jenis Industri</label>
    <input type="text" name="jenis_industri" class="form-control {{ $errors->has('jenis_industri') ? 'is-invalid' : '' }}" value="{{ old('jenis_industri') ?? $company->jenis_industri}}" placeholder="Contoh : IT">
    {!! $errors->first('jenis_industri','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Deskripsi Perusahaan</label>
    <textarea class="form-control {{ $errors->has('deskripsi_perusahaan') ? 'is-invalid' : '' }}" rows="3" placeholder="Deskripsi Pekerjaan" name="deskripsi_perusahaan">{{ old('deskripsi_perusahaan') ?? $company->deskripsi_perusahaan}}</textarea>
    {!! $errors->first('deskripsi_perusahaan','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Alamat Perusahaan</label>
    <textarea class="form-control {{ $errors->has('alamat_perusahaan') ? 'is-invalid' : '' }}" rows="3" placeholder="Alamat Perusahaan" name="alamat_perusahaan" >{{ old('alamat_perusahaan') ?? $company->alamat_perusahaan }}</textarea>
    {!! $errors->first('alamat_perusahaan','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
    <label>Foto Perusahaan</label>
    <input type="file" name="foto_perusahaan" class="form-control {{ $errors->has('foto_perusahaan') ? 'is-invalid' : '' }} {{ empty($company->foto_perusahaan) ? 'required' : '' }}">
    {!! $errors->first('foto_perusahaan','<span class="invalid-feedback">:message</span>') !!}
    </div>
</div>
<div class="col-sm-12">
    <img src="{{ asset('images/perusahaan/'.$company->foto_perusahaan) }}" alt="" srcset="" width="250" height="300">
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>