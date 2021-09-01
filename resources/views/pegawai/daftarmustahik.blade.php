@extends('layouts.apppegawai', ['title' => 'Akun'])

@section('headassets')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Mustahik</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mustahik</h3>
                            <div class="d-flex flex-row-reverse">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fas fa-plus"></i>
                                    Tambah Mustahik
                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Muzakki</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pegawai.tambahMustahik') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name" id="name2"
                                                    placeholder="Nama" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Kriteria</label>
                                                <select class="form-control" name="kriteria" id="kriteria">
                                                    <option value="fakir">Fakir</option>
                                                    <option value="miskin">Miskin</option>
                                                    <option value="riqab">Riqab</option>
                                                    <option value="gharimin">Gharimin</option>
                                                    <option value="sabilillah">Sabilillah</option>
                                                    <option value="musafir">Musafir</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Nomor KK</label>
                                                <input type="number" class="form-control" name="no_kk" id="no_kk2"
                                                    placeholder="Nomor KK" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">NIK</label>
                                                <input type="number" class="form-control" name="nik" id="nik2"
                                                    placeholder="Nik" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat2"
                                                    placeholder="alamat" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Nomor Telepon</label>
                                                <input type="number" class="form-control" name="notelp" id="notelp2"
                                                    placeholder="nomor telepon" autocomplete="new-password" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Kerja Suami</label>
                                                <input type="text" class="form-control" name="kerja_suami" id="kerja_suami2"
                                                    placeholder="Kerja Suami" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Kerja Istri</label>
                                                <input type="text" class="form-control" name="kerja_istri" id="kerja_istri2"
                                                    placeholder="Kerja Istri" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Jumlah Jiwa</label>
                                                <input type="text" class="form-control" name="jumlah_jiwa" id="jumlah_jiwa2"
                                                    placeholder="Jumlah Jiwa" required />
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kriteria</th>
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>Kerja Suami</th>
                                        <th>Kerja Istri</th>
                                        <th>Jumlah Jiwa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($mustahik as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->kriteria }}</td>
                                            <td>{{ $row->no_kk }}</td>
                                            <td>{{ $row->nik }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->notelp }}</td>
                                            <td>{{ $row->kerja_suami }}</td>
                                            <td>{{ $row->kerja_istri }}</td>
                                            <td>{{ $row->jumlah_jiwa }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" data-id="{{ $row->id }}"
                                                    data-name="{{ $row->name }}" data-kriteria="{{ $row->kriteria }}" data-no_kk="{{$row->no_kk}}"
                                                    data-nik="{{$row->nik}}" data-alamat="{{ $row->alamat }}" data-notelp="{{ $row->notelp }}"
                                                    data-kerja_suami="{{ $row->kerja_suami }}" data-kerja_istri="{{ $row->kerja_istri }}" data-jumlah_jiwa="{{ $row->jumlah_jiwa }}"
                                                    class="open-AddBookDialog btn btn-warning" data-toggle="modal"
                                                    data-target="#exampleModalEdit">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="delete-AddBookDialog btn btn-danger"
                                                    data-id2="{{ $row->id }}" data-name="{{ $row->name }}"
                                                    data-toggle="modal" data-target="#exampleModalDelete">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabelDelete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelDelete">
                                                Yakin untuk menghapus ini?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="button" class="btn btn-danger" id="delete">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit -->
                        <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalEdit" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalEdit">Edit Mustahik</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('pegawai.editMustahik') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Nama Lengkap</label>
                                            <input type="hidden" class="form-control" name="id" id="id"
                                                placeholder="id" required />
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Nama" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kriteria</label>
                                            <select class="form-control" name="kriteria" id="kriteria">
                                                <option value="fakir">Fakir</option>
                                                <option value="miskin">Miskin</option>
                                                <option value="riqab">Riqab</option>
                                                <option value="gharimin">Gharimin</option>
                                                <option value="sabilillah">Sabilillah</option>
                                                <option value="musafir">Musafir</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Nomor KK</label>
                                            <input type="number" class="form-control" name="no_kk" id="no_kk"
                                                placeholder="Nomor KK" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">NIK</label>
                                            <input type="number" class="form-control" name="nik" id="nik"
                                                placeholder="Nik" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat"
                                                placeholder="alamat" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Nomor Telepon</label>
                                            <input type="number" class="form-control" name="notelp" id="notelp"
                                                placeholder="nomor telepon" autocomplete="new-password" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kerja Suami</label>
                                            <input type="text" class="form-control" name="kerja_suami" id="kerja_suami"
                                                placeholder="Kerja Suami" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kerja Istri</label>
                                            <input type="text" class="form-control" name="kerja_istri" id="kerja_istri"
                                                placeholder="Kerja Istri" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jumlah Jiwa</label>
                                            <input type="text" class="form-control" name="jumlah_jiwa" id="jumlah_jiwa"
                                                placeholder="Jumlah Jiwa" required />
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('jscript')
    <!-- DataTables -->
    <script src="{{ url('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(document).on("click", ".open-AddBookDialog", function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var kriteria = $(this).data('kriteria');
            var no_kk = $(this).data('no_kk');
            var nik = $(this).data('nik');
            var alamat = $(this).data('alamat');
            var notelp = $(this).data('notelp');
            var kerja_suami = $(this).data('kerja_suami');
            var kerja_istri = $(this).data('kerja_istri');
            var jumlah_jiwa = $(this).data('jumlah_jiwa');

            $(".modal-body #id").val(id);
            $(".modal-body #name").val(name);
            $(".modal-body #kriteria").val(kriteria);
            $(".modal-body #no_kk").val(no_kk);
            $(".modal-body #nik").val(nik);
            $(".modal-body #alamat").val(alamat);
            $(".modal-body #notelp").val(notelp);
            $(".modal-body #kerja_suami").val(kerja_suami);
            $(".modal-body #kerja_istri").val(kerja_istri);
            $(".modal-body #jumlah_jiwa").val(jumlah_jiwa);
        });

        //MODAL 2
        $(document).on("click", ".delete-AddBookDialog", function() {
            var id = $(this).data('id2');
            var name = $(this).data('name');
            var url = "{{ url('/pegawai-delete-mustahik') }}";

            $("#exampleModalLabelDelete").text("Menghapus "+ name + "?");
            $("#delete").click(function() {
                window.location.replace(url + '/' + id);
            });
        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('tambah'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Data Di Tambah',
                    text: 'Data Berhasil Di Tambah',
                    icon: 'success'
                })
            });
        </script>
    @endif
    @if (session('delete'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Data Dihapus',
                    text: 'Data Berhasil Dihapus',
                    icon: 'success'
                })
            });
        </script>
    @endif
    @if (session('edit'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Data Di Edit',
                    text: 'Data Berhasil Di Edit',
                    icon: 'success'
                })
            });
        </script>
    @endif
@endsection
