@extends('admin.layouts.app')
@section('title','Index')
@push('style')
@endpush

@section('content-header')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ Sentinel::getUser()->first_name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard {{ Sentinel::getUser()->first_name }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('manage.update',$job->id) }}" method="post">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="" class="control-label">Edit Status</label>
                    <select name="status_apply" id="" class="form-control">
                        <option value="{{ $job->id }}" selected disabled>{{ $job->status_apply }}</option>
                        <option value="Approve">Approve</option>
                        <option value="Reject">Reject</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div><!-- /.container-fluid --> 
@endsection
  
@push('script')
@endpush