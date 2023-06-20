<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="../css/timetable.css"> <!--For menu-panel style-->
    <style>
        body{
            font-family: 'Calibri';
        }


        td, th {
            border: 1px solid black;
            padding: 8px;
            font-size: 15px;
        }

        th {
            padding-top: 10px;
            padding-left: 8px;
            padding-right: 8px;
            padding-bottom: 10px;
            text-align: center;
            background-color: #BCD3EE;
            color: black;
            border: 1px solid black;
            font-size: 15px;
        }

        .block-left table {
            padding: 70px 0px 0px 320px;
        }


        .block-right {
            position: fixed;
            left: 0;
            top: 0;
            width: 72%;
            height: 100%;
            background: white;
            overflow: auto;

        }

        .b-back button {
            border: none;
            color: white;
            padding: 12px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
            text-transform: uppercase;
            background-color: #2E64FE;
            top: 3%;
            left: 24%;
            position: absolute;
        }

        

    </style>
</head>
<body>
    <div class="nav" id="navbar">
        <div class="user_reg" style="text-align: center">
            <img src="../images/favicon.png" width="100" height="95">
        </div>
        <a href="../../timetable.php">Timetable</a>
        <a href="../requests.php">Requests</a>
        <button class="dropdown-btn">DATABASES &#8595; </button>
        <div class="dropdown-container">
            <a onclick="location.href='../db/maintnancesBase.php';">Maintnance History</a>
            <a href="#" onclick="carsBase()">Cars</a>
            <a href="../db/usersBase.php">Users</a>
            <a href="../db/servicesBase.php">Our Services</a>
            <a >Details</a>
        </div>
        <a class="active" href="pdf.html">PDF</a>
        
        <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>
    </div>





    <div class="block-left">
        <div class="b-back">
            <button onclick='window.location.href="../pdf.php"'>< &nbsp;Back</button>
        </div>
    
        
    <?php

        $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

        if(!$mysql) {
            die("Error: " .mysqli_connect_error());
        }

        if ($result = $mysql->query("SELECT * FROM pdfiles ORDER BY date DESC")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<form method='GET'>"; 
            echo "<table><tr><th>ID</th><th>File</th><th>Date</th><th>Document Type</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["filename"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["type"] . "</td>";
                    echo "<td><button id='".$row['id']."' type='submit' value='".$row['id']."' name='download'> Download </button></td>"; 
                echo "</tr>";
            }
            echo "</table>";
            echo "</form>"; 
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($mysql);
        }


        if (isset($_GET['download'])) {
            $fileId = $_GET['download'];
            $fileId = $mysql->real_escape_string($fileId);
            $result = $mysql->query("SELECT filename, code FROM pdfiles WHERE id = '$fileId'");

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $filename = $row['filename'];
                $fileContent = $row['code'];

                require('../fpdf/tfpdf.php');
                $pdf = new tFPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',12);
                //$pdf->writeHTML($fileContent);
                $fileContent = $pdf->Output('S');  //$filename, 'S'
                
        
                // Set the appropriate headers for file download
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . strlen($fileContent));
        
                // Send the file content to the browser
                echo $fileContent;
                readfile($fileContent);
                exit;
            } else {
                echo "File not found.";
            }

        }

        $mysql->close();

    ?>


    </div>
    
</body>
</html>