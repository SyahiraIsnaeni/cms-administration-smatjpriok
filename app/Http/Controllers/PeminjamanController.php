<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Kelas;
use Illuminate\Support\Carbon;


class PeminjamanController 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function peminjaman(Request $request)
    {
        $peminjamans = Peminjaman::orderBy('id', 'asc')
                     ->paginate(10);

        $kelas = Kelas::all();

        return view('back.admin.data.peminjaman.index', compact('peminjamans', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPeminjaman()
    {
        $kelas = Kelas::all();

        return view('back.admin.data.peminjaman.add', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePeminjaman(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required|exists:kelas,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $tanggal_pinjam = Carbon::createFromFormat('Y-m-d', $request->tanggal_pinjam)->toDateString();
        $tanggal_kembali = Carbon::createFromFormat('Y-m-d', $request->tanggal_kembali)->toDateString();
        $peminjamans = Peminjaman::create([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->kelas,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali
        ]);
        

        session()->flash('success', "Sukses tambah data peminjaman");
        return redirect()->route('peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPeminjaman($id)
    {
        $kelas = Kelas::all();
        $peminjamans = Peminjaman::findOrFail($id);
        return view('back.admin.data.peminjaman.edit', compact('peminjamans', 'kelas'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePeminjaman(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required|exists:kelas,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $tanggal_pinjam = Carbon::createFromFormat('Y-m-d', $request->tanggal_pinjam)->toDateString();
        $tanggal_kembali = Carbon::createFromFormat('Y-m-d', $request->tanggal_kembali)->toDateString();
        $peminjamans = Peminjaman::findOrFail($id)->update([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->kelas,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali
        ]);
        

        session()->flash('success', "Sukses edit data peminjaman");
        return redirect()->route('peminjaman');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePeminjaman($id)
    {
        $peminjamans = Peminjaman::findOrFail($id);
        $peminjamans->delete();

        session()->flash('success', 'Sukses Menghapus Data');
        return redirect()->back();
    }

    public function resetPeminjaman(): Response|RedirectResponse
    {

        $peminjamans = Peminjaman::all();


        foreach ($peminjamans as $peminjaman) {
            $peminjaman->delete();
        }

        Alert::success('Sukses', 'Berhasil Menghapus Semua Data Peminjaman');
        return redirect()->route('peminjaman');
    }

}