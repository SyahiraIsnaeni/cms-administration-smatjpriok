<?php

namespace App\Services\Impl;

use App\Models\Buku;
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

    public function addKunjungan(array $data)
    {
        $kunjungan = new Kunjungan();
        $kunjungan->tanggal = Carbon::now('Asia/Jakarta');

        $kunjungan->nama = $data['nama'];

        $kunjungan->save();
    }

    public function editKunjungan($id, array $data)
    {
        $kunjungan = Kunjungan::findOrFail($id);

        $kunjungan->nama = $data['nama'];

        $kunjungan->save();

        return $kunjungan;
    }

    public function getPeminjaman()
    {
        return Peminjaman::orderBy('created_at', 'desc')->paginate(20);
    }

    public function addPeminjaman(array $data)
    {
        $buku = Buku::find($data['buku_id']);

        if (!$buku) {
            throw new \Exception('Buku tidak ditemukan');
        }

        if ($buku->jumlah < $data['jumlah']) {
            throw new \Exception('Jumlah buku yang tersedia tidak cukup');
        }

        $buku->jumlah -= $data['jumlah'];
        $buku->save();

        $peminjaman = new Peminjaman();
        $peminjaman->nama = $data['nama'];
        $peminjaman->kelas = $data['kelas'];
        $peminjaman->telepon = $data['telepon'];
        $peminjaman->jumlah = $data['jumlah'];
        $peminjaman->buku_id = $data['buku_id'];
        $peminjaman->tanggal_dikembalikan = null;

        $peminjaman->save();

        return $peminjaman;
    }

    public function editPeminjaman($id, $buku_id, array $data)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $bukuLama = Buku::find($peminjaman->buku_id);
        if ($bukuLama) {
            $bukuLama->jumlah += $peminjaman->jumlah;
            $bukuLama->save();
        }

        $bukuBaru = Buku::find($buku_id);

        if (!$bukuBaru) {
            throw new \Exception('Buku tidak ditemukan');
        }

        if ($bukuBaru->jumlah < $data['jumlah']) {
            throw new \Exception('Jumlah buku yang tersedia tidak cukup');
        }

        $bukuBaru->jumlah -= $data['jumlah'];
        $bukuBaru->save();

        $peminjaman->nama = $data['nama'];
        $peminjaman->kelas = $data['kelas'];
        $peminjaman->telepon = $data['telepon'];
        $peminjaman->jumlah = $data['jumlah'];
        $peminjaman->buku_id = $bukuBaru->id;

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

        $peminjaman->status = 1;
        $peminjaman->tanggal_kembali = Carbon::now('Asia/Jakarta');
        $peminjaman->save();

        $buku = Buku::find($peminjaman->buku_id);

        if ($buku) {
            $buku->jumlah += $peminjaman->jumlah;
            $buku->save();
        }

        return $peminjaman;
    }

    public function addBuku(array $data)
    {
        $buku = new Buku();
        $buku->judul = $data['judul'];
        $buku->penerbit = $data['penerbit'];
        $buku->jumlah = $data['jumlah'];

        $buku->save();

        return $buku;
    }

    public function getBuku()
    {
        return Buku::orderBy('created_at', 'desc')->paginate(20);
    }

    public function editBuku($id, array $data)
    {
        $buku = Buku::findOrFail($id);

        $buku->judul = $data['judul'];
        $buku->penerbit = $data['penerbit'];
        $buku->jumlah = $data['jumlah'];

        $buku->save();

        return $buku;
    }

    public function deleteBuku($id)
    {
        $buku = Buku::findOrFail($id);
        return $buku->delete();
    }

    public function searchBuku($judul)
    {
        return Buku::where('judul', 'like', '%' . $judul . '%')->get();
    }
}
