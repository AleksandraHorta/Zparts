<?php

        require('../fpdf/tfpdf.php');
        // Database Connection 
        $conn = new mysqli('localhost', 'root', '1program4*al', 'zparts');
        //Check for connection error
        if(!$conn) {
            die("Error: " .mysqli_connect_error());
        }
        // Select data from MySQL database
        $result = $conn->query("SELECT * FROM users ORDER BY `name`");
        $pdf = new tFPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        while($row = $result->fetch_object()){
        $id = $row->id;
        $name = $row->name;
        $phone = $row->phone;
        $email = $row->email;
        $pdf->Cell(10,10,$id,1);
        $pdf->Cell(30,10,$name,1);
        $pdf->Cell(40,10,$phone,1);
        $pdf->Cell(80,10,$email,1);
        $pdf->Ln();
        }
        $pdf->Output();
        
?>

