<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use App\Services\JadwalService;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\MataPelajaran;
use App\Models\Day;
use App\Models\Kelas;

class JadwalController 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jadwal(Request $request)
    {
        $jadwals = Jadwal::orderBy('day_id', 'asc')
                     ->orderBy('start_time', 'asc')
                     ->paginate(10);

        $days = Day::all();

        $kelas = Kelas::all();

        return view('back.admin.data.jadwal.index', compact('jadwals', 'days', 'request', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addJadwal()
    {
        $mapels = MataPelajaran::all();
        $days = Day::all();
        $kelas = Kelas::all();

        return view('back.admin.data.jadwal.add', compact('mapels', 'days', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeJadwal(Request $request)
{
    // Validasi tambahan untuk memastikan jadwal tidak tumpang tindih
    $validator = Validator::make($request->all(), [
        'mapel' => 'required|exists:mapel,id',
        'day' => 'required|exists:days,id',
        'kelas' => 'required|exists:kelas,id',
        'start_time' => 'required|date_format:H:i', // Format: Jam:Menit (24-jam)
        'end_time' => 'required|date_format:H:i|after:start_time', // Format: Jam:Menit (24-jam) dan setelah start_time
        // Validasi tambahan untuk memeriksa tumpang tindih dengan jadwal yang sudah ada
        'start_time' => [
            'required',
            function ($attribute, $value, $fail) use ($request) {
                $existingJadwals = Jadwal::where('day_id', $request->day)
                    ->where(function ($query) use ($request) {
                        $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                            ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
                    })
                    ->exists();

                if ($existingJadwals) {
                    $fail('Jadwal ini bertabrakan dengan jadwal yang sudah ada.');
                }
            }
        ],
        'end_time' => 'required|after:start_time',
    ]);

    // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    
    // Buat jadwal baru jika validasi berhasil
    $jadwals = Jadwal::create([
        'mapel_id' => $request->mapel,
        'day_id' => $request->day,
        'kelas_id' => $request->kelas,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time
    ]);
    
    // Tampilkan pesan sukses dan redirect ke halaman jadwal pelajaran
    session()->flash('success', "Sukses tambah jadwal pelajaran $request->nama");
    return redirect()->route('jadwal');
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
        $kelas = Kelas::all();
        $jadwals = Jadwal::findOrFail($id);
        return view('back.admin.data.jadwal.edit', compact('jadwals', 'days','mapels', 'kelas'));
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
        'kelas' => 'required|exists:kelas,id',
        'start_time' => 'required|date_format:H:i', // Format: Jam:Menit (24-jam)
        'end_time' => 'required|date_format:H:i|after:start_time', // Format: Jam:Menit (24-jam) dan setelah start_time
        // Validasi tambahan untuk memeriksa tumpang tindih dengan jadwal yang sudah ada
        'start_time' => [
            'required',
            function ($attribute, $value, $fail) use ($request) {
                $existingJadwals = Jadwal::where('day_id', $request->day)
                    ->where(function ($query) use ($request) {
                        $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                            ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
                    })
                    ->exists();

                if ($existingJadwals) {
                    $fail('Jadwal ini bertabrakan dengan jadwal yang sudah ada.');
                }
            }
        ],
        'end_time' => 'required|after:start_time',
    ]);

    // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    
    // Buat jadwal baru jika validasi berhasil
    $jadwals = Jadwal::findOrFail($id)->update([
        'mapel_id' => $request->mapel,
        'day_id' => $request->day,
        'kelas_id' => $request->kelas,
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
