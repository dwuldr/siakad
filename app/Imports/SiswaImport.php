<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row[1],
            'nama_siswa' => $row[2],
            'idKelas' => $row[3],
            'alamat' => $row[4],
            'jk' => $row[5],
            'tmp_lahir' => $row[6],
            'tgl_lahir' => $row[7],
            'telp' => $row[8],
            'nama_ortu' => $row[9],
            'status_2' => $row[10],
        ]);
    }
}
