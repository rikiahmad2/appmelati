@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ url('assets/dist/img/programmer.svg') }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->level }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b><i class="fas fa-pencil-alt"></i> NIP</b> <a
                                            class="float-right">{{ Auth::user()->nip }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><i class="fas fa-transgender"></i> Jenis Kelamin</b> <a
                                            class="float-right">{{ Auth::user()->jenis_kelamin }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><i class="fas fa-map-marker-alt"></i> Alamat</b> <a
                                            class="float-right">{{ Auth::user()->alamat }}</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block" id="btnstatus"><b>Check Status</b></a>
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
                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                            data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" method="POST" action="{{ route('admin.editAkun') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">NIP</label>
                                                <div class="col-sm-10">
                                                    <input name="id" type="hidden" class="form-control" id="inputName"
                                                    value="{{ Auth::user()->id }}" readonly>
                                                    <input name="nip" type="text" class="form-control" id="inputName"
                                                        value="{{ Auth::user()->nip }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input name="level" type="hidden" class="form-control" id="inputName"
                                                    value="{{ Auth::user()->level }}" readonly>
                                                    <input name="email" type="email" class="form-control" id="inputEmail"
                                                        value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input name="name" type="text" class="form-control" id="inputName2"
                                                        value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <textarea name="alamat" class="form-control" id="inputExperience"
                                                        placeholder="Alamat Kamu">{{ Auth::user()->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-10">
                                                    <input name="jenis_kelamin" type="text" class="form-control"
                                                        id="inputSkills" value="{{ Auth::user()->jenis_kelamin }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Password Baru
                                                    (*optional)</label>
                                                <div class="col-sm-10">
                                                    <input name="password" type="password" class="form-control" id="inputSkills"
                                                        placeholder="Masukan Password Baru Bila Ingin Mengganti" autocomplete="false">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">Submit</button>
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
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $("#btnstatus").click(function() {
                Swal.fire({
                    title: 'Active',
                    text: 'Status Akun Anda Adalah Aktif',
                    icon: 'info',
                    confirmButtonText: 'Mengerti'
                })
            });
        </script>
        @if (session('edit'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data Berhasil Di Edit',
                        icon: 'success'
                    })
                });
            </script>
        @endif
    @endsection

    @section('jscript')
        <!-- Sparkline -->
        <script src="{{ url('assets/plugins/sparklines/sparkline.js') }}"></script>
    @endsection
