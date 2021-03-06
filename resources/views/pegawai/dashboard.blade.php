@extends('layouts.apppegawai', ['title' => 'Dashboard'])

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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>-</h3>

                                <p>Daftar Muzakki</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon ion ion-person"></i>
                            </div>
                            <a href="{{route('pegawai.daftarMuzakki')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>-</h3>

                                <p>Daftar Mustahik</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon ion ion-person"></i>
                            </div>
                            <a href="{{route('pegawai.daftarMustahik')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>-</h3>

                                <p>Akun Bank</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-handshake"></i>
                            </div>
                            <a href="{{route('pegawai.daftarAkunBank')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>-</h3>

                                <p>Penerimaan Dana</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                            </div>
                            <a href="{{route('pegawai.penerimaanDana')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>-</h3>

                                <p>Penyaluran Dana</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-money-bill-wave"></i>
                            </div>
                            <a href="{{route('pegawai.penyaluranDana')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('jscript')
    <!-- Sparkline -->
    <script src="{{url('assets/plugins/sparklines/sparkline.js')}}"></script>
@endsection
