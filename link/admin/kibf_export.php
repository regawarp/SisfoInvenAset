<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../../PHPExcel-1.8.2/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");
$objPHPExcel->createSheet(1);
$objPHPExcel->createSheet(2);
$objPHPExcel->createSheet(3);

// HEADER
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) F')
    ->setCellValue('B3', 'KONSTRUKSI DALAM PENGERJAAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No Urut')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Bangunan (P, SP, D)')
    ->setCellValue('E7', 'Konstruksi Bangunan')
    ->setCellValue('E8', 'Bertingkat/tidak')
    ->setCellValue('F8', 'Beton/ tidak')
    ->setCellValue('G7', 'Panjang (M)')
    ->setCellValue('H7', 'Letak/ Lokasi')
    ->setCellValue('I7', 'Dokumen')
    ->setCellValue('I8', 'Tanggal')
    ->setCellValue('J8', 'Nomor')
    ->setCellValue('K7', 'Tanggal/Bulan/Tahun Mulai')
    ->setCellValue('L7', 'Status Tanah')
    ->setCellValue('M7', 'Nomor Kode Tanah')
    ->setCellValue('N7', 'Asal-usul Pembiayaan')
    ->setCellValue('O7', 'Nilai Kontrak (Rp)')
    ->setCellValue('P7', 'Ket')
    ->setCellValue('B9', '1')
    ->setCellValue('C9', '2')
    ->setCellValue('D9', '3')
    ->setCellValue('E9', '4')
    ->setCellValue('F9', '5')
    ->setCellValue('G9', '6')
    ->setCellValue('H9', '7')
    ->setCellValue('I9', '8')
    ->setCellValue('J9', '9')
    ->setCellValue('K9', '10')
    ->setCellValue('L9', '11')
    ->setCellValue('M9', '12')
    ->setCellValue('N9', '13')
    ->setCellValue('O9', '14')
    ->setCellValue('P9', '15');
$objPHPExcel->setActiveSheetIndex(1)
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) F')
    ->setCellValue('B3', 'KONSTRUKSI DALAM PENGERJAAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No Urut')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Bangunan (P, SP, D)')
    ->setCellValue('E7', 'Konstruksi Bangunan')
    ->setCellValue('E8', 'Bertingkat/tidak')
    ->setCellValue('F8', 'Beton/ tidak')
    ->setCellValue('G7', 'Panjang (M)')
    ->setCellValue('H7', 'Letak/ Lokasi')
    ->setCellValue('I7', 'Dokumen')
    ->setCellValue('I8', 'Tanggal')
    ->setCellValue('J8', 'Nomor')
    ->setCellValue('K7', 'Tanggal/Bulan/Tahun Mulai')
    ->setCellValue('L7', 'Status Tanah')
    ->setCellValue('M7', 'Nomor Kode Tanah')
    ->setCellValue('N7', 'Asal-usul Pembiayaan')
    ->setCellValue('O7', 'Nilai Kontrak (Rp)')
    ->setCellValue('P7', 'Ket')
    ->setCellValue('B9', '1')
    ->setCellValue('C9', '2')
    ->setCellValue('D9', '3')
    ->setCellValue('E9', '4')
    ->setCellValue('F9', '5')
    ->setCellValue('G9', '6')
    ->setCellValue('H9', '7')
    ->setCellValue('I9', '8')
    ->setCellValue('J9', '9')
    ->setCellValue('K9', '10')
    ->setCellValue('L9', '11')
    ->setCellValue('M9', '12')
    ->setCellValue('N9', '13')
    ->setCellValue('O9', '14')
    ->setCellValue('P9', '15');
$objPHPExcel->setActiveSheetIndex(2)
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) F')
    ->setCellValue('B3', 'KONSTRUKSI DALAM PENGERJAAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No Urut')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Bangunan (P, SP, D)')
    ->setCellValue('E7', 'Konstruksi Bangunan')
    ->setCellValue('E8', 'Bertingkat/tidak')
    ->setCellValue('F8', 'Beton/ tidak')
    ->setCellValue('G7', 'Panjang (M)')
    ->setCellValue('H7', 'Letak/ Lokasi')
    ->setCellValue('I7', 'Dokumen')
    ->setCellValue('I8', 'Tanggal')
    ->setCellValue('J8', 'Nomor')
    ->setCellValue('K7', 'Tanggal/Bulan/Tahun Mulai')
    ->setCellValue('L7', 'Status Tanah')
    ->setCellValue('M7', 'Nomor Kode Tanah')
    ->setCellValue('N7', 'Asal-usul Pembiayaan')
    ->setCellValue('O7', 'Nilai Kontrak (Rp)')
    ->setCellValue('P7', 'Ket')
    ->setCellValue('B9', '1')
    ->setCellValue('C9', '2')
    ->setCellValue('D9', '3')
    ->setCellValue('E9', '4')
    ->setCellValue('F9', '5')
    ->setCellValue('G9', '6')
    ->setCellValue('H9', '7')
    ->setCellValue('I9', '8')
    ->setCellValue('J9', '9')
    ->setCellValue('K9', '10')
    ->setCellValue('L9', '11')
    ->setCellValue('M9', '12')
    ->setCellValue('N9', '13')
    ->setCellValue('O9', '14')
    ->setCellValue('P9', '15');
