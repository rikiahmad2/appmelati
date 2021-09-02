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
        $muzakkiM->email = $data['email'];
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
        $muzakkiM->email = $data['email'];
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

    public function tambahPenerimaanDana (Request $request)
    {
        $data =  $request->all();
        $penerimaanM = new Penerimaan();
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

    public function deletePenerimaanDana($id)
    {
        $penerimaanM = Penerimaan::find($id);
        $penerimaanM->delete();
        return redirect()->back()->with('delete', 'data berhasil di delete');
    }

    public function editPenerimaanDana (Request $request)
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

    public function penyaluranDana(Request $request)
    {
        $data['data'] = Penyaluran::with('penerimaan','penerimaan.mustahik', 'penerimaan.bank')->get();
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
        return $data;
    }

    public function tambahPenyaluranDana(Request $request)
    {
        $penerimaanM = Penerimaan::find($request->id_penerimaan);
        $penerimaanM->id_mustahik = $request->id_mustahik;
        $penerimaanM->save();

        $penyaluranM = new Penyaluran();
        $penyaluranM->id_penerimaan = $request->id_penerimaan;
        if($request->created_at != null){
            $penyaluranM->created_at = $request->created_at;
        }
        $penyaluranM->save();

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function editPenyaluranDana (Request $request)
    {
        $penerimaanM = Penerimaan::find($request->old_penerima);
        $penerimaanM->id_mustahik = null;
        $penerimaanM->save();

        $penerimaanM2 = Penerimaan::find($request->id_penerimaan);
        $penerimaanM2->id_mustahik = $request->id_mustahik;
        $penerimaanM2->save();

        $penyaluranM = Penyaluran::find($request->id_penyaluran);
        $penyaluranM->id_penerimaan = $request->id_penerimaan;
        if($request->created_at != null){
            $penyaluranM->created_at = $request->created_at;
        }
        $penyaluranM->save();

        return redirect()->back()->with('tambah', 'data berhasil di tambah');
    }

    public function deletePenyaluranDana($id)
    {
        $penyaluranM = Penyaluran::find($id);
        $id_penerimaan = $penyaluranM->id_penerimaan;

        $penerimaanM = Penerimaan::find($id_penerimaan);
        $penerimaanM->id_mustahik = null;
        $penerimaanM->save();
        $penyaluranM->delete();
        return redirect()->back()->with('delete', 'data berhasil di delete');
    }

    public function laporanDana()
    {
        $this->fpdf = new Fpdf;
        $fpdf = $this->fpdf;
        header('Content-type: application/pdf');
        $fpdf->AddPage("P", 'A4');

        //HEADER
        $fpdf->SetFont('Arial','B','10');
        $fpdf->Text(10, 15, "Kode Nasabah  :");
        $fpdf->Text(10, 20, "Nama Nasabah  :");
        $fpdf->Text(10, 25, "Kode Pembiayaan  :");
        $fpdf->Text(10, 30, "Sisa Cicilan  :");
        $fpdf->Text(10, 35, "Jumlah Angsuran  :");
        $fpdf->SetFont('Arial','','11');
        $fpdf->setY(11.5);
        $fpdf->setX(45);
        $fpdf->Cell(80,5,'Test Header',0, 1, 'L');
        $fpdf->setY(16.5);
        $fpdf->setX(45);
        $fpdf->Cell(80,5,'Test Header',0, 1, 'L');
        $fpdf->setY(21.5);
        $fpdf->setX(45);
        $fpdf->Cell(80,5,'Test Header',0, 1, 'L');
        $fpdf->setY(26.5);
        $fpdf->setX(45);
        $fpdf->Cell(80,5,'Test Header',0, 1, 'L');
        $fpdf->setY(31.5);
        $fpdf->setX(45);
        $fpdf->Cell(80,5,'Test Header',0, 1, 'L');

         // Membuat tabel
        $fpdf->Cell(10,17,'',0,1);
        $fpdf->SetFont('Arial','B',8);
        $fpdf->setX(30);
        $fpdf->Cell(10,6,'NO.',1,0, 'C');
        $fpdf->Cell(40,6,'Nama Penyetor',1,0, 'C');
        $fpdf->Cell(30,6,'Total Bayar',1,0, 'C');
        $fpdf->Cell(25,6,'Angsuran ke',1,0, 'C');
        $fpdf->Cell(50,6,'Tanggal Bayar',1,1, 'C');
        $fpdf->SetFont('Arial','',10);

        $fpdf->SetTitle('Laporan Pembayaran '.'Test Header');
        $this->fpdf->Output();
        exit;
    }
}
