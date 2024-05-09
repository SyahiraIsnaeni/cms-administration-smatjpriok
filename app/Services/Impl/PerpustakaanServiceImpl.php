<?php

namespace App\Services\Impl;

use App\Models\Guru;
use App\Models\Kunjungan;
use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Services\PerpustakaanService;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class PerpustakaanServiceImpl implements PerpustakaanService
{

    public function getKunjungan(): LengthAwarePaginator
    {
        return Kunjungan::orderBy('created_at', 'desc')->paginate(20);
    }

    public function deleteKunjungan($kunjunganId)
    {
        $kunjungan = Kunjungan::findOrFail($kunjunganId);
        return $kunjungan->delete();
    }

    public function searchSiswaOrGuru($name)
    {
        $siswa = Siswa::where('nama', 'like', "%{$name}%")->get();

        if ($siswa->isNotEmpty()) {
            return $siswa;
        }

        $guru = Guru::where('nama', 'like', "%{$name}%")->get();

        if ($guru->isNotEmpty()) {
            return $guru;
        }

        return null;
    }

    public function addKunjunganGuru($id)
    {
        $kunjungan = new Kunjungan();
        $kunjungan->tanggal = Carbon::now('Asia/Jakarta');

        $guru = Guru::find($id);
        $kunjungan->guru_id = $id;

        $kunjungan->save();
    }

    public function addKunjunganSiswa($id)
    {
        $kunjungan = new Kunjungan();
        $kunjungan->tanggal = Carbon::now('Asia/Jakarta');

        $siswa = Siswa::find($id);
        $kunjungan->siswa_id = $id;

        $kunjungan->save();
    }

    public function getPeminjaman()
    {
        return Peminjaman::orderBy('created_at', 'desc')->paginate(20);
    }

    public function addPeminjaman()
    {
        // TODO: Implement addPeminjaman() method.
    }

    public function editPeminjaman()
    {
        // TODO: Implement editPeminjaman() method.
    }

    public function deletePeminjaman()
    {
        // TODO: Implement deletePeminjaman() method.
    }
}
