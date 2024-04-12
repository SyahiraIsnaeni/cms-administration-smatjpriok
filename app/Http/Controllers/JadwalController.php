<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Day;

class JadwalController
{
    public function jadwal(Request $request)
    {
        $search = $request->get('search');
        $jadwals = Jadwal::whereHas('mapel', function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%");
            })
            ->orderBy('day_id', 'asc')
            ->orderBy('start_time', 'asc')
            ->paginate(10);

        $jadwals->appends(['search' => $search]);

        $days = Day::all();

        return view('back.admin.data.jadwal.index', compact('jadwals', 'days'));
    }

    public function addJadwal()
    {
        $days = Day::all();
        return view('back.admin.data.jadwal.add', compact('days'));
    }

    public function storeJadwal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mapel' => 'required|exists:mapels,id',
            'day' => 'required|exists:days,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Jadwal::create([
            'mapel_id' => $request->mapel,
            'day_id' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ]);

        session()->flash('success', 'Sukses tambah jadwal pelajaran');
        return redirect()->route('back.admin.data.jadwal.index');
    }

    public function editJadwal($id)
    {
        $days = Day::all();
        $jadwals = Jadwal::findOrFail($id);
        return view('back.admin.data.jadwal.edit', compact('jadwals', 'days'));
    }

    public function updateJadwal(Request $request, $id)
    {
        $request->validate([
            'mapel' => 'required|exists:mapels,id',
            'day' => 'required|exists:days,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Jadwal::findOrFail($id)->update([
            'mapel_id' => $request->mapel,
            'day_id' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ]);

        session()->flash('success', 'Sukses ubah jadwal pelajaran');
        return redirect()->route('back.admin.data.jadwal.index');
    }

    public function deleteJadwal($id)
    {
        Jadwal::findOrFail($id)->delete();

        session()->flash('success', 'Sukses menghapus data');
        return redirect()->route('back.admin.data.jadwal.index');
    }
}
