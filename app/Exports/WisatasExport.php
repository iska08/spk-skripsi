<?php

namespace App\Exports;

use App\Models\Wisata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WisatasExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Wisata::select('nama_wisata', 'lokasi_maps', 'fasilitas', 'biaya')
            ->leftJoin('jenis', 'wisatas.jenis_id', '=', 'jenis.id')
            ->selectRaw('wisatas.nama_wisata, wisatas.lokasi_maps, wisatas.fasilitas, wisatas.biaya, jenis.jenis_name')
            ->orderBy('jenis.jenis_name')
            ->orderBy('wisatas.nama_wisata')
            ->get();
    }

    public function headings(): array
    {
        return [
            'nama_wisata',
            'jenis_name',
            'lokasi_maps',
            'fasilitas',
            'biaya',
        ];
    }
}