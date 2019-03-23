<?php

header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=laporan_harian_penjualan_".$tanggal.".xlsx");
header('Cache-Control: max-age=0');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'LAPORAN PENJUALAN HARIAN SURYA');
$sheet->setCellValue('A2', 'Tanggal '.$tanggal);

$sheet->setCellValue('A4', 'No Invoice');
$sheet->setCellValue('B4', 'Nama Barang');
$sheet->setCellValue('C4', 'Nama Pelanggan');
$sheet->setCellValue('D4', 'Harga Beli');
$sheet->setCellValue('E4', 'Jumlah');
$sheet->setCellValue('F4', 'Total');

$sheet->mergeCells('A1:F1');
$sheet->mergeCells('A2:F2');

$sheet->getColumnDimension('A')->setWidth(15);
$sheet->getColumnDimension('B')->setWidth(23);
$sheet->getColumnDimension('C')->setWidth(23);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(10);
$sheet->getColumnDimension('F')->setWidth(25);

$nokiri = 1;
$finalTotal = 0;
foreach ($salaries as $row):
  $column = $nokiri + 4;
  $sheet->setCellValue('A'.$column, '#'.$row['id_invoice']);
  $sheet->setCellValue('B'.$column, $row['nama_barang']);
  $sheet->setCellValue('C'.$column, $row['nama_customer']);
  $sheet->setCellValue('D'.$column, $row['harga_beli']);
  $sheet->setCellValue('E'.$column, $row['jumlah']);
  $total = $row['harga_beli'] * $row['jumlah'];
  $sheet->setCellValue('F'.$column, $total);
  $finalTotal+=$total;
  $nokiri++;
endforeach;

$col = $nokiri + 4;
$sheet->setCellValue('A'.$col, 'Total Akhir');
$sheet->setCellValue('F'.$col, $finalTotal);

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