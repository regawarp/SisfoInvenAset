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

/*$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'No')
    ->mergeCells('A1:A3')
    ->setCellValue('B1', 'Nama Daerah Irigasi')
    ->mergeCells('B1:B3')
    ->setCellValue('C1', 'Areal (Ha)')
    ->mergeCells('C1:C3')
    ->setCellValue('D1', 'Panjang (m)')
    ->mergeCells('D1:D3')
    ->setCellValue('E1', 'Lebar rata-rata (m)')
    ->mergeCells('E1:E3')
    ->setCellValue('F1', 'Panjang Tiap Kondisi')
    ->mergeCells('F1:M1')
    ->setCellValue('F2', 'Baik')
    ->mergeCells('F2:G2')
    ->setCellValue('H2', 'Sedang')
    ->mergeCells('H2:I2')
    ->setCellValue('J2', 'Rusak Ringan')
    ->mergeCells('J2:K2')
    ->setCellValue('L2', 'Rusak Berat')
    ->mergeCells('L2:M2')
    ->setCellValue('F3', 'm')
    ->setCellValue('G3', '%')
    ->setCellValue('H3', 'm')
    ->setCellValue('I3', '%')
    ->setCellValue('J3', 'm')
    ->setCellValue('K3', '%')
    ->setCellValue('L3', 'm')
    ->setCellValue('M3', '%')
    ->setCellValue('N1', 'Rencana Penanganan')
    ->mergeCells('N1:N3')
    ->setCellValue('O1', 'Kebutuhan Anggaran (Milyar)')
    ->mergeCells('O1:O3')
    ->setCellValue('P1', 'Kemampuan')
    ->mergeCells('P1:Q1')
    ->setCellValue('P2', 'Rp. (Milyar)')
    ->mergeCells('P2:P3')
    ->setCellValue('Q2', 'm')
    ->mergeCells('Q2:Q3')
    ->setCellValue('R1', 'Usulan Pendanaan Tambahan')
    ->mergeCells('R1:T1')
    ->setCellValue('R2', 'Rp. (Milyar)')
    ->mergeCells('R2:R3')
    ->setCellValue('S2', 'm')
    ->mergeCells('S2:S3')
    ->setCellValue('T2', 'Sumber Dana')
    ->mergeCells('T2:T3');
*/

// HEADER
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'No')
    ->setCellValue('B1', 'Nama Daerah Irigasi')
    ->setCellValue('C1', 'Areal (Ha)')
    ->setCellValue('D1', 'Panjang (m)')
    ->setCellValue('E1', 'Lebar rata-rata (m)')
    ->setCellValue('F1', 'Panjang Tiap Kondisi')
    ->setCellValue('F2', 'Baik')
    ->setCellValue('H2', 'Sedang')
    ->setCellValue('J2', 'Rusak Ringan')
    ->setCellValue('L2', 'Rusak Berat')
    ->setCellValue('F3', 'm')
    ->setCellValue('G3', '%')
    ->setCellValue('H3', 'm')
    ->setCellValue('I3', '%')
    ->setCellValue('J3', 'm')
    ->setCellValue('K3', '%')
    ->setCellValue('L3', 'm')
    ->setCellValue('M3', '%')
    ->setCellValue('N1', 'Rencana Penanganan')
    ->setCellValue('O1', 'Kebutuhan Anggaran (Milyar)')
    ->setCellValue('P1', 'Kemampuan')
    ->setCellValue('P2', 'Rp. (Milyar)')
    ->setCellValue('Q2', 'm')
    ->setCellValue('R1', 'Usulan Pendanaan Tambahan')
    ->setCellValue('R2', 'Rp. (Milyar)')
    ->setCellValue('S2', 'm')
    ->setCellValue('T2', 'Sumber Dana');

