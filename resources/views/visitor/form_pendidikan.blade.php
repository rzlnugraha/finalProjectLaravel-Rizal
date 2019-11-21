<input type="hidden" name="user_id" value="{{ Sentinel::getUser()->id }}">
<div class="form-group">
    <label for="pendidikan" class="control-label">Pendidikan</label>
    <input type="text" name="pendidikan" id="pendidikan" class="form-control {{ $errors->has('pendidikan') ? 'is-invalid' : ''}}" placeholder="Contoh : D3/S1" value="{{ old('pendidikan') ?? $pendidikan->pendidikan }}">
    {!! $errors->first('pendidikan','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="form-group">
    <label for="angkatan" class="control-label">Angkatan</label>
    <input type="text" name="angkatan" id="angkatan" class="form-control {{ $errors->has('angkatan') ? 'is-invalid' : ''}}" placeholder="Tahun awal mulai pembelajaran" value="{{ old('angkatan') ?? $pendidikan->angkatan }}">
    {!! $errors->first('angkatan','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="form-group">
    <label for="TempatLahir" class="control-label">Sekolah</label>
    <input type="text" name="sekolah" id="TempatLahir" class="form-control {{ $errors->has('sekolah') ? 'is-invalid' : ''}}" placeholder="Sekolah / Universitas / Politeknik" value="{{ old('sekolah') ?? $pendidikan->sekolah }}">
    {!! $errors->first('sekolah','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="form-group">
    <label for="prof" class="control-label">Tahun Lulus</label>
    <input type="numeric" name="lulus_tahun" id="prof" class="form-control {{ $errors->has('lulus_tahun') ? 'is-invalid' : ''}}" placeholder="Tahun lulus" value="{{ old('lulus_tahun') ?? $pendidikan->lulus_tahun }}">
    {!! $errors->first('lulus_tahun','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary btn-xs">{{ $button }}</button>
</div>