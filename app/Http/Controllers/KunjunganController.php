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
        $kunjungans = Kunjungan::orderBy('siswa_id', 'asc')
                     ->orderBy('start_time', 'asc')
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
        $kunjungan = Kunjungan::create([
            'siswa_id' => $request->siswa_id, // Sesuaikan dengan nama kolom yang benar
            'tanggal' => $tanggal
        ]);
        
        // Tampilkan pesan sukses dan redirect ke halaman jadwal pelajaran
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
    public function editJadwal($id)
    {
        $mapels = MataPelajaran::all();
        $days = Day::all();
        $gurus = Guru::all();
        $jadwals = Jadwal::findOrFail($id);
        return view('back.admin.data.jadwal.edit', compact('jadwals', 'days','mapels', 'gurus'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateJadwal(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
        'mapel' => 'required|exists:mapel,id',
        'day' => 'required|exists:days,id',
        'guru' => 'required|exists:gurus,id',
        'start_time' => 'required|date_format:H:i', // Format: Jam:Menit (24-jam)
        'end_time' => 'required|date_format:H:i|after:start_time', // Format: Jam:Menit (24-jam) dan setelah start_time
        // Validasi tambahan untuk memeriksa tumpang tindih dengan jadwal yang sudah ada
    ]);

    // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    
    // Buat jadwal baru jika validasi berhasil
    $jadwals = Jadwal::findOrFail($id)->update([
        'mapel_id' => $request->mapel,
        'day_id' => $request->day,
        'guru_id' => $request->guru,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time
    ]);
    
    // Tampilkan pesan sukses dan redirect ke halaman jadwal pelajaran
    session()->flash('success', "Sukses tambah jadwal pelajaran $request->nama");
    return redirect()->route('jadwal');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        session()->flash('success', 'Sukses Menghapus Data');
        return redirect()->back();
    }

    public function resetJadwal(): Response|RedirectResponse
    {
        // Mendapatkan semua data jadwal
        $jadwals = Jadwal::all();

        // Menghapus semua data jadwal
        foreach ($jadwals as $jadwal) {
            $jadwal->delete();
        }

        Alert::success('Sukses', 'Berhasil Menghapus Semua Data Jadwal');
        return redirect()->route('jadwal');
    }

}