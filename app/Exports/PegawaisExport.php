<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;


class PegawaisExport implements FromArray, WithHeadings, WithDrawings, ShouldAutoSize, WithStyles, WithEvents, WithCustomStartCell
{
    protected $pegawais;

    public function __construct($pegawais)
    {
        $this->pegawais = $pegawais;
    }

    public function headings(): array
    {
        return [
            'no',
            'nip',
            'nama',
            'tempat lahir',
            'tgl lahir',
            'alamat',
            'tempat tugas',
            'npwp',
            'unit kerja',
            'eselon',
            'golongan',
            'agama',
            'jabatan',
            'jenis kelamin',
        ];
    }
    public function array(): array
    {
        $expord_datas = [];
        foreach ($this->pegawais as $i => $p) {
            array_push($expord_datas, [
                'no' => $i + 1,
                'nip' => $p->nip,
                'nama' => $p->nama,
                'tempat lahir' => $p->tempat_lahir,
                'tgl lahir' => $p->tgl_lahir,
                'alamat' => $p->alamat,
                'tempat tugas' => $p->tempat_tugas,
                'npwp' => $p->npwp,
                'unit kerja' => $p->unitKerja->nama,
                'eselon' => $p->eselon->tingkat,
                'golongan' => $p->golongan->tingkat . '/' . $p->golongan->tipe,
                'agama' => $p->agama->nama,
                'jabatan' => $p->jabatan->nama,
                'jenis kelamin' => $p->jenisKelamin->nama,
            ]);
        }
        return $expord_datas;
    }
    public function drawings()
    {
        $drawings = [];
        foreach ($this->pegawais as $key => $p) {

            $drawing = new Drawing();
            $drawing->setName('foto');
            $drawing->setDescription('ini foto ' . $p->nama);
            $drawing->setPath(public_path($p->foto));
            $drawing->setHeight(60);
            $drawing->setCoordinates('A' . $key + 2);

            array_push($drawings, $drawing);
        }

        return $drawings;
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getDefaultRowDimension()->setRowHeight(60); // Mengatur tinggi default untuk semua baris

    }
    public function startCell(): string
    {
        return 'B1';
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestColumn = $sheet->getHighestColumn();
                $highestRow = $sheet->getHighestRow();

                $event->sheet->getDelegate()->setCellValue('A1', 'Foto');

                // Set vertical alignment to center for all cells
                $sheet->getStyle("A1:{$highestColumn}{$highestRow}")
                    ->getAlignment()
                    ->setVertical(Alignment::VERTICAL_CENTER);

                // Mengatur gaya untuk baris pertama (header)
                $sheet->getStyle('A1:Z1')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['argb' => '0055ff'] // Warna kuning
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => Color::COLOR_WHITE],
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'], // Warna border hitam
                        ],
                    ],
                ]);
            },
        ];
    }
}
