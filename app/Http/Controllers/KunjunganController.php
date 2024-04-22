<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Kelas;
use Illuminate\Support\Carbon;


class KunjunganController 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kunjungan(Request $request)
    {
        $kunjungans = Kunjungan::orderBy('id', 'asc')
                     ->paginate(10);

        $kelas = Kelas::all();

        return view('back.admin.data.kunjungan.index', compact('kunjungans', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addKunjungan()
    {
        $kelas = Kelas::all();

        return view('back.admin.data.kunjungan.add', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKunjungan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required|exists:kelas,id',
            'tanggal' => 'required|date',
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal)->toDateString();
        $kunjungans = Kunjungan::create([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->kelas,
            'tanggal' => $tanggal
        ]);
        

        session()->flash('success', "Sukses tambah data kunjungan");
        return redirect()->route('kunjungan');
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
    public function editKunjungan($id)
    {
        $kelas = Kelas::all();
        $kunjungans = Kunjungan::findOrFail($id);
        return view('back.admin.data.kunjungan.edit', compact('kunjungans', 'kelas'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateKunjungan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required|exists:kelas,id',
            'tanggal' => 'required|date',
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal)->toDateString();
        $kunjungans = Kunjungan::findOrFail($id)->update([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->kelas,
            'tanggal' => $tanggal
        ]);
        

        session()->flash('success', "Sukses edit data kunjungan");
        return redirect()->route('kunjungan');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteKunjungan($id)
    {
        $kunjungans = Kunjungan::findOrFail($id);
        $kunjungans->delete();

        session()->flash('success', 'Sukses Menghapus Data');
        return redirect()->back();
    }

    public function resetKunjungan(): Response|RedirectResponse
    {

        $kunjungans = Kunjungan::all();


        foreach ($kunjungans as $kunjungan) {
            $kunjungan->delete();
        }

        Alert::success('Sukses', 'Berhasil Menghapus Semua Data Kunjungan');
        return redirect()->route('kunjungan');
    }

}