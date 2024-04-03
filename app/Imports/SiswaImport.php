<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    protected $kelasId;

    public function __construct(int $kelasId)
    {
        $this->kelasId = $kelasId;
    }

    public function model(array $row)
    {
        return new Siswa([
            'kelas_id' => $this->kelasId,
            'nama' => $row['nama'],
            'nis' => $row['nis'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'email' => $row['email'],
            'password' => Hash::make($row['nis']),
        ]);
    }

    public function filter($row)
    {
        return $row['kelas_id'] == $this->kelasId;
    }
}