$objPHPExcel->setActiveSheetIndex(3)
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) F')
    ->setCellValue('B3', 'KONSTRUKSI DALAM PENGERJAAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No Urut')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Bangunan (P, SP, D)')
    ->setCellValue('E7', 'Konstruksi Bangunan')
    ->setCellValue('E8', 'Bertingkat/tidak')
    ->setCellValue('F8', 'Beton/ tidak')
    ->setCellValue('G7', 'Panjang (M)')
    ->setCellValue('H7', 'Letak/ Lokasi')
    ->setCellValue('I7', 'Dokumen')
    ->setCellValue('I8', 'Tanggal')
    ->setCellValue('J8', 'Nomor')
    ->setCellValue('K7', 'Tanggal/Bulan/Tahun Mulai')
    ->setCellValue('L7', 'Status Tanah')
    ->setCellValue('M7', 'Nomor Kode Tanah')
    ->setCellValue('N7', 'Asal-usul Pembiayaan')
    ->setCellValue('O7', 'Nilai Kontrak (Rp)')
    ->setCellValue('P7', 'Ket')
    ->setCellValue('B9', '1')
    ->setCellValue('C9', '2')
    ->setCellValue('D9', '3')
    ->setCellValue('E9', '4')
    ->setCellValue('F9', '5')
    ->setCellValue('G9', '6')
    ->setCellValue('H9', '7')
    ->setCellValue('I9', '8')
    ->setCellValue('J9', '9')
    ->setCellValue('K9', '10')
    ->setCellValue('L9', '11')
    ->setCellValue('M9', '12')
    ->setCellValue('N9', '13')
    ->setCellValue('O9', '14')
    ->setCellValue('P9', '15');

