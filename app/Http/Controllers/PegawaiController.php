<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Muzakki;
use App\Models\Mustahik;
use App\Models\User;
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
}
