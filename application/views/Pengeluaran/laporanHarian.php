<?php

header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=laporan_pengeluaran_".$tanggal.".xlsx");
header('Cache-Control: max-age=0');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'LAPORAN PENGELUARAN HARIAN SURYA');
$sheet->setCellValue('A2', 'Tanggal '.$tanggal);

$sheet->setCellValue('A4', 'Pengeluaran Tak Terkendali');
$sheet->setCellValue('A5', 'No');
$sheet->setCellValue('B5', 'Nama');
$sheet->setCellValue('C5', 'Jenis');
$sheet->setCellValue('D5', 'Total');

$sheet->setCellValue('F4', 'Pengeluaran Overhead');
$sheet->setCellValue('F5', 'No');
$sheet->setCellValue('G5', 'Nama');
$sheet->setCellValue('H5', 'Jenis');
$sheet->setCellValue('I5', 'Total');

$sheet->mergeCells('A1:I1');
$sheet->mergeCells('A2:I2');
$sheet->mergeCells('A4:D4');
$sheet->mergeCells('F4:I4');

$sheet->getColumnDimension('A')->setWidth(4);
$sheet->getColumnDimension('B')->setWidth(23);
$sheet->getColumnDimension('C')->setWidth(17);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(4);
$sheet->getColumnDimension('G')->setWidth(23);
$sheet->getColumnDimension('H')->setWidth(17);
$sheet->getColumnDimension('I')->setWidth(15);

$nokiri = 1;
foreach ($expenses as $row):
  if ($row['jenis_pengeluaran'] == 'tak_terkendali') {
    $column = $nokiri + 5;
    $sheet->setCellValue('A'.$column, $nokiri);
    $sheet->setCellValue('B'.$column, $row['nama_pengeluaran']);
    $sheet->setCellValue('C'.$column, $row['jenis_pengeluaran']);
    $sheet->setCellValue('D'.$column, $row['total']);
    $nokiri++;
  }
endforeach;

$column = $nokiri + 4;
$sheet->getStyle('A1:D'.$column)->getAlignment()->setWrapText(true);

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
$sheet->getStyle('A5:D5')->applyFromArray(
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
$sheet->getStyle('A5:D'.$column)->applyFromArray(
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

$nokanan = 1;
foreach ($expenses as $row):
  if ($row['jenis_pengeluaran'] == 'overhead') {
    $column = $nokanan + 5;
    $sheet->setCellValue('F'.$column, $nokanan);
    $sheet->setCellValue('G'.$column, $row['nama_pengeluaran']);
    $sheet->setCellValue('H'.$column, $row['jenis_pengeluaran']);
    $sheet->setCellValue('I'.$column, $row['total']);
    $nokanan++;
  }
endforeach;

$column = $nokanan + 4;
$sheet->getStyle('A1:I'.$column)->getAlignment()->setWrapText(true);

// Mengubah style header tabel
$sheet->getStyle('F5:I5')->applyFromArray(
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
$sheet->getStyle('F5:I'.$column)->applyFromArray(
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