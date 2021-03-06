@extends('admin.layouts.app')
@section('title','Halaman '.$user->first_name)
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
              <li class="breadcrumb-item active">{{ $user->first_name.' '.$user->last_name }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection


@section('main-content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ $user->foto() }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->first_name.' '.$user->last_name }}</h3>

                <p class="text-muted text-center">{{ $user->biodata->profesi }}</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Tanggal Lahir</strong>

                <p class="text-muted">
                  {{ date('d F Y', strtotime($user->biodata->tgl_lahir)) }}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>

                <p class="text-muted">{{ $user->biodata->tempat_lahir }}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">{{ $user->biodata->skill }}</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Keterangan</strong>

                <p class="text-muted">{{ $user->biodata->keterangan }}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Education</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Data</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      @foreach ($data as $datas)
                      <div class="user-block">
                        <span class="username">
                          <a href="#">{{ $datas->job->company->nama_perusahaan }}</a> <br>
                          <p href="#">{{ $datas->job->nama_pekerjaan }}</p>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Applied - {{ date('d F Y - H:i:s', strtotime($datas->created_at)) }}</span>
                        <span class="description">Status : {{ strtoupper($datas->status_apply) }}</span>
                      </div>
                      @endforeach
                      {{ $data->links() }}
                    </div>
                    <!-- /.post -->
                  </div>
                  @if (!empty($education))
                      
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div>
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                Education
                              </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <dl>
                                <dt>Sekolah / Pendidikan</dt>
                                <dd>{{ $user->education->sekolah.' / '.$user->education->pendidikan }}.</dd>
                                <dt>Angkatan</dt>
                                <dd>{{ $user->education->angkatan }}.</dd>
                                <dd>Lulus Tahun</dd>
                                <dt>{{ $user->education->lulus_tahun }}</dt>
                              </dl>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  @endif

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{ route('admin.update',$user->id) }}" method="post">
                      @csrf @method('PUT')
                      <div class="form-group row">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="inputName" name="first_name" value="{{ old('first_name') ?? $user->first_name }}">
                          {!! $errors->first('first_name','<span class="invalid-feedback">:message</span>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="lname" name="last_name" value="{{ old('last_name') ?? $user->last_name }}">
                          {!! $errors->first('last_name','<span class="invalid-feedback">:message</span>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="inputEmail" name="email" value="{{ old('email') ?? $user->email }}">
                          {!! $errors->first('email','<span class="invalid-feedback">:message</span>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control {{ $errors->has('tgl_lahir') ? 'is-invalid' : '' }}" id="inputName2" name="tgl_lahir" value="{{ old('tgl_lahir') ?? $user->biodata->tgl_lahir }}">
                          {!! $errors->first('tgl_lahir','<span class="invalid-feedback">:message</span>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->    
@endsection
  
@push('script')
    
@endpush