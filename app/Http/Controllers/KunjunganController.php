<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kunjungan;
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
        $kunjungans = Kunjungan::orderBy('tanggal', 'asc')
                     ->paginate(10);

        $siswas = Siswa::all();

        return view('back.admin.data.kunjungan.index', compact('kunjungans', 'siswas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addKunjungan()
    {
        $siswas = Siswa::all();

        return view('back.admin.data.kunjungan.add', compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKunjungan(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'siswa_id' => 'required|exists:siswas,id', // Sesuaikan dengan nama kolom yang benar
            'tanggal' => 'required|date', // Tambahkan validasi untuk tanggal
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Buat objek Carbon untuk tanggal
        $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal)->toDateString();

        // Buat kunjungan baru jika validasi berhasil
        $kunjungans = Kunjungan::create([
            'siswa_id' => $request->siswa, // Sesuaikan dengan nama kolom yang benar
            'tanggal' => $tanggal
        ]);
        
        session()->flash('success', "Sukses menambahkan kunjungan perpustakaan");
        return redirect()->route('kunjungan'); // Sesuaikan dengan nama rute yang benar
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
        $siswas = Siswa::all();
        $kunjungans = Kunjungan::findOrFail($id);
        return view('back.admin.data.kunjungan.edit', compact('kunjungans', 'siswas'));
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
        'siswa' => 'required|exists:siswas,id',
        'tanggal' => 'required|date',
    ]);

    // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal)->toDateString();
    
    $kunjungans = Kunjungan::findOrFail($id)->update([
        'siswa_id' => $request->siswa,
        'tanggal' => $tanggal,
    ]);
    
    session()->flash('success', "Sukses tambah kunjungan perpustakaan");
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
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->delete();

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