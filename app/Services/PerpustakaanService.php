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

    public function editPeminjaman($id, $buku_id, array $data);

    public function deletePeminjaman($id);

    public function dikembalikan($id);

    public function addBuku(array $data);

    public function getBuku();

    public function editBuku($id, array $data);

    public function deleteBuku($id);

    public function searchBuku($judul);

}
