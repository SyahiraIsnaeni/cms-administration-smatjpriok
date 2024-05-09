<?php

namespace App\Services;

interface JadwalService
{
    public function get();

    public function getDay();

    public function add(array $data);

    public function delete($id);

    public function deleteAll();

    public function getJadwalKelas($kelasId);

    public function getJadwalGuru($guruId);

}
