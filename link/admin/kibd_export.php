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
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) D')
    ->setCellValue('B3', 'JALAN, IRIGASI, DAN JARINGAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No Urut')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Nomor')
    ->setCellValue('D8', 'Kode Barang')
    ->setCellValue('E8', 'Register')
    ->setCellValue('F7', 'Konstruksi')
    ->setCellValue('G7', 'Panjang (Km)')
    ->setCellValue('H7', 'Lebar (M)')
    ->setCellValue('I7', 'Luas (Ha)')
    ->setCellValue('J7', 'Letak/ Lokasi')
    ->setCellValue('K7', 'Dokumen')
    ->setCellValue('K8', 'Tanggal')
    ->setCellValue('L8', 'Nomor')
    ->setCellValue('M7', 'Status Tanah')
    ->setCellValue('N7', 'Nomor Kode Tanah')
    ->setCellValue('O7', 'Asal-usul')
    ->setCellValue('P7', 'Harga')
    ->setCellValue('Q7', 'Kondisi (B, KB, RB)')
    ->setCellValue('R7', 'Ket')
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
    ->setCellValue('P9', '15')
    ->setCellValue('Q9', '16')
    ->setCellValue('R9', '17');
$objPHPExcel->setActiveSheetIndex(1)
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) D')
    ->setCellValue('B3', 'JALAN, IRIGASI, DAN JARINGAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No Urut')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Nomor')
    ->setCellValue('D8', 'Kode Barang')
    ->setCellValue('E8', 'Register')
    ->setCellValue('F7', 'Konstruksi')
    ->setCellValue('G7', 'Panjang (Km)')
    ->setCellValue('H7', 'Lebar (M)')
    ->setCellValue('I7', 'Luas (Ha)')
    ->setCellValue('J7', 'Letak/ Lokasi')
    ->setCellValue('K7', 'Dokumen')
    ->setCellValue('K8', 'Tanggal')
    ->setCellValue('L8', 'Nomor')
    ->setCellValue('M7', 'Status Tanah')
    ->setCellValue('N7', 'Nomor Kode Tanah')
    ->setCellValue('O7', 'Asal-usul')
    ->setCellValue('P7', 'Harga')
    ->setCellValue('Q7', 'Kondisi (B, KB, RB)')
    ->setCellValue('R7', 'Ket')
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
    ->setCellValue('P9', '15')
    ->setCellValue('Q9', '16')
    ->setCellValue('R9', '17');
$objPHPExcel->setActiveSheetIndex(2)
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) D')
    ->setCellValue('B3', 'JALAN, IRIGASI, DAN JARINGAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No Urut')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Nomor')
    ->setCellValue('D8', 'Kode Barang')
    ->setCellValue('E8', 'Register')
    ->setCellValue('F7', 'Konstruksi')
    ->setCellValue('G7', 'Panjang (Km)')
    ->setCellValue('H7', 'Lebar (M)')
    ->setCellValue('I7', 'Luas (Ha)')
    ->setCellValue('J7', 'Letak/ Lokasi')
    ->setCellValue('K7', 'Dokumen')
    ->setCellValue('K8', 'Tanggal')
    ->setCellValue('L8', 'Nomor')
    ->setCellValue('M7', 'Status Tanah')
    ->setCellValue('N7', 'Nomor Kode Tanah')
    ->setCellValue('O7', 'Asal-usul')
    ->setCellValue('P7', 'Harga')
    ->setCellValue('Q7', 'Kondisi (B, KB, RB)')
    ->setCellValue('R7', 'Ket')
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
    ->setCellValue('P9', '15')
    ->setCellValue('Q9', '16')
    ->setCellValue('R9', '17');
$objPHPExcel->setActiveSheetIndex(3)
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) D')
    ->setCellValue('B3', 'JALAN, IRIGASI, DAN JARINGAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No Urut')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Nomor')
    ->setCellValue('D8', 'Kode Barang')
    ->setCellValue('E8', 'Register')
    ->setCellValue('F7', 'Konstruksi')
    ->setCellValue('G7', 'Panjang (Km)')
    ->setCellValue('H7', 'Lebar (M)')
    ->setCellValue('I7', 'Luas (Ha)')
    ->setCellValue('J7', 'Letak/ Lokasi')
    ->setCellValue('K7', 'Dokumen')
    ->setCellValue('K8', 'Tanggal')
    ->setCellValue('L8', 'Nomor')
    ->setCellValue('M7', 'Status Tanah')
    ->setCellValue('N7', 'Nomor Kode Tanah')
    ->setCellValue('O7', 'Asal-usul')
    ->setCellValue('P7', 'Harga')
    ->setCellValue('Q7', 'Kondisi (B, KB, RB)')
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
    ->setCellValue('P9', '15')
    ->setCellValue('Q9', '16')
    ->setCellValue('R9', '17');

