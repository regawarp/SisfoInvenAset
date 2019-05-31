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
    ->setCellValue('B2', 'KARTU INVENTARIS BARANG (KIB) A')
    ->setCellValue('B3', 'TANAH DAN BANGUNGAN')
    ->setCellValue('B4', 'NO. KODE LOKASI : 12.10.03.03.01.01.001')
    ->setCellValue('B7', 'No')
    ->setCellValue('C7', 'Jenis Barang/ Nama Barang')
    ->setCellValue('D7', 'Nomor')
    ->setCellValue('D8', 'Kode Barang')
    ->setCellValue('E8', 'Register')
    ->setCellValue('F7', 'Luas (M2)')
    ->setCellValue('G7', 'Tahun Pengadaan')
    ->setCellValue('H7', 'Letak/  alamat')
    ->setCellValue('I7', 'Status Tanah')
    ->setCellValue('I8', 'Hak')
    ->setCellValue('J8', 'Sertifikat')
    ->setCellValue('J9', 'Tanggal')
    ->setCellValue('K9', 'Nomor')
    ->setCellValue('L7', 'Penggunaan')
    ->setCellValue('M7', 'Asal-usul')
    ->setCellValue('N7', 'Harga (Rp)')
    ->setCellValue('O7', 'Keterangan')
    ->setCellValue('B10', '1')
    ->setCellValue('C10', '2')
    ->setCellValue('D10', '3')
    ->setCellValue('E10', '4')
    ->setCellValue('F10', '5')
    ->setCellValue('G10', '6')
    ->setCellValue('H10', '7')
    ->setCellValue('I10', '8')
    ->setCellValue('J10', '9')
    ->setCellValue('K10', '10')
    ->setCellValue('L10', '11')
    ->setCellValue('M10', '12')
    ->setCellValue('N10', '13')
    ->setCellValue('O10', '14');

// DATA
$rowExcel = 11;
$conn = mysqli_connect("localhost", "root", "", "db_pupr");
$sql = "SELECT * FROM kiba,lokasi WHERE kiba.ID_LOKASI=lokasi.ID_LOKASI";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B' . $rowExcel, $rowExcel - 10)
            ->setCellValue('C' . $rowExcel, $row['NAMA_BARANG'])
            ->setCellValue('D' . $rowExcel, $row['NOMOR_KODE_BARANG'])
            ->setCellValue('E' . $rowExcel, $row['NOMOR_REGISTER'])
            ->setCellValue('F' . $rowExcel, $row['LUAS'])
            ->setCellValue('G' . $rowExcel, $row['TAHUN_PENGADAAN'])
            ->setCellValue('H' . $rowExcel, $row['NAMA_LOKASI'])
            ->setCellValue('I' . $rowExcel, $row['HAK'])
            ->setCellValue('J' . $rowExcel, $row['TANGGAL_SERTIFIKAT'])
            ->setCellValue('K' . $rowExcel, $row['NOMOR_SERTIFIKAT'])
            ->setCellValue('L' . $rowExcel, $row['PENGGUNAAN'])
            ->setCellValue('M' . $rowExcel, $row['ASAL_USUL'])
            ->setCellValue('N' . $rowExcel, $row['HARGA'])
            ->setCellValue('O' . $rowExcel, $row['KETERANGAN']);
        $rowExcel++;
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B2:O3')->applyFromArray(
    array(
        'alignment' => array( // CENTERED TEXT
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B2:O4')->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B7:O10')->applyFromArray(
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
$objPHPExcel->setActiveSheetIndex(0)->getStyle('B10:O' . ($rowExcel - 1))->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('C7', 'O' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->getActiveSheet()->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('C7', 'O' . ($rowExcel - 1)) as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(false);
}

// MERGE
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('B2:O2')
    ->mergeCells('B3:O3')
    ->mergeCells('B4:O4')
    ->mergeCells('B7:B9')
    ->mergeCells('C7:C9')
    ->mergeCells('D7:E7')
    ->mergeCells('D8:D9')
    ->mergeCells('E8:E9')
    ->mergeCells('F7:F9')
    ->mergeCells('G7:G9')
    ->mergeCells('H7:H9')
    ->mergeCells('I7:K7')
    ->mergeCells('I8:I9')
    ->mergeCells('J8:K8')
    ->mergeCells('L7:L9')
    ->mergeCells('M7:M9')
    ->mergeCells('N7:N9')
    ->mergeCells('O7:O9');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('KIB A Irigasi');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ExportKIBA.xlsx"');
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
