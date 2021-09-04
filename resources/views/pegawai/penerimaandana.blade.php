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
                        <h1>Daftar Penerimaan Dana</h1>
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
                            <h3 class="card-title">Daftar Penerimaan Dana</h3>
                            <div class="d-flex flex-row-reverse">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fas fa-plus"></i>
                                    Tambah Penerimaan Dana
                                </button>
                            </div>
                            <div class="d-flex flex-row-reverse mt-2">
                                <a type="button" class="btn btn-primary" href="{{route('pegawai.printPenerimaanDana')}}" target="_blank">
                                    <i class="fas fa-print"></i>
                                    Print Penerimaan Dana
                                </a>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Penerimaan Dana</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pegawai.tambahPenerimaanDana') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Jenis</label>
                                                <select class="form-control" name="jenis" id="jenis2">
                                                    <option value="zakat fitrah">Zakat Fitrah</option>
                                                    <option value="zakat mal">Zakat Mal</option>
                                                    <option value="infak">Infaq</option>
                                                    <option value="sedekah">Sedekah</option>
                                                    <option value="wakaf">Wakaf</option>
                                                    <option value="fidyah">Fidyah</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Nama Muzakki</label>
                                                <select class="form-control" name="id_muzakki" id="id_muzakki2">
                                                    @foreach ($muzakki as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Cara Pembayaran</label>
                                                <select class="form-control" name="cara_pembayaran" id="cara_pembayaran2">
                                                    <option value="cash">Cash</option>
                                                    <option value="transfer">Transfer</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">No Rek. Pendonasi</label>
                                                <select class="form-control" name="id_bank" id="id_bank2">
                                                    @foreach ($bank as $row)
                                                        <option value="{{$row->id_bank}}">{{$row->no_rek}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Bentuk Pembayaran</label>
                                                <select class="form-control" name="bentuk_pembayaran" id="bentuk_pembayaran2">
                                                    <option value="uang">Uang</option>
                                                    <option value="beras">Beras</option>
                                                    <option value="barang donasi">Barang Donasi</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Jumlah Pembayaran</label>
                                                <input type="number" class="form-control" name="jumlah_pembayaran" id="jumlah_pembayaran2"
                                                    placeholder="Jumlah Bayar" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Amil Penerima</label>
                                                <select class="form-control" name="id_user" id="id_user2">
                                                    @foreach ($user as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
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
                                        <th>Jenis</th>
                                        <th>Jumlah Jiwa</th>
                                        <th>Cara Pembayaran</th>
                                        <th>No Rek Pendonasi</th>
                                        <th>Bentuk Pembayaran</th>
                                        <th>Jumlah Pembayaran</th>
                                        <th>Tgl Pembayaran</th>
                                        <th>Amil Penerima</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row->jenis }}</td>
                                            @if ($row->mustahik != null)
                                                <td>{{ $row->mustahik->jumlah_jiwa }}</td>
                                            @elseif($row->mustahik == null)
                                                <td></td>
                                            @endif 
                                            <td>{{ $row->cara_pembayaran }}</td>
                                            <td>{{ $row->bank->no_rek }}</td>
                                            <td>{{ $row->bentuk_pembayaran }}</td>
                                            <td>{{ $row->jumlah_pembayaran }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" data-id_penerimaan="{{ $row->id_penerimaan }}"
                                                    data-jenis="{{ $row->jenis }}" data-cara_pembayaran="{{$row->cara_pembayaran}}"
                                                    data-no_rek="{{$row->bank->no_rek}}" data-bentuk_pembayaran="{{ $row->bentuk_pembayaran }}" data-jumlah_pembayaran="{{ $row->jumlah_pembayaran }}"
                                                    data-id_user="{{$row->user->id}}" data-id_muzakki="{{$row->muzakki->id}}" data-id_bank="{{$row->bank->id_bank}}"
                                                    class="open-AddBookDialog btn btn-warning" data-toggle="modal"
                                                    data-target="#exampleModalEdit">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="delete-AddBookDialog btn btn-danger"
                                                    data-id_penerimaan="{{ $row->id_penerimaan }}"
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
                                    <form action="{{ route('pegawai.editPenerimaanDana') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jenis</label>
                                            <input type="hidden" class="form-control" name="id_penerimaan" id="id_penerimaan"
                                                placeholder="Id Penerimaan" required />
                                            <select class="form-control" name="jenis" id="jenis">
                                                <option value="zakat fitrah">Zakat Fitrah</option>
                                                <option value="zakat mal">Zakat Mal</option>
                                                <option value="infak">Infaq</option>
                                                <option value="sedekah">Sedekah</option>
                                                <option value="wakaf">Wakaf</option>
                                                <option value="fidyah">Fidyah</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Nama Muzakki</label>
                                            <select class="form-control" name="id_muzakki" id="id_muzakki">
                                                @foreach ($muzakki as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Cara Pembayaran</label>
                                            <select class="form-control" name="cara_pembayaran" id="cara_pembayaran">
                                                <option value="cash">Cash</option>
                                                <option value="transfer">Transfer</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">No Rek. Pendonasi</label>
                                            <select class="form-control" name="id_bank" id="id_bank">
                                                @foreach ($bank as $row)
                                                    <option value="{{$row->id_bank}}">{{$row->no_rek}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Bentuk Pembayaran</label>
                                            <select class="form-control" name="bentuk_pembayaran" id="bentuk_pembayaran">
                                                <option value="uang">Uang</option>
                                                <option value="beras">Beras</option>
                                                <option value="barang donasi">Barang Donasi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Jumlah Pembayaran</label>
                                            <input type="number" class="form-control" name="jumlah_pembayaran" id="jumlah_pembayaran"
                                                placeholder="Jumlah Bayar" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Amil Penerima</label>
                                            <select class="form-control" name="id_user" id="id_user">
                                                @foreach ($user as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
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

            $("#exampleModalLabelDelete").text("Menghapus id "+ id_penerimaan + "?");
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
