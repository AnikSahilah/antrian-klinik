<?php

namespace App\Exports;

use App\Models\Antrian_Pasien_Models as AntrianPasien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class PemeriksaanExport implements FromCollection, WithHeadings, WithMapping
{
    protected $dari;
    protected $sampai;
    protected $sesi;

    public function __construct($dari, $sampai, $sesi)
    {
        $this->dari = $dari;
        $this->sampai = $sampai;
        $this->sesi = $sesi;
    }

    public function collection()
    {
        $query = AntrianPasien::with('jadwal')
            ->whereHas('jadwal', function ($q) {
                $q->whereBetween('tanggal', [$this->dari, $this->sampai]);
            });

        if ($this->sesi !== 'semua') {
            $query->where('sesi', $this->sesi);
        }

        return $query->orderBy('sesi')->orderByRaw('CAST(nomor_antrian AS UNSIGNED)')->get();
    }

    public function map($row): array
    {
        return [
            $row->nomor_antrian,
            $row->nama,
            $row->keluhan,
            $row->jadwal->tanggal ?? '-',
            $row->sesi,
            $row->status,
            $row->hasil_pemeriksaan ?? '-',
            $row->resep_obat ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'Nomor Antrian',
            'Nama Pasien',
            'Keluhan',
            'Tanggal Periksa',
            'Sesi',
            'Status',
            'Hasil Pemeriksaan',
            'Resep Obat',
        ];
    }
}
