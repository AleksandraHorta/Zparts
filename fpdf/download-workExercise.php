<?php

    require('../fpdf/fpdf.php');

    $conn = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    if(!$conn) {
        die("Error: " .mysqli_connect_error());
    }


    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // $pdf->Image()  logotips

    /*$result = $conn->query("SELECT * FROM users ORDER BY `name`");
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

        }*/


        function getMonthName() {
            $m = date("m");

            if ($m == "01") {
                return "Janvārī";
            } else if ($m == "02") {
                return "Februārī";
            } else if ($m == "03") {
                return "Martā";
            } else if ($m == "04") {
                return "Aprīlī";
            } else if ($m == "05") {
                return "Maijā";
            } else if ($m == "06") {
                return "Jūnijā";
            } else if ($m == "07") {
                return "Jūlijā";
            } else if ($m == "08") {
                return "Augustā";
            } else if ($m == "09") {
                return "Septembrī";
            } else if ($m == "10") {
                return "Oktobrī";
            } else if ($m == "11") {
                return "Novembrī";
            } else if ($m == "12") {
                return "Decembrī";
            } else {
                return "System unexpected error!";
            }
        } 

        function getFullDate(){
            $y = (string)date("Y");
            $d = (string)date("j");  // "j" is a date without zero before
            $m = (string)getMonthName();
            return "$y. gada $d. $m";
        }


        // $code  get from db or write in (6 numbers)
    $pdf->Cell(0, 15, "Nodokļu Rēķins Nr. ", 0, 0, 'C');  // 15 is a distance from the top
    $pdf->Ln();
    $pdf->Cell(0, 0, getFullDate(), 0, 0, 'C');
    $pdf->Ln();




    $pdf->Output("client", "I");  // without this line it will not work



?>