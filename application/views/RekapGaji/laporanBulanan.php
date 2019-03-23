<?php

header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=rekap_gaji_bulanan_".$bulan.".xlsx");
header('Cache-Control: max-age=0');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'REKAP GAJI BULAN '.$bulan);
$sheet->setCellValue('A2','Surya');

$sheet->setCellValue('A4', 'No');
$sheet->setCellValue('B4', 'Nama');
$sheet->setCellValue('C4', 'Gaji Harian');
$sheet->setCellValue('D4', 'Jumlah Hadir');
$sheet->setCellValue('E4', 'Kasbon');
$sheet->setCellValue('F4', 'Total');

$sheet->mergeCells('A1:F1');
$sheet->mergeCells('A2:F2');

$sheet->getColumnDimension('A')->setWidth(4);
$sheet->getColumnDimension('B')->setWidth(23);
$sheet->getColumnDimension('C')->setWidth(17);
$sheet->getColumnDimension('D')->setWidth(10);
$sheet->getColumnDimension('E')->setWidth(23);
$sheet->getColumnDimension('F')->setWidth(23);

$nokiri = 1;
foreach ($salaries as $row):
  $column = $nokiri + 4;
  $sheet->setCellValue('A'.$column, $nokiri);
  $sheet->setCellValue('B'.$column, $row['nama_karyawan']);
  $sheet->setCellValue('C'.$column, $row['gaji_pokok']);
  $sheet->setCellValue('D'.$column, $row['presensi']);
  $sheet->setCellValue('E'.$column, $row['kasbon']);
  $total = $row['gaji_pokok'] * $row['presensi'] - $row['kasbon'];
  $sheet->setCellValue('F'.$column, $total);
  $nokiri++;
endforeach;

$column = $nokiri + 3;
$sheet->getStyle('A1:F'.$column)->getAlignment()->setWrapText(true);

// Mengubah style header file
$sheet->getStyle('A1:A2')->applyFromArray(
  [
    'alignment' => [
      'horizontal' => Alignment::HORIZONTAL_CENTER,
    ],
    'font' => [
      'bold' => true,
    ],
  ]
);

// Mengubah style header tabel
$sheet->getStyle('A4:F4')->applyFromArray(
  [
    'alignment' => [
      'horizontal' => Alignment::HORIZONTAL_CENTER,
    ],
    'font' => [
      'bold' => true,
    ],
  ]
);

// Menambah border di seluruh data
$sheet->getStyle('A4:F'.$column)->applyFromArray(
  [
    'borders' => [
      'allBorders' => [
        'borderStyle' => Border::BORDER_THIN,
        'color' => [
          'argb' => 'FF000000'
        ],
      ],
    ],
    'alignment' => [
      'vertical' => Alignment::VERTICAL_CENTER,
    ],
  ]
);

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>