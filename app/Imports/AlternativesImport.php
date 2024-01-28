<?php

namespace App\Imports;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Jenis;
use App\Models\Wisata;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Str;

class AlternativesImport implements ToModel, WithHeadingRow, WithValidation, WithChunkReading
{
    public function model(array $row)
    {
        // jenis
        $jenisName = $row['jenis_name'];
        $jenis     = Jenis::where('jenis_name', $jenisName)->first();
        // wisata
        $wisataName = $row['nama_wisata'];
        $wisata     = Wisata::where('name', $wisataName)->first();
        $criteriaColumns = [];
        $alternativeValues = [];
        foreach ($row as $columnName => $columnValue) {
            if ($columnName !== 'nama_wisata' && $columnName !== 'jenis_name') {
                $criteriaColumns[] = $columnName;
                $alternativeValues[] = $columnValue;
            }
        }
        // Hapus semua alternatif terkait wisata dan jenis saat ini
        Alternative::where('wisata_id', $wisata->id)->where('jenis_id', $jenis->id)->delete();
        // Iterasi pada array kolom criteria dan alternative_value
        for ($i = 0; $i < count($criteriaColumns); $i++) {
            $columnName = $criteriaColumns[$i];
            $columnValue = $alternativeValues[$i];
            // Convert columnName to slug format
            $criteriaName = Str::slug($columnName, '-');
            // Find the criteria based on the criteria slug
            $criteria = Criteria::where('slug', $criteriaName)->first();
            if ($criteria) {
                // Create the new alternative based on wisata, jenis, criteria, and alternative_value
                $alternative = new Alternative();
                $alternative->wisata_id = $wisata ? $wisata->id : null;
                $alternative->jenis_id = $jenis ? $jenis->id : null;
                $alternative->criteria_id = $criteria->id;
                $alternative->alternative_value = $columnValue;
                $alternative->save();
            }
        }
        return null;
    }

    public function rules(): array
    {
        return [
            'nama_wisata' => ['required'],
            'jenis_name'  => ['required'],
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}