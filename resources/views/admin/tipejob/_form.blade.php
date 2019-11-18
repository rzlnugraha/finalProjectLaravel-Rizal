<div class="form-group">
<label>Tipe Pekerjaan</label>
<input type="text" class="form-control {{ $errors->has('job_type') ? 'is-invalid' : '' }}" placeholder="Enter ..." name="job_type" value="{{ old('job_type') ?? $tipejob->job_type }}">
{!! $errors->first('job_type','<span class="invalid-feedback">:message</span>') !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>