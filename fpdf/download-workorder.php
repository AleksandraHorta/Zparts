<?php

    $conn = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    if(!$conn) {
        die("Error: " .mysqli_connect_error());
    }

        $service = $_POST['service'];
        $client = $_POST['client'];
        $address = $_POST['address'];
        $driver = $_POST['driver'];
        $car = $_POST['car'];
        $notes = $_POST['notes'];
        $mechanician = $_POST['mechanician'];

        /*if ($result = $mysql->query("SELECT countryNumber,  
                                        FROM cars WHERE countryNumber = '$car';")) {
            
            $countryNumber = $row["countryNumber"];
                    

              
        } else {
            echo "Error: " . mysqli_error($mysql);
        }*/

        /*if ($result = $mysql->query("SELECT id FROM services WHERE serviceName = '$service';")) {
            $service_id = $row["id"];  
            mysqli_free_result($result);
              
        } else {
            echo "Error: " . mysqli_error($mysql);
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
    $pdf->Cell(0, 25, '               Kods                    Klienta sūdzības / pieprasījums', 0);
    $pdf->Ln(1);
    $pdf->Cell(0, 25, "                                   $service", 0);
    $pdf->Line(20,109,190,109);
    $pdf->Ln(15);
    $pdf->Line(20,115,190,115);
    $pdf->Line(20,121,190,121);
    $pdf->Line(20,127,190,127);
    $pdf->Line(20,133,190,133);

    $pdf->Ln(35);

    $pdf->SetFont('DejaVu', '', 8);
    $pdf->Cell(0, 12, 'KLIENTU IEVĒRĪBAI', 0, 0, 'C');
    $pdf->Ln(11);
    $pdf->Write(2, '         1. "ZPARTS.LV" SIA neuzņemas atbildību par automobili atstātām klientu mantām.');
    $pdf->Ln(4);
    $pdf->Write(2, '         2. Par klienta neuzrādītajiem automobila defektiem un to izraisītajām sekām "ZPARTS.LV SIA atbildību neuzņemas.');
    $pdf->Ln(4);
    $pdf->Write(2, '         3. Ja darbu veikšanai tiek izmantotas klientu piegādātas detaļas, garantija netiek dota.');
    $pdf->Ln(4);
    $pdf->Write(2, '         4. Piekrītu, ka mani personas dati tiek uzglabāti SIA "ZPARTS.LV" datu bāzēs, apstrādāti tirgus izpētes, reklāmas un klientu uzskaites');
    $pdf->Ln(4);
    $pdf->Write(2, '         nolūkiem.');
    $pdf->Ln(4);
    $pdf->Write(2, '         5. Piekrītu nomainīto automobīļa daļu utilizēšanai. Atzīmet NĒ _*, ja vēlaties tās saņemt atpakaļ.');
    $pdf->Ln(4);
    $pdf->Write(2, '              *nav iespējams saņemt garantijas remontu ietvaros nomainītās rezerves daļas.');
    $pdf->Ln(4);
    $pdf->Write(3, '         6. Automobilis pēc remonta pabeigšanas, jāizņem no "ZPARTS.LV SIA teritorijas 1 darba dienas laikā, pretējā gadījumā tiks piestādīts rēķins');
    $pdf->Ln(4);
    $pdf->Write(2, '         par katru stāvvietā nostāvēto dienu 15.00 EUR + PVN.');



    $pdf->Ln(17);
    
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
    $pdf->Output("darbaUzdevums", "I");  // without this line it will not work







?>