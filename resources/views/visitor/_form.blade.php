<div class="form-group">
    <input type="hidden" name="user_id" value="{{ Sentinel::getUser()->id }}">
    <label for="nama" class="control-label">Nama</label>
    <input style="height: 15px" type="text" name="nama" id="nama" class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="Nama Lengkap Anda" value="{{ old('nama') ?? $biodata->nama }}">
    {!! $errors->first('nama','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="form-group">
    <label for="Agama" class="control-label">Agama</label>
    <select name="agama" id="Agama" class="form-control {{ $errors->has('agama') ? ' is-invalid' : '' }}">
        <option value="" selected>Pilih</option>
        <option value="Islam">Islam</option>
        <option value="Kristen Katolik">Kristen Katolik</option>
        <option value="Kristen Protestan">Kristen Protestan</option>
        <option value="Hindu">Hindu</option>
        <option value="Budha">Budha</option>
        <option value="Konghu Chu">Konghu Chu</option>
    </select>
    {!! $errors->first('agama','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="form-group">
    <label for="TempatLahir" class="control-label">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" id="TempatLahir" class="form-control" placeholder="Tempat Lahir Anda" value="{{ old('tempat_lahir') ?? $biodata->tempat_lahir }}">
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
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary btn-xs">{{ $button }}</button>
</div>