// DATA
$rowExcel = 11;
include("../connect.php");
$sql = "SELECT * FROM kibf,lokasi WHERE kibf.ID_LOKASI=lokasi.ID_LOKASI AND ID_ASET='AS01'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['BANGUNAN'])
            ->setCellValue('E' . $rowExcel, $row['BERTINGKAT'])
            ->setCellValue('F' . $rowExcel, $row['BETON'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG'])
            ->setCellValue('H' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('I' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('J' . $rowExcel, $row['NOMOR_DOKUMEN'])
            ->setCellValue('K' . $rowExcel, $row['TANGGAL_MULAI'])
            ->setCellValue('L' . $rowExcel, $row['STATUS_TANAH'])
            ->setCellValue('M' . $rowExcel, $row['NOMO_KODE_TANAH'])
            ->setCellValue('N' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('O' . $rowExcel, $row['NILAI_KONTRAK'])
            ->setCellValue('P' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B2:P3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B2:P4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B7:P10')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// STYLING TABLE
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B10:P' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'P' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(0)->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'P' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($columnID)->setAutoSize(false);
}
// DATA
$rowExcel = 11;
include("../connect.php");
$sql = "SELECT * FROM kibf,lokasi WHERE kibf.ID_LOKASI=lokasi.ID_LOKASI AND ID_ASET='AS02'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['BANGUNAN'])
            ->setCellValue('E' . $rowExcel, $row['BERTINGKAT'])
            ->setCellValue('F' . $rowExcel, $row['BETON'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG'])
            ->setCellValue('H' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('I' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('J' . $rowExcel, $row['NOMOR_DOKUMEN'])
            ->setCellValue('K' . $rowExcel, $row['TANGGAL_MULAI'])
            ->setCellValue('L' . $rowExcel, $row['STATUS_TANAH'])
            ->setCellValue('M' . $rowExcel, $row['NOMO_KODE_TANAH'])
            ->setCellValue('N' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('O' . $rowExcel, $row['NILAI_KONTRAK'])
            ->setCellValue('P' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(1)->getStyle('B2:P3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(1)->getStyle('B2:P4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(1)->getStyle('B7:P10')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// STYLING TABLE
$objPHPExcel->setActiveSheetIndex(1)->getStyle('B10:P' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'P' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(1)->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(1)->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'P' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(1)->getColumnDimension($columnID)->setAutoSize(false);
}

// DATA
$rowExcel = 11;
include("../connect.php");
$sql = "SELECT * FROM kibf,lokasi WHERE kibf.ID_LOKASI=lokasi.ID_LOKASI AND ID_ASET='AS03'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['BANGUNAN'])
            ->setCellValue('E' . $rowExcel, $row['BERTINGKAT'])
            ->setCellValue('F' . $rowExcel, $row['BETON'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG'])
            ->setCellValue('H' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('I' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('J' . $rowExcel, $row['NOMOR_DOKUMEN'])
            ->setCellValue('K' . $rowExcel, $row['TANGGAL_MULAI'])
            ->setCellValue('L' . $rowExcel, $row['STATUS_TANAH'])
            ->setCellValue('M' . $rowExcel, $row['NOMO_KODE_TANAH'])
            ->setCellValue('N' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('O' . $rowExcel, $row['NILAI_KONTRAK'])
            ->setCellValue('P' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(2)->getStyle('B2:P3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(2)->getStyle('B2:P4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(2)->getStyle('B7:P10')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// STYLING TABLE
$objPHPExcel->setActiveSheetIndex(2)->getStyle('B10:P' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'P' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(2)->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(2)->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'P' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(2)->getColumnDimension($columnID)->setAutoSize(false);
}
// DATA
$rowExcel = 11;
include("../connect.php");
$sql = "SELECT * FROM kibf,lokasi WHERE kibf.ID_LOKASI=lokasi.ID_LOKASI AND ID_ASET='AS04'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['BANGUNAN'])
            ->setCellValue('E' . $rowExcel, $row['BERTINGKAT'])
            ->setCellValue('F' . $rowExcel, $row['BETON'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG'])
            ->setCellValue('H' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('I' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('J' . $rowExcel, $row['NOMOR_DOKUMEN'])
            ->setCellValue('K' . $rowExcel, $row['TANGGAL_MULAI'])
            ->setCellValue('L' . $rowExcel, $row['STATUS_TANAH'])
            ->setCellValue('M' . $rowExcel, $row['NOMO_KODE_TANAH'])
            ->setCellValue('N' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('O' . $rowExcel, $row['NILAI_KONTRAK'])
            ->setCellValue('P' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(3)->getStyle('B2:P3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(3)->getStyle('B2:P4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(3)->getStyle('B7:P10')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// STYLING TABLE
$objPHPExcel->setActiveSheetIndex(3)->getStyle('B10:P' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'P' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(3)->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(3)->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'P' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(3)->getColumnDimension($columnID)->setAutoSize(false);
}

// MERGE
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B8')
    ->mergeCells('C7:C8')
    ->mergeCells('D7:D8')
    ->mergeCells('E7:F7')
    ->mergeCells('G7:G8')
    ->mergeCells('H7:H8')
    ->mergeCells('I7:J7')
    ->mergeCells('K7:K8')
    ->mergeCells('L7:L8')
    ->mergeCells('M7:M8')
    ->mergeCells('N7:N8')
    ->mergeCells('O7:O8')
    ->mergeCells('P7:P8');
$objPHPExcel->setActiveSheetIndex(1)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B8')
    ->mergeCells('C7:C8')
    ->mergeCells('D7:D8')
    ->mergeCells('E7:F7')
    ->mergeCells('G7:G8')
    ->mergeCells('H7:H8')
    ->mergeCells('I7:J7')
    ->mergeCells('K7:K8')
    ->mergeCells('L7:L8')
    ->mergeCells('M7:M8')
    ->mergeCells('N7:N8')
    ->mergeCells('O7:O8')
    ->mergeCells('P7:P8');
$objPHPExcel->setActiveSheetIndex(2)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B8')
    ->mergeCells('C7:C8')
    ->mergeCells('D7:D8')
    ->mergeCells('E7:F7')
    ->mergeCells('G7:G8')
    ->mergeCells('H7:H8')
    ->mergeCells('I7:J7')
    ->mergeCells('K7:K8')
    ->mergeCells('L7:L8')
    ->mergeCells('M7:M8')
    ->mergeCells('N7:N8')
    ->mergeCells('O7:O8')
    ->mergeCells('P7:P8');
$objPHPExcel->setActiveSheetIndex(3)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B8')
    ->mergeCells('C7:C8')
    ->mergeCells('D7:D8')
    ->mergeCells('E7:F7')
    ->mergeCells('G7:G8')
    ->mergeCells('H7:H8')
    ->mergeCells('I7:J7')
    ->mergeCells('K7:K8')
    ->mergeCells('L7:L8')
    ->mergeCells('M7:M8')
    ->mergeCells('N7:N8')
    ->mergeCells('O7:O8')
    ->mergeCells('P7:P8');

// Rename worksheet
$objPHPExcel->setActiveSheetIndex(0)->setTitle('Irigasi');
$objPHPExcel->setActiveSheetIndex(1)->setTitle('DAS');
$objPHPExcel->setActiveSheetIndex(2)->setTitle('Drainase');
$objPHPExcel->setActiveSheetIndex(3)->setTitle('Danau');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ExportKIBF.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