// DATA
$rowExcel = 11;
include("../connect.php");
$sql = "SELECT * FROM kibd,lokasi WHERE kibd.ID_LOKASI=lokasi.ID_LOKASI AND ID_ASET='AS01'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['NOMOR_KODE_BARANG'])
            ->setCellValue('E' . $rowExcel, $row['NOMOR_REGISTER'])
            ->setCellValue('F' . $rowExcel, $row['KONSTRUKSI'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG'])
            ->setCellValue('H' . $rowExcel, $row['LEBAR'])
            ->setCellValue('I' . $rowExcel, $row['LUAS'])
            ->setCellValue('J' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('K' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('L' . $rowExcel, $row['NOMOR_DOKUMEN'])
            ->setCellValue('M' . $rowExcel, $row['STATUS_TANAH'])
            ->setCellValue('N' . $rowExcel, $row['NOMOR_KODE'])
            ->setCellValue('O' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('P' . $rowExcel, $row['HARGA'])
            ->setCellValue('Q' . $rowExcel, $row['KONDISI'])
            ->setCellValue('R' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B2:R3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B2:R4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B7:R10')->applyFromArray(
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
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B10:R' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'R' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(0)->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'R' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($columnID)->setAutoSize(false);
}

// DATA
$rowExcel = 11;
include("../connect.php");
$sql = "SELECT * FROM kibd,lokasi WHERE kibd.ID_LOKASI=lokasi.ID_LOKASI AND ID_ASET='AS02'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['NOMOR_KODE_BARANG'])
            ->setCellValue('E' . $rowExcel, $row['NOMOR_REGISTER'])
            ->setCellValue('F' . $rowExcel, $row['KONSTRUKSI'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG'])
            ->setCellValue('H' . $rowExcel, $row['LEBAR'])
            ->setCellValue('I' . $rowExcel, $row['LUAS'])
            ->setCellValue('J' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('K' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('L' . $rowExcel, $row['NOMOR_DOKUMEN'])
            ->setCellValue('M' . $rowExcel, $row['STATUS_TANAH'])
            ->setCellValue('N' . $rowExcel, $row['NOMOR_KODE'])
            ->setCellValue('O' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('P' . $rowExcel, $row['HARGA'])
            ->setCellValue('Q' . $rowExcel, $row['KONDISI'])
            ->setCellValue('R' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(1)->getStyle('B2:R3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(1)->getStyle('B2:R4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(1)->getStyle('B7:R10')->applyFromArray(
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
$objPHPExcel->setActiveSheetIndex(1)->getStyle('B10:R' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'R' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(1)->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(1)->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'R' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(1)->getColumnDimension($columnID)->setAutoSize(false);
}

// DATA
$rowExcel = 11;
include("../connect.php");
$sql = "SELECT * FROM kibd,lokasi WHERE kibd.ID_LOKASI=lokasi.ID_LOKASI AND ID_ASET='AS03'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['NOMOR_KODE_BARANG'])
            ->setCellValue('E' . $rowExcel, $row['NOMOR_REGISTER'])
            ->setCellValue('F' . $rowExcel, $row['KONSTRUKSI'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG'])
            ->setCellValue('H' . $rowExcel, $row['LEBAR'])
            ->setCellValue('I' . $rowExcel, $row['LUAS'])
            ->setCellValue('J' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('K' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('L' . $rowExcel, $row['NOMOR_DOKUMEN'])
            ->setCellValue('M' . $rowExcel, $row['STATUS_TANAH'])
            ->setCellValue('N' . $rowExcel, $row['NOMOR_KODE'])
            ->setCellValue('O' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('P' . $rowExcel, $row['HARGA'])
            ->setCellValue('Q' . $rowExcel, $row['KONDISI'])
            ->setCellValue('R' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(2)->getStyle('B2:R3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(2)->getStyle('B2:R4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(2)->getStyle('B7:R10')->applyFromArray(
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
$objPHPExcel->setActiveSheetIndex(2)->getStyle('B10:R' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'R' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(2)->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(2)->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'R' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(2)->getColumnDimension($columnID)->setAutoSize(false);
}

// DATA
$rowExcel = 11;
include("../connect.php");
$sql = "SELECT * FROM kibd,lokasi WHERE kibd.ID_LOKASI=lokasi.ID_LOKASI AND ID_ASET='AS04'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['NOMOR_KODE_BARANG'])
            ->setCellValue('E' . $rowExcel, $row['NOMOR_REGISTER'])
            ->setCellValue('F' . $rowExcel, $row['KONSTRUKSI'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG'])
            ->setCellValue('H' . $rowExcel, $row['LEBAR'])
            ->setCellValue('I' . $rowExcel, $row['LUAS'])
            ->setCellValue('J' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('K' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('L' . $rowExcel, $row['NOMOR_DOKUMEN'])
            ->setCellValue('M' . $rowExcel, $row['STATUS_TANAH'])
            ->setCellValue('N' . $rowExcel, $row['NOMOR_KODE'])
            ->setCellValue('O' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('P' . $rowExcel, $row['HARGA'])
            ->setCellValue('Q' . $rowExcel, $row['KONDISI'])
            ->setCellValue('R' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(3)->getStyle('B2:R3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(3)->getStyle('B2:R4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(3)->getStyle('B7:R10')->applyFromArray(
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
$objPHPExcel->setActiveSheetIndex(3)->getStyle('B10:R' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'R' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(3)->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->setActiveSheetIndex(3)->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'R' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->setActiveSheetIndex(3)->getColumnDimension($columnID)->setAutoSize(false);
}

// MERGE
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B8')
    ->mergeCells('C7:C8')
    ->mergeCells('D7:E7')
    ->mergeCells('F7:F8')
    ->mergeCells('G7:G8')
    ->mergeCells('H7:H8')
    ->mergeCells('I7:I8')
    ->mergeCells('J7:J8')
    ->mergeCells('K7:L7')
    ->mergeCells('M7:M8')
    ->mergeCells('N7:N8')
    ->mergeCells('O7:O8')
    ->mergeCells('P7:P8')
    ->mergeCells('Q7:Q8')
    ->mergeCells('R7:R8');
$objPHPExcel->setActiveSheetIndex(1)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B8')
    ->mergeCells('C7:C8')
    ->mergeCells('D7:E7')
    ->mergeCells('F7:F8')
    ->mergeCells('G7:G8')
    ->mergeCells('H7:H8')
    ->mergeCells('I7:I8')
    ->mergeCells('J7:J8')
    ->mergeCells('K7:L7')
    ->mergeCells('M7:M8')
    ->mergeCells('N7:N8')
    ->mergeCells('O7:O8')
    ->mergeCells('P7:P8')
    ->mergeCells('Q7:Q8')
    ->mergeCells('R7:R8');
$objPHPExcel->setActiveSheetIndex(2)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B8')
    ->mergeCells('C7:C8')
    ->mergeCells('D7:E7')
    ->mergeCells('F7:F8')
    ->mergeCells('G7:G8')
    ->mergeCells('H7:H8')
    ->mergeCells('I7:I8')
    ->mergeCells('J7:J8')
    ->mergeCells('K7:L7')
    ->mergeCells('M7:M8')
    ->mergeCells('N7:N8')
    ->mergeCells('O7:O8')
    ->mergeCells('P7:P8')
    ->mergeCells('Q7:Q8')
    ->mergeCells('R7:R8');
$objPHPExcel->setActiveSheetIndex(3)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B8')
    ->mergeCells('C7:C8')
    ->mergeCells('D7:E7')
    ->mergeCells('F7:F8')
    ->mergeCells('G7:G8')
    ->mergeCells('H7:H8')
    ->mergeCells('I7:I8')
    ->mergeCells('J7:J8')
    ->mergeCells('K7:L7')
    ->mergeCells('M7:M8')
    ->mergeCells('N7:N8')
    ->mergeCells('O7:O8')
    ->mergeCells('P7:P8')
    ->mergeCells('Q7:Q8')
    ->mergeCells('R7:R8');

// Rename worksheet
$objPHPExcel->setActiveSheetIndex(0)->setTitle('Irigasi');
$objPHPExcel->setActiveSheetIndex(1)->setTitle('DAS');
$objPHPExcel->setActiveSheetIndex(2)->setTitle('Drainase');
$objPHPExcel->setActiveSheetIndex(3)->setTitle('Danau');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ExportKIBD.xlsx"');
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
