<?php

namespace App\Exports;

use App\Models\Alternative;
use App\Models\Wisata;
use App\Models\Criteria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AlternativesExport implements FromCollection, ShouldAutoSize
{
    public function collection()
    {
        // Dapatkan ID kriteria yang unik dari alternatif
        $criteriaIds = Alternative::distinct()->pluck('criteria_id');
        // Ambil slug kriteria berdasarkan ID-nya
        $criteriaSlug = Criteria::whereIn('id', $criteriaIds)->pluck('slug')->toArray();
        // Tambahkan 'nama_wisata' dan 'jenis_name' di awal slug kriteria
        array_unshift($criteriaSlug, 'nama_wisata', 'jenis_name');
        // Dapatkan ID wisata dari alternatif
        $usedIds = Alternative::distinct()->pluck('wisata_id');
        // Ambil data wisata beserta alternatif dan jenis terkait
        $wisatas = Wisata::whereIn('id', $usedIds)->with(['alternatives' => function ($query) use ($criteriaIds) {
            $query->whereIn('criteria_id', $criteriaIds)->orderBy('criteria_id');
        },
        'jenis'])->orderBy('jenis_id')->orderBy('name')->get();
        // Buat koleksi untuk menyimpan data yang diformat
        $collection = collect([$criteriaSlug]);
        // Iterasi setiap wisata
        foreach ($wisatas as $wisata) {
            // Ambil alternatif untuk wisata tersebut
            $alternatives = $wisata->alternatives;
            // Buat array untuk menyimpan nilai baris untuk wisata tersebut
            $rowValues = [$wisata->name, $wisata->jenis->jenis_name];
            // Iterasi setiap ID kriteria
            foreach ($criteriaIds as $criteriaId) {
                // Cari alternatif dengan ID kriteria yang sesuai
                $alternative = $alternatives->firstWhere('criteria_id', $criteriaId);
                // Ambil nilai alternatif untuk kriteria tersebut
                $alternativeValue = $alternative ? $alternative->alternative_value : 'kosong';
                // Tambahkan nilai alternatif ke dalam nilai baris
                $rowValues[] = $alternativeValue;
            }
            // Tambahkan nilai baris ke dalam koleksi
            $collection->push($rowValues);
        }
        return $collection;
    }
}