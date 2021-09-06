<?php

namespace App\Http\Controllers;

use App\Models\Bank;
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
        $data['data'] = Penerimaan::with('bank', 'user', 'muzakki', 'mustahik')->get();
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
        $penerimaanM->id_bank = $data['id_bank'];
        $penerimaanM->id_user = $data['id_user'];
        $penerimaanM->jenis = $data['jenis'];
        $penerimaanM->bayar_jiwa = $data['bayar_jiwa'];
        $penerimaanM->cara_pembayaran = $data['cara_pembayaran'];
        $penerimaanM->bentuk_pembayaran = $data['bentuk_pembayaran'];
        $penerimaanM->jumlah_pembayaran = $data['jumlah_pembayaran'];
        $penerimaanM->save();

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
        $penerimaanM->id_muzakki = $data['id_muzakki'];
        $penerimaanM->id_bank = $data['id_bank'];
        $penerimaanM->id_user = $data['id_user'];
        $penerimaanM->jenis = $data['jenis'];
        $penerimaanM->cara_pembayaran = $data['cara_pembayaran'];
        $penerimaanM->bentuk_pembayaran = $data['bentuk_pembayaran'];
        $penerimaanM->jumlah_pembayaran = $data['jumlah_pembayaran'];
        $penerimaanM->save();

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function printPenerimaanDana()
    {
        $data = Penerimaan::with('bank', 'user', 'muzakki', 'mustahik')->get();

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(85, 15, "Data Penerimaan Dana");
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->setX(5);
        $fpdf->Cell(10, 6, 'NO.', 1, 0, 'C');
        $fpdf->Cell(20, 6, 'Jenis', 1, 0, 'C');
        $fpdf->Cell(20, 6, 'Jumlah Jiwa', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'No.Rek Pendonasi', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Bentuk Pembayaran', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Jumlah Pembayaran', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Tgl Pembayaran', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Amil Penerima', 1, 0, 'C');

        $i=1;
        foreach($data as $row){
            $fpdf->setX(5);
            $fpdf->Cell(10,20.5, $i.'.',1,0,'C');
            $fpdf->Cell(20,20.5, $row->jenis,1,0, 'C');
            $fpdf->Cell(20,20.5, $row->bayar_jiwa,1,0 ,'C');
            $fpdf->Cell(30,20.5, $row->bank->no_rek,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->bentuk_pembayaran,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->jumlah_pembayaran,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->created_at,1,0, 'C');
            $fpdf->Cell(30,20.5, $row->user->name,1,1,'C');
            $i++;
        }

        $fpdf->SetTitle('Penerimaan Dana ZIS');
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
        $data = Penyaluran::with('penerimaan', 'penerimaan.mustahik', 'penerimaan.bank')->get();

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(85, 15, "Data Penyaluran Dana");
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->setX(5);
        $fpdf->Cell(10, 6, 'NO.', 1, 0, 'C');
        $fpdf->Cell(20, 6, 'Jenis', 1, 0, 'C');
        $fpdf->Cell(20, 6, 'Jumlah', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Nama Mustahik', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Kriteria Mustahik', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Id Mustahik', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Alamat', 1, 0, 'C');
        $fpdf->Cell(30, 6, 'Tanggal Penyaluran', 1, 0, 'C');

        $i=1;
        foreach($data as $row){
            $fpdf->setX(5);
            $fpdf->Cell(10,20.5, $i.'.',1,0,'C');
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
        $data2 = Penyaluran::with('penerimaan', 'penerimaan.mustahik', 'penerimaan.bank')->get();

        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        // Membuat tabel
        $fpdf->Cell(10, 17, '', 0, 1);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Text(73, 15, "LAPORAN DANA PERUBAHAN ZIS");
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->setX(30);
        $fpdf->Cell(10, 6, 'NO.', 1, 0, 'C');
        $fpdf->Cell(69, 6, 'Keterangan', 1, 0, 'C');
        $fpdf->Cell(60, 6, 'Total', 1, 0, 'C');
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

        $fpdf->setX(30);
        $fpdf->Cell(10, 25, '1' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 25, 'Zakat Mal', 1, 0, 'C');
        $fpdf->Cell(60, 25, $mal, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '2' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Zakat Fitrah', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $fitrah, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '3' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Infaq', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $infak, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '4' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Sedekah', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $sedekah, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '5' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Fidyah', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $fidyah, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '6' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Wakaf', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $wakaf, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(79, 10, 'Jumlah Penerimaan', 1, 0, 'C');
        $fpdf->Cell(60, 10, $total_penerimaan, 1, 1, 'C');


        // Membuat tabel 2
        $fpdf->setY(280);
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->setX(30);
        $fpdf->Cell(10, 6, 'NO.', 1, 0, 'C');
        $fpdf->Cell(69, 6, 'Keterangan', 1, 0, 'C');
        $fpdf->Cell(60, 6, 'Total', 1, 0, 'C');
        $fpdf->SetFont('Arial', '', 10);

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
        foreach ($data2 as $row) {
            if ($row->penerimaan->mustahik->kriteria == 'fakir') {
                $fakir = $fakir + 1;
            }
            if ($row->penerimaan->mustahik->kriteria == 'miskin') {
                $miskin = $miskin + 1;
            }
            if ($row->penerimaan->mustahik->kriteria == 'mualaf') {
                $mualaf = $mualaf + 1;
            }
            if ($row->penerimaan->mustahik->kriteria == 'riqab') {
                $riqab = $riqab + 1;
            }
            if ($row->penerimaan->mustahik->kriteria == 'gharimin') {
                $gharimin = $gharimin + 1;
            }
            if ($row->penerimaan->mustahik->kriteria == 'sabilillah') {
                $sabilillah = $sabilillah + 1;
            }
            if ($row->penerimaan->mustahik->kriteria == 'musafir') {
                $musafir = $musafir + 1;
            }
            if($row->id_penerimaan == $row->id_penerimaan)
            {
                $saldo_akhir += $row->dana_disalurkan;
            }
        }

        foreach($data as $row)
        {
            $total_penerimaan2 = $fakir + $miskin + $mualaf + $riqab + $gharimin + $sabilillah + $musafir;
            $saldo_awal += $row->jumlah_pembayaran;
        }

        $saldo_akhir_final = $saldo_awal - $saldo_akhir;

        $fpdf->setX(30);
        $fpdf->Cell(10, 25, '1' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 25, 'Fakir', 1, 0, 'C');
        $fpdf->Cell(60, 25, $fakir, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '2' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Miskin', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $miskin, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '3' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Mualaf', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $mualaf, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '4' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Riqab', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $riqab, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '5' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Gharimin', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $gharimin, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '6' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Sabilillah', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $sabilillah, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->Cell(10, 20.5, '7' . '.', 1, 0, 'C');
        $fpdf->Cell(69, 20.5, 'Musafir', 1, 0, 'C');
        $fpdf->Cell(60, 20.5, $musafir, 1, 1, 'C');
        $fpdf->setX(30);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(79, 10, 'Jumlah Penyaluran', 1, 0, 'C');
        $fpdf->Cell(60, 10, $total_penerimaan2, 1, 1, 'C');
        $fpdf->Text(60, 180, "Saldo Awal");
        $fpdf->Text(130, 180, $saldo_awal);
        $fpdf->Text(60, 185, "Saldo Akhir");
        $fpdf->Text(130, 185, $saldo_akhir_final);

        $fpdf->SetTitle('Laporan Dana ZIS');
        $this->fpdf->Output();
        exit;
    }
}
