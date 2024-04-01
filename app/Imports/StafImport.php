<?php

namespace App\Imports;

use App\Models\Staf;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StafImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Staf([
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'jabatan' => $row['jabatan'],
            'email' => $row['email'],
            'password' => Hash::make($row['nip']),
        ]);
    }
}
