<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Barang;
use App\Models\Muzakki;
use App\Models\Mustahik;
use App\Models\User;
use App\Models\Penerimaan;
use App\Models\Penyaluran;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.dashboard');
    }

    public function profile()
    {
        return view('pegawai.profile');
    }
    public function daftarMuzakki()
    {
        $muzakkiM = new Muzakki();
        $data['muzakki'] = $muzakkiM->get();

        return view('pegawai.daftarmuzakki', $data);
    }

    public function tambahMuzakki(Request $request)
    {
        $data =  $request->all();
        $muzakkiM = new Muzakki();
        $muzakkiM->npwp = $data['npwp'];
        $muzakkiM->name = $data['name'];

        if($data['email'] == null){
            $muzakkiM->email = '-';
        }
        else{
            $muzakkiM->email = $data['email'];
        }

        $muzakkiM->alamat = $data['alamat'];
        $muzakkiM->notelp = $data['notelp'];

        $muzakkiM->save();
        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function deleteMuzakki($id)
    {
        $muzakkiM = Muzakki::find($id);
        $muzakkiM->delete();
        return redirect()->back()->with('delete', 'data berhasil di delete');
    }

    public function editMuzakki(Request $request)
    {
        $data =  $request->all();
        $muzakkiM = Muzakki::find($request->id);
        $muzakkiM->npwp = $data['npwp'];
        $muzakkiM->name = $data['name'];

        if($data['email'] == null){
            $muzakkiM->email = '-';
        }
        else{
            $muzakkiM->email = $data['email'];
        }
        $muzakkiM->alamat = $data['alamat'];
        $muzakkiM->notelp = $data['notelp'];
        $muzakkiM->save();

        return redirect()->back()->with('edit', 'data berhasil di edit');
    }

    public function daftarMustahik()
    {
        $mustahikM = new Mustahik();
        $data['mustahik'] = $mustahikM->get();

        return view('pegawai.daftarmustahik', $data);
    }

    public function tambahMustahik(Request $request)
    {
        $data =  $request->all();
        $mustahikM = new Mustahik();
        $mustahikM->name = $data['name'];
        $mustahikM->kriteria = $data['kriteria'];
        $mustahikM->no_kk = $data['no_kk'];
        $mustahikM->nik = $data['nik'];
        $mustahikM->alamat = $data['alamat'];
        $mustahikM->notelp = $data['notelp'];
        $mustahikM->kerja_istri = $data['kerja_istri'];
        $mustahikM->kerja_suami = $data['kerja_suami'];
        $mustahikM->jumlah_jiwa = $data['jumlah_jiwa'];
        $mustahikM->save();

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function editMustahik(Request $request)
    {
        $data =  $request->all();
        $mustahikM = Mustahik::find($request->id);
        $mustahikM->name = $data['name'];
        $mustahikM->kriteria = $data['kriteria'];
        $mustahikM->no_kk = $data['no_kk'];
        $mustahikM->nik = $data['nik'];
        $mustahikM->alamat = $data['alamat'];
        $mustahikM->notelp = $data['notelp'];
        $mustahikM->kerja_istri = $data['kerja_istri'];
        $mustahikM->kerja_suami = $data['kerja_suami'];
        $mustahikM->jumlah_jiwa = $data['jumlah_jiwa'];
        $mustahikM->save();

        return redirect()->back()->with('edit', 'data berhasil di edit');
    }

    public function deleteMustahik($id)
    {
        $mustahikM = Mustahik::find($id);
        $mustahikM->delete();
        return redirect()->back()->with('delete', 'data berhasil di delete');
    }

    public function daftarAkunBank(Request $request)
    {
        $bankM = new Bank();
        $data['data'] = $bankM->get();

        return view('pegawai.akunbank', $data);
    }

    public function tambahAkunBank(Request $request)
    {
        $data =  $request->all();
        $bankM = new Bank();
        $bankM->name = $data['name'];
        $bankM->no_rek = $data['no_rek'];
        $bankM->deskripsi = $data['deskripsi'];
        $bankM->status = $data['status'];
        $bankM->save();

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function editAkunBank(Request $request)
    {
        $data =  $request->all();
        $bankM = Bank::find($request->id_bank);
        $bankM->name = $data['name'];
        $bankM->no_rek = $data['no_rek'];
        $bankM->deskripsi = $data['deskripsi'];
        $bankM->status = $data['status'];
        $bankM->save();

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function deleteAkunBank($id)
    {
        $bankM = Bank::find($id);
        $bankM->delete();
        return redirect()->back()->with('delete', 'data berhasil di delete');
    }

    public function penerimaanDana(Request $request)
    {
        $data['data'] = Penerimaan::with('bank', 'user', 'muzakki', 'mustahik', 'barang')->get();
        $data['muzakki'] = Muzakki::get();
        $data['bank'] = Bank::get();
        $data['user'] = User::get();
        $data['mustahik'] = Mustahik::get();

        return view('pegawai.penerimaandana', $data);
    }

    public function tambahPenerimaanDana(Request $request)
    {
        $data =  $request->all();
        $penerimaanM = new Penerimaan();
        $penerimaanM->id_muzakki = $data['id_muzakki'];
        if(isset($data['id_bank'])){
            $penerimaanM->id_bank = $data['id_bank'];
        }
        $penerimaanM->id_user = $data['id_user'];
        $penerimaanM->jenis = $data['jenis'];
        $penerimaanM->bayar_jiwa = $data['bayar_jiwa'];
        $penerimaanM->cara_pembayaran = $data['cara_pembayaran'];
        $penerimaanM->bentuk_pembayaran = $data['bentuk_pembayaran'];

        if($request->jumlah_pembayaran != null){
            $penerimaanM->jumlah_pembayaran = $data['jumlah_pembayaran'];
            $penerimaanM->save();
        }
        else{
            $penerimaanM->save();
            //Store Barang
            $barangM = new Barang();
            $barangM->id_penerimaan = $penerimaanM->id_penerimaan;
            $barangM->jumlah = $request->jumlah;
            $barangM->satuan = $request->satuan;
            $barangM->save();
        }

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function deletePenerimaanDana($id)
    {
        $penerimaanM = Penerimaan::find($id);
        $penerimaanM->delete();
        return redirect()->back()->with('delete', 'data berhasil di delete');
    }

    public function editPenerimaanDana(Request $request)
    {
        $data =  $request->all();
        $penerimaanM = Penerimaan::find($request->id_penerimaan);
        $barangM = new Barang();
        $penerimaanM->id_muzakki = $data['id_muzakki'];

        if(isset($data['id_bank'])){
            $penerimaanM->id_bank = $data['id_bank'];
        }
        else{
            $penerimaanM->id_bank = null;
        }

        $penerimaanM->id_user = $data['id_user'];
        $penerimaanM->jenis = $data['jenis'];
        $penerimaanM->cara_pembayaran = $data['cara_pembayaran'];
        $penerimaanM->bentuk_pembayaran = $data['bentuk_pembayaran'];

        if($request->jumlah_pembayaran != null){
            $penerimaanM->jumlah_pembayaran = $data['jumlah_pembayaran'];
            $penerimaanM->save();

            //Delete Barang
            $barangM->where('id_penerimaan', $request->id_penerimaan)->delete();
        }
        else{
            $penerimaanM->save();
            //Store Barang
            $input['id_penerimaan'] = $penerimaanM->id_penerimaan;
            $input['jumlah'] = $request->jumlah;
            $input['satuan'] = $request->satuan;
            $update = $barangM->where('id_penerimaan', $request->id_penerimaan)->update($input);
            if($update == null)
            {
                $barangM->id_penerimaan = $penerimaanM->id_penerimaan;
                $barangM->jumlah = $request->jumlah;
                $barangM->satuan = $request->satuan;
                $barangM->save();
            }
        }

        return redirect()->back()->with('edit', 'data berhasil di tambah');
    }

    public function printPenerimaanDana()
    {
        $current_date = \Carbon\Carbon::now();
        $data = Penerimaan::with('bank', 'user', 'muzakki', 'mustahik')->orderBy('created_at', 'asc')->get();

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(85, 15, "Data Penerimaan Dana");
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Text(70, 20, "Periode ".$data[0]->created_at.' - '.$current_date);
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->setX(2);
        $fpdf->Cell(5, 6, 'NO.', 1, 0, 'C');
        $fpdf->Cell(10, 6, 'Id', 1, 0, 'C');
        $fpdf->Cell(20, 6, 'Jenis', 1, 0, 'C');
        $fpdf->Cell(20, 6, 'Bayar Jiwa', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'No.Rek Pendonasi', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Bentuk Pembayaran', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Jumlah Pembayaran', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Tgl Pembayaran', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Amil Penerima', 1, 0, 'C');

        $i=1;
        foreach($data as $row){
            $fpdf->setX(2);
            $fpdf->Cell(5,20.5, $i.'.',1,0,'C');
            $fpdf->Cell(10,20.5, $row->id_penerimaan,1,0,'C');
            $fpdf->Cell(20,20.5, $row->jenis,1,0, 'C');
            $fpdf->Cell(20,20.5, $row->bayar_jiwa,1,0 ,'C');
            if($row->bank != null){
                $fpdf->Cell(30,20.5, $row->bank->no_rek,1,0, 'C');
            }
            else{
                $fpdf->Cell(30,20.5, '-',1,0, 'C');
            }
            $fpdf->Cell(30,20.5, $row->bentuk_pembayaran,1,0, 'C');
            if ($row->bentuk_pembayaran != 'uang'){
                $fpdf->Cell(30,20.5, $row->barang[0]->jumlah.' '.$row->barang[0]->satuan,1,0, 'C');
            }
            else{
                $fpdf->Cell(30,20.5, $row->jumlah_pembayaran,1,0, 'C');
            }
            $fpdf->Cell(30,20.5, $row->created_at,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->user->name,1,1,'C');
            $i++;
        }

        $fpdf->SetTitle('Penerimaan Dana ZIS');
        $this->fpdf->Output();
        exit;
    }

    public function printKwitansi($id)
    {
        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        $data = Penerimaan::with('bank', 'user', 'muzakki', 'mustahik', 'barang')->where('id_penerimaan', '=', $id)->first();

        header('Content-type: application/pdf');
        $fpdf->AddPage("L", 'A4');
        $fpdf->Image('assets/images/sisPastel.png',32,20,30,30,'PNG');
        $fpdf->Image('assets/images/ttd.png',110,115,70,70,'PNG');
        $fpdf->SetFont('Arial','B','14');
        
        $fpdf->Text(25, 55, "MAZ Baitussalam");
        $fpdf->SetFont('Arial','B','24');

        $fpdf->SetTextColor(87, 143, 102);
        $fpdf->Text(100, 35, "Bukti Penerimaan Dana");
        $fpdf->SetFont('Arial','B','16');
        $fpdf->SetTextColor(0,0,0);
        $fpdf->Text(120, 45, "MAZ Baitussalam");
        $fpdf->SetFont('Arial','B','12');

        //SET LINE
        $fpdf->Text(123, 65, "Sudah Menerima Dari :");
        $fpdf->SetLineWidth(0.8);
        $fpdf->Line(90, 85, 210-5, 85);
        $fpdf->setXY(90,75);
        $fpdf->SetFont('Arial','B','16');
        $fpdf->Cell(112,10,$data->muzakki->name,0,1,'C');
        
        //SEBAGAI PESERTA SIS
        $fpdf->SetFont('Arial','B','14');
        $fpdf->Text(109, 95, "Yang Beralamat di : ".$data->muzakki->alamat."");
        $fpdf->SetFont('Arial','','12');
        $fpdf->Text(122, 100, "No.Telp : ".$data->muzakki->notelp."");
        if($data->bentuk_pembayaran != 'barang donasi'){
            $fpdf->Text(110, 105, "Jumlah Pembayaran : ".$data->jumlah_pembayaran." ".$data->bentuk_pembayaran."");
        }
        else{
            $fpdf->Text(110, 105, "Jumlah Pembayaran : ".$data->barang[0]->jumlah." ".$data->barang[0]->satuan."");
        }
        $fpdf->Text(103, 110, "Tanggal Penerimaan : ".$data->created_at."");
        $fpdf->Text(116, 115, "Amil Penerima : ".$data->user->name."");
        $fpdf->SetFont('Arial','B','16');
        $fpdf->setXY(168,113.5);
        $fpdf->SetTextColor(87, 143, 102);
        $fpdf->Text(123, 125, "Tanda Tangan :");

        $fpdf->SetFont('Arial','B','13');
        $fpdf->Text(137, 178, "Melati");
        $fpdf->SetTextColor(0,0,0);
        $fpdf->Text(116, 184, "Founder MAZ Baitussalam");
        $fpdf->SetTitle('Bukti Penerimaan Dana');
        $this->fpdf->Output();
        exit;
    }

    public function penyaluranDana(Request $request)
    {
        $data['data'] = Penyaluran::with('penerimaan', 'penerimaan.mustahik', 'penerimaan.bank')->get();
        $data['muzakki'] = Muzakki::get();
        $data['bank'] = Bank::get();
        $data['user'] = User::get();
        $data['mustahik'] = Mustahik::get();
        $data['penerimaan'] = Penerimaan::get();

        return view('pegawai.penyalurandana', $data);
    }

    public function dropdownPenyaluran(Request $request)
    {
        $data = Mustahik::find($request->id_mustahik2);
        return $data;
    }

    public function dropdownPenyaluran2(Request $request)
    {
        $data = Penerimaan::find($request->id_penerimaan2);
        $penyaluran = Penyaluran::where('id_penerimaan', $request->id_penerimaan2)->get();

        $data['total_disalurkan']  = 0;
        foreach($penyaluran as $row)
        {
            $data['total_disalurkan'] += $row->dana_disalurkan;
        }

        return $data;
    }

    public function tambahPenyaluranDana(Request $request)
    {
        if($request->jumlah_pembayaran <= 0)
        {
            return redirect()->back()->with('zero', 'gagal');
        }
        
        $penyaluranM = new Penyaluran();
        $penyaluranM->id_penerimaan = $request->id_penerimaan;
        $penyaluranM->dana_disalurkan = $request->jumlah_pembayaran;

        $penerimaanM = Penerimaan::find($request->id_penerimaan);
        $penerimaanM->id_mustahik = $request->id_mustahik;

        //JIKA PENYALURAN MELEBIHI
        $total_disalurkan = 0;
        $data = $penyaluranM->where('id_penerimaan', $request->id_penerimaan)->get();
        foreach($data as $row)
        {
            $total_disalurkan += $row->dana_disalurkan;
        }
        if($total_disalurkan < $request->jumlah_pembayaran && $total_disalurkan != null)
        {
            return redirect()->back()->with('over', 'over');
        }

        if ($request->created_at != null) {
            $penyaluranM->created_at = $request->created_at;
        }
        $penyaluranM->save();
        $penerimaanM->save();

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function editPenyaluranDana(Request $request)
    {
        $penerimaanM2 = Penerimaan::find($request->id_penerimaan);
        $penerimaanM2->id_mustahik = $request->id_mustahik;
        $penerimaanM2->save();

        $penyaluranM = Penyaluran::find($request->id_penyaluran);
        $penyaluranM->id_penerimaan = $request->id_penerimaan;
        $old_disalurkan = $penyaluranM->dana_disalurkan;
        $penyaluranM->dana_disalurkan = $request->jumlah_pembayaran;
        if ($request->created_at != null) {
            $penyaluranM->created_at = $request->created_at;
        }
        $penyaluranM->save();

        //JIKA PENYALURAN MELEBIHI
        $penyaluranModel = new Penyaluran();
        $penerimaanModel = Penerimaan::find($request->id_penerimaan);
        $total_disalurkan = 0;
        $data = $penyaluranModel->where('id_penerimaan', $request->id_penerimaan)->get();
        foreach($data as $row)
        {
            $total_disalurkan += $row->dana_disalurkan;
        }
        if($total_disalurkan > $penerimaanModel->jumlah_pembayaran)
        {
            $penyaluranM2 = Penyaluran::find($request->id_penyaluran);
            $penyaluranM2->dana_disalurkan = $old_disalurkan;
            $penyaluranM2->save();

            return redirect()->back()->with('over', 'over');
        }

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function printpenyaluranDana()
    {
        $data = Penyaluran::with('penerimaan', 'penerimaan.mustahik', 'penerimaan.bank')->orderBy('created_at','asc')->get();
        $current_date = \Carbon\Carbon::now();

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(85, 15, "Data Penyaluran Dana");
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Text(65, 20, "Periode ".$data[0]->created_at.' - '.$current_date);
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->setX(2);
        $fpdf->Cell(5, 6, 'NO.', 1, 0, 'C');
        $fpdf->Cell(10, 6, 'Id', 1, 0, 'C');
        $fpdf->Cell(20, 6, 'Jenis', 1, 0, 'C');
        $fpdf->Cell(20, 6, 'Jumlah', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Nama Mustahik', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Kriteria Mustahik', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Id Mustahik', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Alamat', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Tanggal Penyaluran', 1, 0, 'C');

        $i=1;
        foreach($data as $row){
            $fpdf->setX(2);
            $fpdf->Cell(5,20.5, $i.'.',1,0,'C');
            $fpdf->Cell(10,20.5, $row->id_penyaluran,1,0,'C');
            $fpdf->Cell(20,20.5, $row->penerimaan->jenis,1,0, 'C');
            $fpdf->Cell(20,20.5, $row->dana_disalurkan,1,0 ,'C');
            $fpdf->Cell(30,20.5, $row->penerimaan->mustahik->name,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->penerimaan->mustahik->kriteria,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->penerimaan->mustahik->id,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->penerimaan->mustahik->alamat,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->created_at,1,1,'C');
            $i++;
        }

        $fpdf->SetTitle('Penyaluran Dana ZIS');
        $this->fpdf->Output();
        exit;
    }

    public function deletePenyaluranDana($id)
    {
        $penyaluranM = Penyaluran::find($id);
        $penyaluranM->delete();
        return redirect()->back()->with('delete', 'data berhasil di delete');
    }

    public function laporanDana()
    {
        $penerimaanM = new Penerimaan();
        $data = $penerimaanM->get();
        $data2 = Penyaluran::with('penerimaan', 'penerimaan.mustahik', 'penerimaan.bank')->orderBy('created_at','asc')->get();
        $current_date = \Carbon\Carbon::now();

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');
        $fpdf->Image('assets/sisPastel.png',30,5,20,20,'PNG');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(85, 15, "MAZ BAITUSSALAM");
        $fpdf->Text(76, 22, "Laporan Perubahan Dana ZIS");
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Text(65, 26, "Periode ".$data[0]->created_at.' - '.$current_date);
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->Line(30, 30, 200-5, 30);
        
        
        $fpdf->setY(60);
        $fpdf->setX(30);
        $fpdf->Cell(10, 6, 'NO.', 1, 0, 'C');
        $fpdf->Cell(50, 6, 'Keterangan', 1, 0, 'C');
        $fpdf->Cell(50, 6, 'Total', 1, 0, 'C');
        $fpdf->Cell(50, 6, 'Nominal', 1, 0, 'C');
        $fpdf->SetFont('Arial', '', 10);

        $mal = 0;
        $fitrah = 0;
        $infak = 0;
        $sedekah = 0;
        $fidyah = 0;
        $wakaf = 0;
        foreach ($data as $row) {
            if ($row->jenis == 'zakat fitrah') {
                $fitrah = $fitrah + 1;
            }
            if ($row->jenis == 'zakat mal') {
                $mal = $mal + 1;
            }
            if ($row->jenis == 'infak') {
                $infak = $infak + 1;
            }
            if ($row->jenis == 'sedekah') {
                $sedekah = $sedekah + 1;
            }
            if ($row->jenis == 'fidyah') {
                $fidyah = $fidyah + 1;
            }
            if ($row->jenis == 'wakaf') {
                $wakaf = $wakaf + 1;
            }
            $total_penerimaan = $fitrah + $mal + $infak + $sedekah + $fidyah + $wakaf;
        }

        //Perhitungan Tabel 2
        $fakir = 0;
        $miskin = 0;
        $mualaf = 0;
        $riqab = 0;
        $gharimin = 0;
        $sabilillah = 0;
        $musafir = 0;
        $saldo_awal = 0;
        $saldo_akhir = 0;
        $saldo_akhir_final = 0;

        $nominalfakir=0;
        $nominalmiskin=0;
        $nominalmuafal=0;
        $nominalriqab=0;
        $nominalgharimin=0;
        $nominalsabililah=0;
        $nominalmusafir=0;
        foreach ($data2 as $row) {
            if ($row->penerimaan->mustahik->kriteria == 'fakir') {
                $fakir = $fakir + 1;
                $nominalfakir += $row->dana_disalurkan;
            }
            if ($row->penerimaan->mustahik->kriteria == 'miskin') {
                $miskin = $miskin + 1;
                $nominalmiskin += $row->dana_disalurkan;
            }
            if ($row->penerimaan->mustahik->kriteria == 'mualaf') {
                $mualaf = $mualaf + 1;
                $nominalmuafal += $row->dana_disalurkan;
            }
            if ($row->penerimaan->mustahik->kriteria == 'riqab') {
                $riqab = $riqab + 1;
                $nominalriqab += $row->dana_disalurkan;
            }
            if ($row->penerimaan->mustahik->kriteria == 'gharimin') {
                $gharimin = $gharimin + 1;
                $nominalgharimin += $row->dana_disalurkan;
            }
            if ($row->penerimaan->mustahik->kriteria == 'sabilillah') {
                $sabilillah = $sabilillah + 1;
                $nominalsabililah += $row->dana_disalurkan;
            }
            if ($row->penerimaan->mustahik->kriteria == 'musafir') {
                $musafir = $musafir + 1;
                $nominalmusafir += $row->dana_disalurkan;
            }
            if($row->id_penerimaan == $row->id_penerimaan)
            {
                $saldo_akhir += $row->dana_disalurkan;
            }
        }

        $nominalfitrah = 0;
        $nominalmal = 0;
        $nominalinfak = 0;
        $nominalsedekah = 0;
        $nominalfidyah = 0;
        $nominalwakaf = 0;
        foreach($data as $row)
        {
            $total_penerimaan2 = $fakir + $miskin + $mualaf + $riqab + $gharimin + $sabilillah + $musafir;
            $saldo_awal += $row->jumlah_pembayaran;

            if ($row->jenis == 'zakat fitrah') {
                $nominalfitrah += $row->jumlah_pembayaran;
            }
            if ($row->jenis == 'zakat mal') {
                $nominalmal += $row->jumlah_pembayaran;
            }
            if ($row->jenis == 'infak') {
                $nominalinfak += $row->jumlah_pembayaran;
            }
            if ($row->jenis == 'sedekah') {
                $nominalsedekah += $row->jumlah_pembayaran;
            }
            if ($row->jenis == 'fidyah') {
                $nominalfidyah += $row->jumlah_pembayaran;
            }
            if ($row->jenis == 'wakaf') {
                $nominalwakaf += $row->jumlah_pembayaran;
            }
        }

        $saldo_akhir_final = $saldo_awal - $saldo_akhir;

        $fpdf->setX(30);
        $fpdf->Cell(10, 25, '1' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 25, 'Zakat Mal', 1, 0, 'C');
        $fpdf->Cell(50, 25, $mal, 1, 0, 'C');
        $fpdf->Cell(50, 25, $nominalmal, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '2' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Zakat Fitrah', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $fitrah, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalfitrah, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '3' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Infaq', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $infak, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalinfak, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '4' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Sedekah', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $sedekah, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalsedekah, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '5' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Fidyah', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $fidyah, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalfidyah, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '6' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Wakaf', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $wakaf, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalwakaf, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(60, 10, 'Jumlah Penerimaan', 1, 0, 'C');
        $fpdf->Cell(100, 10, $total_penerimaan, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(60, 10, 'Jumlah Dana Diterima', 1, 0, 'C');
        $fpdf->Cell(100, 10, $saldo_awal, 1, 1, 'C');


        // Membuat tabel 2
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->setY(290);
        $fpdf->setX(30);
        $fpdf->Cell(10, 6, 'NO.', 1, 0, 'C');
        $fpdf->Cell(50, 6, 'Keterangan', 1, 0, 'C');
        $fpdf->Cell(50, 6, 'Total', 1, 0, 'C');
        $fpdf->Cell(50, 6, 'Nominal Disalurkan', 1, 0, 'C');
        $fpdf->SetFont('Arial', '', 10);

        $fpdf->setX(30);
        $fpdf->Cell(10, 25, '1' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 25, 'Fakir', 1, 0, 'C');
        $fpdf->Cell(50, 25, $fakir, 1, 0, 'C');
        $fpdf->Cell(50, 25, $nominalfakir, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '2' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Miskin', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $miskin, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalmiskin, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '3' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Mualaf', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $mualaf, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalmuafal, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '4' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Riqab', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $riqab, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalriqab, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '5' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Gharimin', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $gharimin, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalgharimin, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '6' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Sabilillah', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $sabilillah, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalsabililah, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '7' . '.', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, 'Musafir', 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $musafir, 1, 0, 'C');
        $fpdf->Cell(50, 20.5, $nominalmusafir, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(60, 10, 'Jumlah Penyaluran', 1, 0, 'C');
        $fpdf->Cell(100, 10, $total_penerimaan2, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(60, 10, 'Jumlah Penyaluran Dana', 1, 0, 'C');
        $fpdf->Cell(100, 10, $saldo_awal - $saldo_akhir_final, 1, 1, 'C');

        $fpdf->Text(60, 190, "Total Dana Akhir");
        $fpdf->Text(130, 190, $saldo_akhir_final);

        $fpdf->SetTitle('Laporan Dana ZIS');
        $this->fpdf->Output();
        exit;
    }
}
