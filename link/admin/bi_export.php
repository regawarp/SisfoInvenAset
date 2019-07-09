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

// HEADER
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('B2', 'BUKU INVENTARIS BARANG')
    ->setCellValue('B3', 'PROVINSI')
    ->setCellValue('D3', ':')
    ->setCellValue('E3', 'JAWA BARAT')
    ->setCellValue('B4', 'KABUPATEN/KOTA')
    ->setCellValue('D4', ':')
    ->setCellValue('E4', 'GARUT')
    ->setCellValue('B5', 'BIDANG')
    ->setCellValue('D5', ':')
    ->setCellValue('E5', 'BIDANG SUMBER DAYA AIR')
    ->setCellValue('B6', 'ASISTEN / OPD')
    ->setCellValue('D6', ':')
    ->setCellValue('E6', 'Dinas Pekerjaan Umum dan Penataan Ruang')
    ->setCellValue('B7', 'BIRO / UPTD/B')
    ->setCellValue('D7', ':')
    ->setCellValue('B8', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')

    ->setCellValue('B10', 'Nomor')
    ->setCellValue('E10', 'Spesifikasi Barang')
    ->setCellValue('H10', 'Bahan')
    ->setCellValue('I10', 'Asal/ Cara Perolehan Barang')
    ->setCellValue('J10', 'Tahun Perolehan')
    ->setCellValue('K10', 'Ukuran Barang / Konstruksi (P,SP,D)')
    ->setCellValue('L10', 'Keadaan Barang (B,KB,RB)')
    ->setCellValue('M10', 'Jumlah')
    ->setCellValue('O10', 'Keterangan')
    ->setCellValue('B11', 'No.')
    ->setCellValue('C11', 'Kode Barang')
    ->setCellValue('D11', 'Register.')
    ->setCellValue('E11', 'Nama Barang')
    ->setCellValue('F11', 'Merk / Tipe')
    ->setCellValue('G11', 'No. Sertifikat / No. Pabrik / No. Chasis / No. Mesin / No. Polisi')
    ->setCellValue('M11', 'Barang')
    ->setCellValue('N11', 'Harga')

    ->setCellValue('B12', '1')
    ->setCellValue('C12', '2')
    ->setCellValue('D12', '3')
    ->setCellValue('E12', '4')
    ->setCellValue('F12', '5')
    ->setCellValue('G12', '6')
    ->setCellValue('H12', '7')
    ->setCellValue('I12', '8')
    ->setCellValue('J12', '9')
    ->setCellValue('K12', '10')
    ->setCellValue('L12', '11')
    ->setCellValue('M12', '12')
    ->setCellValue('N12', '13')
    ->setCellValue('O12', '14');

// DATA
$rowExcel = 13;
include("../connect.php");
$sql = "SELECT * FROM kiba";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B' . $rowExcel, $rowExcel - 12)
            ->setCellValue('C' . $rowExcel, $row['NOMOR_KODE_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['NOMOR_REGISTER'])
            ->setCellValue('E' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('F' . $rowExcel, '-')
            ->setCellValue('G' . $rowExcel, '-')
            ->setCellValue('H' . $rowExcel, '-')
            ->setCellValue('I' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('J' . $rowExcel, $row['TAHUN_PENGADAAN'])
            ->setCellValue('K' . $rowExcel, '-')
            ->setCellValue('L' . $rowExcel, '-')
            ->setCellValue('M' . $rowExcel, $row['LUAS'])
            ->setCellValue('N' . $rowExcel, $row['HARGA'])
            ->setCellValue('O' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
}
$sql = "SELECT * FROM kibd";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B' . $rowExcel, $rowExcel - 12)
            ->setCellValue('C' . $rowExcel, $row['NOMOR_KODE_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['NOMOR_REGISTER'])
            ->setCellValue('E' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('F' . $rowExcel, '-')
            ->setCellValue('G' . $rowExcel, '-')
            ->setCellValue('H' . $rowExcel, '-')
            ->setCellValue('I' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('J' . $rowExcel, $row['TANGGAL_DOKUMEN'])
            ->setCellValue('K' . $rowExcel, $row['KONSTRUKSI'])
            ->setCellValue('L' . $rowExcel, $row['KONDISI'])
            ->setCellValue('M' . $rowExcel, $row['LUAS'])
            ->setCellValue('N' . $rowExcel, $row['HARGA'])
            ->setCellValue('O' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
}
$sql = "SELECT * FROM kibf";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B' . $rowExcel, $rowExcel - 12)
            ->setCellValue('C' . $rowExcel, '-')
            ->setCellValue('D' . $rowExcel, '-')
            ->setCellValue('E' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('F' . $rowExcel, '-')
            ->setCellValue('G' . $rowExcel, '-')
            ->setCellValue('H' . $rowExcel, '-')
            ->setCellValue('I' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('J' . $rowExcel, $row['TANGGAL_MULAI'])
            ->setCellValue('K' . $rowExcel, '-')
            ->setCellValue('L' . $rowExcel, '-')
            ->setCellValue('M' . $rowExcel, $row['PANJANG'])
            ->setCellValue('N' . $rowExcel, $row['NILAI_KONTRAK'])
            ->setCellValue('O' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
}
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B2:O2')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B2:O12')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B10:O12')->applyFromArray(
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
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B11:O' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C10', 'O' . (12)) as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->getActiveSheet()->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C10', 'O' . (12)) as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(false);
}

// MERGE
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:C3')
    ->mergeCells('E3:H3')
    ->mergeCells('B4:C4')
    ->mergeCells('E4:H4')
    ->mergeCells('B5:C5')
    ->mergeCells('E5:H5')
    ->mergeCells('B6:C6')
    ->mergeCells('E6:H6')
    ->mergeCells('B7:C7')
    ->mergeCells('E7:H7')
    ->mergeCells('B8:O8')

    ->mergeCells('B10:D10')
    ->mergeCells('E10:G10')
    ->mergeCells('M10:N10')
    ->mergeCells('A10:A11')
    ->mergeCells('H10:H11')
    ->mergeCells('I10:I11')
    ->mergeCells('J10:J11')
    ->mergeCells('K10:K11')
    ->mergeCells('L10:L11')
    ->mergeCells('O10:O11');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('BI');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="PelaporanBI.xlsx"');
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
