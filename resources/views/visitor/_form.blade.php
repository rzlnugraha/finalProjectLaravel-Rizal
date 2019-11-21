<input type="hidden" name="user_id" value="{{ Sentinel::getUser()->id }}">
<div class="form-group">
    <label for="TempatLahir" class="control-label">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" id="TempatLahir" class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : ''}}" placeholder="Tempat Lahir Anda" value="{{ old('tempat_lahir') ?? $biodata->tempat_lahir }}">
    {!! $errors->first('tempat_lahir','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="form-group">
    <label for="skill" class="control-label">Skill</label>
    <input type="text" name="skill" id="skill" class="form-control {{ $errors->has('skill') ? 'is-invalid' : ''}}" placeholder="Skill yang anda miliki" value="{{ old('skill') ?? $biodata->skill }}">
    {!! $errors->first('skill','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="form-group">
    <label for="prof" class="control-label">Profesi</label>
    <input type="text" name="profesi" id="prof" class="form-control {{ $errors->has('profesi') ? 'is-invalid' : ''}}" placeholder="Profesi Anda Sekarang" value="{{ old('profesi') ?? $biodata->profesi }}">
    {!! $errors->first('profesi','<span class="invalid-feedback">:message</span>') !!}
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