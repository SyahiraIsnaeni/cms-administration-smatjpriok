<?php

namespace App\Services;

interface PerpustakaanService
{

    public function getKunjungan();

    public function deleteKunjungan($kunjunganId);

    public function addKunjungan(array $data);

    public function editKunjungan($id, array $data);

    public function getPeminjaman();

    public function addPeminjaman(array $data);

    public function editPeminjaman($id, array $data);

    public function deletePeminjaman($id);

    public function dikembalikan($id);


}
