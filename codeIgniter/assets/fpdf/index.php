<?php

    $mysql = new mysqli("localhost", "carimount", "chazard10.3", "rwanda");
    $mysql->set_charset("utf8");

    $query = $mysql->query("SELECT * from villages LIMIT 3") or die($mysql->error);

    require("../../6.9/FPDF/fpdf.php");
    $pdf =  new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);

    while ($village = $query->fetch_assoc()) {
        $line=0;
        $pdf->Cell(40,10,$village["villageName"],1,$line,'C');
        $pdf->Cell(40,10,$village["cellId"],1,$line,'C');
        $pdf->Cell(40,10,$village["villageId"],1,$line,'C');
        $line++;
    }

    $pdf->Output();
    echo "Done";
    $mysql->close();
?>