// DATA
$rowExcel = 5;
$JML_PANJANG = 0;
$JML_PANJANG_BAIK_M = 0;
$JML_PANJANG_BAIK_PERS = 0;
$JML_PANJANG_SEDANG_M = 0;
$JML_PANJANG_SEDANG_PERS = 0;
$JML_PANJANG_RUSAKRINGAN_M = 0;
$JML_PANJANG_RUSAKRINGAN_PERS = 0;
$JML_PANJANG_RUSAKBERAT_M = 0;
$JML_PANJANG_RUSAKBERAT_PERS = 0;
$JML_KEBUTUHAN_ANGGARAN = 0;
$JML_KEMAMPUAN_RUPIAH = 0;
$JML_KEMAMPUAN_M = 0;
$JML_USULAN_TAMBAHAN_RUPIAH = 0;
$JML_USULAN_TAMBAHAN_M = 0;
$conn = mysqli_connect("localhost", "root", "", "db_pupr");
$sql = "SELECT * FROM dak";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $rowExcel, $rowExcel - 4)
            ->setCellValue('B' . $rowExcel, $row['NAMA_DAK'])
            ->setCellValue('C' . $rowExcel, $row['LUAS'])
            ->setCellValue('D' . $rowExcel, $row['PANJANG'])
            ->setCellValue('E' . $rowExcel, $row['LEBAR'])
            ->setCellValue('F' . $rowExcel, $row['PANJANG_BAIK_M'])
            ->setCellValue('G' . $rowExcel, $row['PANJANG_BAIK_PERS'])
            ->setCellValue('H' . $rowExcel, $row['PANJANG_SEDANG_M'])
            ->setCellValue('I' . $rowExcel, $row['PANJANG_SEDANG_PERS'])
            ->setCellValue('J' . $rowExcel, $row['PANJANG_RUSAKRINGAN_M'])
            ->setCellValue('K' . $rowExcel, $row['PANJANG_RUSAKRINGAN_PERS'])
            ->setCellValue('L' . $rowExcel, $row['PANJANG_RUSAKBERAT_M'])
            ->setCellValue('M' . $rowExcel, $row['PANJANG_RUSAKBERAT_PERS'])
            ->setCellValue('N' . $rowExcel, $row['RENCANA_PENANGANAN'])
            ->setCellValue('O' . $rowExcel, $row['KEBUTUHAN_ANGGARAN'])
            ->setCellValue('P' . $rowExcel, $row['KEMAMPUAN_RUPIAH'])
            ->setCellValue('Q' . $rowExcel, $row['KEMAMPUAN_M'])
            ->setCellValue('R' . $rowExcel, $row['USULAN_TAMBAHAN_RUPIAH'])
            ->setCellValue('S' . $rowExcel, $row['USULAN_TAMBAHAN_M'])
            ->setCellValue('T' . $rowExcel, $row['USULAN_TAMBAHAN_SUMBER_DANA']);
        $rowExcel++;
        $JML_PANJANG += $row['PANJANG'];
        $JML_PANJANG_BAIK_M += $row['PANJANG_BAIK_M'];
        $JML_PANJANG_BAIK_PERS += $row['PANJANG_BAIK_PERS'];
        $JML_PANJANG_SEDANG_M += $row['PANJANG_SEDANG_M'];
        $JML_PANJANG_SEDANG_PERS += $row['PANJANG_SEDANG_PERS'];
        $JML_PANJANG_RUSAKRINGAN_M += $row['PANJANG_RUSAKRINGAN_M'];
        $JML_PANJANG_RUSAKRINGAN_PERS += $row['PANJANG_RUSAKRINGAN_PERS'];
        $JML_PANJANG_RUSAKBERAT_M += $row['PANJANG_RUSAKBERAT_M'];
        $JML_PANJANG_RUSAKBERAT_PERS += $row['PANJANG_RUSAKBERAT_PERS'];
        $JML_KEBUTUHAN_ANGGARAN += $row['KEBUTUHAN_ANGGARAN'];
        $JML_KEMAMPUAN_RUPIAH += $row['KEMAMPUAN_RUPIAH'];
        $JML_KEMAMPUAN_M += $row['KEMAMPUAN_M'];
        $JML_USULAN_TAMBAHAN_RUPIAH += $row['USULAN_TAMBAHAN_RUPIAH'];
        $JML_USULAN_TAMBAHAN_M += $row['USULAN_TAMBAHAN_M'];
    }
} else { }
mysqli_close($conn);

$lastRow = $rowExcel + 1;

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('B' . $lastRow, 'JUMLAH')
    ->setCellValue('D' . $lastRow, '' . $JML_PANJANG)
    ->setCellValue('F' . $lastRow, '' . $JML_PANJANG_BAIK_M)
    ->setCellValue('G' . $lastRow, '' . $JML_PANJANG_BAIK_PERS)
    ->setCellValue('H' . $lastRow, '' . $JML_PANJANG_SEDANG_M)
    ->setCellValue('I' . $lastRow, '' . $JML_PANJANG_SEDANG_PERS)
    ->setCellValue('J' . $lastRow, '' . $JML_PANJANG_RUSAKRINGAN_M)
    ->setCellValue('K' . $lastRow, '' . $JML_PANJANG_RUSAKRINGAN_PERS)
    ->setCellValue('L' . $lastRow, '' . $JML_PANJANG_RUSAKBERAT_M)
    ->setCellValue('M' . $lastRow, '' . $JML_PANJANG_RUSAKBERAT_PERS)
    ->setCellValue('O' . $lastRow, '' . $JML_KEBUTUHAN_ANGGARAN)
    ->setCellValue('P' . $lastRow, '' . $JML_KEMAMPUAN_RUPIAH)
    ->setCellValue('Q' . $lastRow, '' . $JML_KEMAMPUAN_M)
    ->setCellValue('R' . $lastRow, '' . $JML_USULAN_TAMBAHAN_RUPIAH)
    ->setCellValue('S' . $lastRow, '' . $JML_USULAN_TAMBAHAN_M);


// STYLING HEADER
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:T3')->applyFromArray(
    array(
        'fill' => array( // FILL CELL
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'BFBFBF')
        ),
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

// STYLING ISI
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A4:T' . $rowExcel)->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

// Calculate the column widths
foreach (range('A', 'T') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}
$objPHPExcel->getActiveSheet()->calculateColumnWidths();

// Set setAutoSize(false) so that the widths are not recalculated
foreach (range('A', 'T') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(false);
}

// MERGE
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:A3')
    ->mergeCells('B1:B3')
    ->mergeCells('C1:C3')
    ->mergeCells('D1:D3')
    ->mergeCells('E1:E3')
    ->mergeCells('F1:M1')
    ->mergeCells('F2:G2')
    ->mergeCells('H2:I2')
    ->mergeCells('J2:K2')
    ->mergeCells('L2:M2')
    ->mergeCells('N1:N3')
    ->mergeCells('O1:O3')
    ->mergeCells('P1:Q1')
    ->mergeCells('P2:P3')
    ->mergeCells('Q2:Q3')
    ->mergeCells('R1:T1')
    ->mergeCells('R2:R3')
    ->mergeCells('S2:S3')
    ->mergeCells('T2:T3');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('DAK');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ExportDAK.xlsx"');
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
