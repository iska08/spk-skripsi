<?php

namespace App\Imports;

use App\Models\Jenis;
use App\Models\Wisata;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WisatasImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, WithChunkReading
{
    use Importable, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $jenisName = $row['jenis_name'];
        $jenis     = Jenis::where('jenis_name', $jenisName)->first();
        return new Wisata([
            'nama_wisata' => $row['nama_wisata'],
            'lokasi_maps' => $row['lokasi_maps'],
            'fasilitas'   => $row['fasilitas'],
            'biaya'       => $row['biaya'],
            'jenis_id'    => $jenis ? $jenis->id : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_wisata' => ['required'],
            'lokasi_maps' => ['required'],
            'fasilitas'   => ['required'],
            'biaya'       => ['required'],
            'jenis_name'  => ['required'],
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}