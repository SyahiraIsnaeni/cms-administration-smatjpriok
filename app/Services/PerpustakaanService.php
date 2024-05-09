<?php

namespace App\Services;

interface PerpustakaanService
{

    public function getKunjungan();

    public function deleteKunjungan($kunjunganId);

    public function searchSiswaOrGuru($name);

    public function addKunjunganGuru($id);

    public function addKunjunganSiswa($id);

    public function getPeminjaman();

    public function addPeminjaman();

    public function editPeminjaman();

    public function deletePeminjaman();

}
