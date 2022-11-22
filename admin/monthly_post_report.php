<?php
require('plugin/pdf/fpdf.php');


class PDF extends FPDF
{
    // Load data
    function BasicTable($header)
    {
        include('../server/api.php');
        $data = getMonthlyPostReport();

        $sum = 0;

        foreach ($header as $col)
            // $this->Cell(65, 7, $col, 1);
            // $this->Ln();
        // Data
        while ($row = mysqli_fetch_assoc($data)) {
            $sum++;
            $this->Cell(70, 6, $row['company_name'], 1);
            $this->Cell(20, 6, '#' . $row['job_id'], 1);
            $this->Cell(50, 6, $row['job_title'], 1);
            $this->Cell(50, 6, $row['closing_date'], 1);
            $this->Ln();
        }
        $this->Cell(60, 10, 'Total Post : ' . $sum, 1);

    }

}

$pdf = new PDF();
// Column headings
$header = array('Name', 'ID', 'Date');
// Data loading
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->Cell(80);
$pdf->Cell(30,10,'Nenasa Invesment',2,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'MONTHLY POST REPORT',2,0,'C');
$pdf->Ln();
$pdf->Cell(15);
$pdf->Cell(30,10,"Created date is : " .date("Y/m/d"),2,0,'C');
$pdf->Ln();
$pdf->BasicTable($header);
$pdf->Output();
?>