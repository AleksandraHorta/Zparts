<?php

$mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

if(!$mysql) {
    die("Error: " . mysqli_connect_error());
}

        $service = $_POST['service'];
        $client = $_POST['client'];
        $address = $_POST['address'];
        $driver = $_POST['driver'];
        $car = $_POST['car'];
        $notes = $_POST['notes'];
        $mechanician = $_POST['mechanician'];



        $result = $mysql->query("SELECT avgPrice FROM services WHERE serviceName = '$service';");

        if ($result === false) {
            die("Error: " . $mysql->error);
        }


        while ($row = $result->fetch_assoc()) {
            $totalPrice = $row['avgPrice'];
        }


        $pvn = $totalPrice *21/100;

        $noPVN = $totalPrice - $pvn;


        $currentDate = date("Y/m/d  H:i:s");
        $futureDate = date('d/m/Y', strtotime($currentDate . ' + 7 days'));


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


        $number = random_int(100000, 999999);


    require('../fpdf/tfpdf.php');

    $pdf = new tFPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu', '', 11);

    
    // $code  get from db or write in (6 numbers)
    $pdf->Cell(0, 7, "Darba uzdevums Nr. $number", 0, 0, 'C');  // 7 is a distance from the top
    $pdf->Ln();
    $pdf->Cell(0, 8, getFullDate(), 0, 0, 'C');
    $pdf->Ln();

    $pdf->SetFont('DejaVu', '', 10);
    $pdf->Cell(0, 25, '                    Firmas nosaukums:  SIA "ZPARTS.LV"  LV40203062560 ', 0, 0);
    $pdf->Ln(6);
    $pdf->Cell(0, 25, '                                      Adrese:  Augusta Deglava 102, Rīga, LV-1082', 0, 0);

    $pdf->Ln(15);

    $pdf->Cell(0, 25, "                                      Klients: $client", 0, 0);
    $pdf->Ln(6);
    $pdf->Cell(0, 25, "                                Izs. Adrese:  $address", 0, 0);
    $pdf->Cell(0, 25, '                     Tālruņa Nr.: ', 0, 0);
    $pdf->Ln(6);
    $pdf->Cell(0, 25, "           Tr.līdzekļa valsts re. Nr.: $car", 0, 0);
    $pdf->Ln(6);
    $pdf->Cell(0, 25, '                      Nobraukums, km: ', 0, 0);
    $pdf->Ln(6);
    $pdf->Cell(0, 25, "         Vadītājs (Vārds, Uzvārds):  $driver", 0, 0);
    $pdf->Ln(6);
    $pdf->Cell(0, 25, "                                   Piezīmes:  $notes", 0, 0);

    $pdf->Ln(3);

    $pdf->SetFont('DejaVu', '', 9);
    $pdf->Line(20,99,190,99); // 2nd and 4th is height of start and end points
    $pdf->Ln(13);
    $pdf->Cell(0, 25, '               Preču nosaukums                                                Skaits             Cena ar PVN            PVN, 21%           Cena bez PVN', 0);
    $pdf->Ln(1);
    $pdf->Cell(0, 38, "               $service                                                             1                        $totalPrice                  $pvn                       $noPVN", 0);
    $pdf->Line(20,109,190,109);
    $pdf->Ln(15);
    $pdf->Line(20,115,190,115);
    $pdf->Line(20,121,190,121);
    $pdf->Line(20,127,190,127);
    $pdf->Line(20,133,190,133);

    $pdf->Ln(25);

    $pdf->SetFont('DejaVu', '', 11);
    $pdf->Cell(0, 25, "                                                                                                                  Kopā apmaksai, EUR: $totalPrice", 0);
    $pdf->Ln(20);
    
    $pdf->SetFont('DejaVu', '', 8);
    $pdf->Cell(0, 25, "             Lūdzam apmaksāt līdz $futureDate Prece ir ZPARTS.LV SIA īpašums līdz pilnīgai apmaksas saņemšanai. Ja rēķins netiek savlaicīgi", 0);
    $pdf->Ln(4);
    $pdf->Cell(0, 25, "                apmaksāts, tiek noteiktas soda sankcijas saskaņā ar līgumu vai 0.5% no kopējās pavadzīmes summas dienā, ja līguma nav.", 0);
     

    $pdf->Ln(40);
    
    $pdf->SetFont('DejaVu', '', 9);
    $pdf->Write(2, "                                             Meistars: $mechanician");
    $pdf->Write(2, "                                                Klients: $driver");
    $pdf->Ln(4);
    $pdf->Write(2,'                                             Datums:   ');
    $pdf->Write(2, getFullDate());
    $pdf->Write(2,'                                             Datums:   ');
    $pdf->Write(2, getFullDate());
    $pdf->Ln(10);
    $pdf->Write(2,'                                             Paraksts:  __________________                                                 Paraksts:  __________________ ');





    $pdf->Ln(40);
    $pdf->Write(2, '                   www.zparts.lv                                                 +371 28888111                                                info@zparts.lv'); 
    
    $pdf->Image('../images/favicon.png',96,272,10);


    $filename = "invoice" . $number . ".php";
    $code = "<?php\n" . file_get_contents(__FILE__);
    $code = $mysql->real_escape_string($code);

    $mysql->query("INSERT INTO pdfiles (filename, code, date, type) VALUES ('$filename', '$code', '$currentDate', 'invoice')");

    $pdf->Output("darbaUzdevums", "I");  // without this line it will not work


?>