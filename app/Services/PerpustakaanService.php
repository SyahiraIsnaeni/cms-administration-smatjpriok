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

    public function addPeminjaman(array $data);

    public function editPeminjaman($id, array $data);

    public function deletePeminjaman($id);

    public function dikembalikan($id);


}
