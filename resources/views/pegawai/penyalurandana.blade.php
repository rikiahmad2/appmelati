@extends('layouts.apppegawai', ['title' => 'Penerimaan Dana'])

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
                        <h1>Daftar Penyaluran Dana</h1>
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
                            <h3 class="card-title">Daftar Penyaluran Dana</h3>
                            <div class="d-flex flex-row-reverse">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fas fa-plus"></i>
                                    Tambah Penyaluran Dana
                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Penyaluran Dana</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pegawai.tambahPenerimaanDana') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Nama Mustahik</label>
                                                <select class="form-control" name="id_mustahik" id="id_mustahik2">
                                                    @foreach ($mustahik as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Kriteria Mustahik</label>
                                                <select class="form-control" name="id_muzakki" id="id_muzakki2" readonly>
                                                    @foreach ($mustahik as $row)
                                                        <option value="{{ $row->id }}">{{ $row->kriteria }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Id Mustahik</label>
                                                <input type="number" class="form-control" name="id_mustahik"
                                                    id="id_mustahik2" placeholder="Id Mustahik" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Alamat</label>
                                                <input type="number" class="form-control" name="alamat"
                                                    id="alamat2" placeholder="Alamat" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Tanggal</label>
                                                <input type="date" class="form-control" name="created_at"
                                                    id="created_at2" placeholder="Tanggal" />
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
                                        <th>Jenis</th>
                                        <th>Jumlah</th>
                                        <th>Nama Mustahik</th>
                                        <th>Kriteria Mustahik</th>
                                        <th>Id Mustahik</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Penyaluran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row->penerimaan->jenis }}</td>
                                            <td>{{ $row->penerimaan->jumlah_pembayaran }}</td>
                                            <td>{{ $row->penerimaan->mustahik->name }}</td>
                                            <td>{{ $row->penerimaan->mustahik->kriteria }}</td>
                                            <td>{{ $row->penerimaan->mustahik->id }}</td>
                                            <td>{{ $row->penerimaan->mustahik->alamat }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" data-id_penerimaan="{{ $row->id_penerimaan }}"
                                                    class="open-AddBookDialog btn btn-warning" data-toggle="modal"
                                                    data-target="#exampleModalEdit">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="delete-AddBookDialog btn btn-danger"
                                                    data-id_penerimaan="{{ $row->id_penerimaan }}" data-toggle="modal"
                                                    data-target="#exampleModalDelete">
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
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
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
                                            <h5 class="modal-title" id="exampleModalEdit">Edit Penyaluran Dana</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pegawai.editPenerimaanDana') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Nama Mustahik</label>
                                                    <select class="form-control" name="id_mustahik" id="id_mustahik2">
                                                        @foreach ($mustahik as $row)
                                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Kriteria Mustahik</label>
                                                    <select class="form-control" name="id_muzakki" id="id_muzakki2" readonly>
                                                        @foreach ($mustahik as $row)
                                                            <option value="{{ $row->id }}">{{ $row->kriteria }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Id Mustahik</label>
                                                    <input type="number" class="form-control" name="id_mustahik"
                                                        id="id_mustahik2" placeholder="Id Mustahik" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Alamat</label>
                                                    <input type="number" class="form-control" name="alamat"
                                                        id="alamat2" placeholder="Alamat" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Tanggal</label>
                                                    <input type="date" class="form-control" name="created_at"
                                                        id="created_at2" placeholder="Tanggal" />
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
            var id_penerimaan = $(this).data('id_penerimaan');
            var id_mustahik = $(this).data('id_mustahik');
            var id_muzakki = $(this).data('id_muzakki');
            var id_bank = $(this).data('id_bank');
            var id_user = $(this).data('id_user');
            var jenis = $(this).data('jenis');
            var cara_pembayaran = $(this).data('cara_pembayaran');
            var bentuk_pembayaran = $(this).data('bentuk_pembayaran');
            var jumlah_pembayaran = $(this).data('jumlah_pembayaran');

            $(".modal-body #id_mustahik").val(id_mustahik);
            $(".modal-body #id_penerimaan").val(id_penerimaan);
            $(".modal-body #id_muzakki").val(id_muzakki);
            $(".modal-body #id_bank").val(id_bank);
            $(".modal-body #id_user").val(id_user);
            $(".modal-body #jenis").val(jenis);
            $(".modal-body #cara_pembayaran").val(cara_pembayaran);
            $(".modal-body #bentuk_pembayaran").val(bentuk_pembayaran);
            $(".modal-body #jumlah_pembayaran").val(jumlah_pembayaran);
        });

        //MODAL 2
        $(document).on("click", ".delete-AddBookDialog", function() {
            var id_penerimaan = $(this).data('id_penerimaan');
            var url = "{{ url('/pegawai-delete-penerimaandana') }}";

            $("#exampleModalLabelDelete").text("Menghapus id " + id_penerimaan + "?");
            $("#delete").click(function() {
                window.location.replace(url + '/' + id_penerimaan);
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
