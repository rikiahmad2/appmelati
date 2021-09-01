@extends('layouts.apppegawai', ['title' => 'Akun Bank'])

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
                        <h1>Daftar Akun Bank</h1>
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
                            <h3 class="card-title">Data Akun Bank</h3>
                            <div class="d-flex flex-row-reverse">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fas fa-plus"></i>
                                    Tambah Akun Bank
                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Bank</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pegawai.tambahAkunBank') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name" id="name2"
                                                    placeholder="Nama" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nomor Rekening</label>
                                                <input type="number" class="form-control" name="no_rek" id="no_rek2"
                                                    placeholder="No Rek" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Deskripsi</label>
                                                <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                                    placeholder="Deskripsi" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Status</label>
                                                <select class="form-control" name="status" id="status2">
                                                    <option value="aktif">Aktif</option>
                                                    <option value="tidak">Tidak</option>
                                                </select>
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
                                        <th>Nomor Rekening</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->no_rek }}</td>
                                            <td>{{ $row->deskripsi }}</td>
                                            <td>{{ $row->status }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" data-id_bank="{{ $row->id_bank }}"
                                                    data-name="{{ $row->name }}" data-no_rek="{{ $row->no_rek }}" data-deskripsi="{{$row->deskripsi}}"
                                                    data-status="{{$row->status}}"
                                                    class="open-AddBookDialog btn btn-warning" data-toggle="modal"
                                                    data-target="#exampleModalEdit">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="delete-AddBookDialog btn btn-danger"
                                                    data-id_bank="{{ $row->id_bank }}" data-name="{{ $row->name }}"
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
                                    <h5 class="modal-title" id="exampleModalEdit">Edit Akun Bank</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('pegawai.editAkunBank') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Nama Lengkap</label>
                                            <input type="hidden" class="form-control" name="id_bank" id="id_bank"
                                                placeholder="Nama" required />
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Nama" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nomor Rekening</label>
                                            <input type="number" class="form-control" name="no_rek" id="no_rek"
                                                placeholder="No Rek" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Deskripsi</label>
                                            <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                                placeholder="Deskripsi" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control" name="status" id="level">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak">Tidak</option>
                                            </select>
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
            var id_bank = $(this).data('id_bank');
            var name = $(this).data('name');
            var no_rek = $(this).data('no_rek');
            var deskripsi = $(this).data('deskripsi');
            var status = $(this).data('status');

            $(".modal-body #id_bank").val(id_bank);
            $(".modal-body #name").val(name);
            $(".modal-body #no_rek").val(no_rek);
            $(".modal-body #deskripsi").val(deskripsi);
            $(".modal-body #status").val(status);
        });

        //MODAL 2
        $(document).on("click", ".delete-AddBookDialog", function() {
            var id_bank = $(this).data('id_bank');
            var name = $(this).data('name');
            var url = "{{ url('/pegawai-delete-akunbank') }}";

            $("#exampleModalLabelDelete").text("Menghapus "+ name + "?");
            $("#delete").click(function() {
                window.location.replace(url + '/' + id_bank);
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
