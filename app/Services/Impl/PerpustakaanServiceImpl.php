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

    public function addPeminjaman(array $data)
    {
        $peminjaman = new Peminjaman();
        $peminjaman->nama = $data['nama'];
        $peminjaman->kelas_id = $data['kelas_id'];
        $peminjaman->judul_buku = $data['judul_buku'];
        $peminjaman->status = "dipinjam";
        $peminjaman->tanggal_pinjam = Carbon::now('Asia/Jakarta');
        $peminjaman->tanggal_kembali = null;

        $peminjaman->save();

        return $peminjaman;
    }

    public function editPeminjaman($id, array $data)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->nama = $data['nama'];
        $peminjaman->kelas_id = $data['kelas_id'];
        $peminjaman->judul_buku = $data['judul_buku'];

        $peminjaman->save();

        return $peminjaman;
    }

    public function deletePeminjaman($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return $peminjaman->delete();
    }

    public function dikembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = "dikembalikan";
        $peminjaman->tanggal_kembali = Carbon::now('Asia/Jakarta');
        $peminjaman->save();
        return $peminjaman;
    }

}
