<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>zparts.lv - Automātisko ātrumkārbu remonts un apkope</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      *{
        font-family: 'Calibri';
      }
      body{
        overflow: auto;
        background-image: none;
        font-family: 'Calibri';
      }
      .fa-youtube {
        background: #bb0000;
        color: white;
        padding: 10px;
        font-size: 27px;
        width: 50px;
        text-align: center;
        text-decoration: none;
      }

      .fa-facebook {
        background: #3B5998;
        color: white;
      }
      .contact-us{
        border: none;
        color: white;
        padding: 17px 57px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #2E64FE;
        margin-top: 35px;
	
      }

      .article{
        padding-left: 260px;
        padding-right: 260px;
        color: black;
        text-align: left;
        font-size: 20px;
      }
      p{
        font-weight: 100;
      }

    </style>
</head>
<body>

  <nav class="nav">
  <?php
    session_start();
    if(isset($_SESSION['user']) == '') { 
  ?>
  <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
    <ul>
        <li><a id="not-logo" href="log_in.php">Log in</a></li>
        <li><a id="not-logo" target="_blank" href="user_reg.php">Sign Up</a></li>
        <li><a id="not-logo" target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
        <!--<li><a target="_blank" href="https://www.youtube.com/channel/UC7bS924mRjV5cikECAmdbEQ/featured"> Follow us on Youtube</a></li>-->
    </ul>
  <?php } else { ?>
    <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
    <ul>
        <li><a id="not-logo" href="my_profile.php">My profile</a></li>
        <!--<li><a href='../php/exit.php'>Log out</a></li>-->
        <li><a id="not-logo" href="appointment.php">Appointments  Calendar</a></li>
        <!--<li><a target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
        <li><a target="_blank" href="https://www.youtube.com/channel/UC7bS924mRjV5cikECAmdbEQ/featured"> Follow us on Youtube</a></li>-->
    </ul>
  <?php } ?>
  </nav>

  <h1 style="text-align: center; font-size: 43px; color: black;">Konfidencialitātes politika</h1>
  <div class="article">
    <br>
    <br>
    <br>
    <p>Lūdzam Jūs iepazīties ar SIA "ZPARTS.LV" konfidencialitātes politiku. Mūsu mērķis ir aizsargāt Jūsu privātuma drošību saskaņā ar VDAR jeb Vispārīgā Datu Aizsardzības Regulu.
(GDPR - General Data Protection Regulation).</p>
    <br>
    <h4 style="padding-top: 20px;">1. Vispārējie noteikumi</h4>
    <p>1.1. Šī konfidencialitātes politika apraksta, kā SIA "ZPARTS.LV", reģistrācijas numurs 40203062560, adrese: Biķernieku 262-21, Rīga, LV-1079, Latvija, (turpmāk saukti - "Mēs") iegūst, apstrādā un glabā personas datus, ko "ZPARTS.LV" iegūst no saviem klientiem un personām, kas apmeklē SIA "ZPARTS.LV" autoservisu vai interneta mājas lapu (turpmāk saukti - "Jūs").</p>
    <p>1.2. Personas dati ir jebkura informācija attiecībā uz identificētu vai identificējamu fizisku personu, t. i. datu subjektu. Apstrāde ir jebkura ar personas datiem saistīta darbība, piemēram, iegūšana, ierakstīšana, pārveidošana, izmantošana, skatīšana, dzēšana vai iznīcināšana.</p>
    <p>1.3. Jūsu personisko datu pārzinis ir SIA "ZPARTS.LV", pie kā Jūs konkrētajā gadījumā vēršaties, lai iegādātos preci vai pakalpojumu.</p>
    <p>1.4 Lūdzu, rūpīgi iepazīstieties ar konfidencialitātes politiku. Ja Jums ir kādi jautājumi vai pieprasījumi, lūdzu, sazinieties ar SIA "ZPARTS.LV";</p>
    tālrunis: +371 28888111;
    epasta adrese: info@zparts.lv

    <h4 style="padding-top: 20px;">2. Informācijas iegūšana un tās savākšanas mērķis</h4>
    <p>2.1. SIA "ZPARTS.LV" iegūst tikai to informāciju, ko Jūs paši piekritāt Mums sniegt.</p>
    <p>2.2. Mēs varam ievākt sekojošo informāciju:
    * vārds, uzvārds;
    * kontaktinformācija (tālruņa numurs, e-pasta adrese utt);
    * informācija par jūsu automobīli, ieskaitot VIN (jeb šasijas) numuru;
    * darījuma dati (darījuma laiks, iegādātās preces vai pakalpojumi, cena utt).</p>
    <p>2.3 SIA "ZPARTS.LV" neprasa sniegt pārmērīgi daudz datu bez konkrēta nolūka.</p>

    <h4 style="padding-top: 20px;">3. Personisko datu nodošana trešajām personām</h4>
    <p>3.1. SIA "ZPARTS.LV" nav tiesību nodot Jūsu personas datus trešajām personām, ja nav saņemta Jūsu atsevišķa piekrišana, izņemot saskaņā ar LR likumdošanu.</p>

    <h4 style="padding-top: 20px;">4. Personas datu glabāšana un iznīcināšana</h4>
    <p>4.1. SIA "ZPARTS.LV" glabā Jūsu personas datus tik ilgi, cik tas nepieciešams nolūkiem, kuriem šie dati tika iegūti vai cik to nosaka likums.</p>
    <p>4.2. Datus, kas iegūti, balstoties uz piekrišanu, mēs parasti glabājam līdz piekrišanas atsaukšanai vai tik ilgi, cik atrunāts piekrišanā.</p>
    <p>4.3 Beidzoties glabāšanas periodam, visi attiecīgie personas dati tiek neatgriezeniski izdzēsti no datoru sistēmām un elektroniskajiem dokumentiem, kas ir saturējuši attiecīgos personas datus, un personas datus saturošie papīra dokumenti tiek iznīcināti vai arī šie dokumenti tiek anonimizēti.</p>

    <h4 style="padding-top: 20px;">5. Tīmekļa vietnes lietošana un sīkdatnes</h4>
    <p>5.1. "ZPARTS.LV" tīmekļa vietnē apmeklētāji var saņemt informāciju par "ZPARTS.LV" pakalpojumiem, produktiem, akcijām un notiekošajām kampaņām, kā arī sazināties ar mums, pieteikties servisā vai diagnostikai un izmantot citas tīmekļa vietnes izvēlnes.</p>
    <p>5.2. "ZPARTS.LV" tīmekļa vietnē izmanto sīkdatnes. Sīkdatnes ir mazas teksta datnes, ko pārlūkprogramma saglabā Jūsu datorā vai citā ierīcē, ko izmantojat tīmekļa vietnes apmeklēšanai (tālrunis, planšetdators utt).</p>
    <p>5.3. Lietojot tīmekļa vietni, Jūs apstiprināt, ka piekrītat sīkdatņu izmantošanai.</p>
    <p>5.4. Kādiem mērķiem "ZPARTS.LV" izmanto sīkdatnes?</p>
    <p>5.4.1. Sīkdatnes galvenokārt izmanto, lai tīmekļa vietne strādātu daudz efektīvāk un nodrošinātu ērtu un individuālu lietotāja pieredzi. Piemēram, sīkdatnes saglabā datus par Jūsu veiktajām izvēlēm mūsu tīmekļa vietnē un kādas vietnes esat apmeklējis. Sīkdatnes neiegūst datus no Jūsu ierīces un nesaglabā personas datus.</p>

    <h4 style="padding-top: 20px;">6. Noteikumu mainīšana</h4>
    <p>6.1. SIA "ZPARTS.LV" patur tiesības jebkurā laikā vienpusēji grozīt konfidencialitātes politikas noteikumus un nosacījumus. Pēc izmaiņām jaunie noteikumi un nosacījumi tiek publicēti tīmekļa vietnē https://www.zparts.lv sadaļā "Konfidencialitātes politika".</p>
    <p>6.2 Konfidencialitātes politiku regulē Latvijas Republikas tiesību akti.</p>

    <h4 style="padding-top: 20px;">7. Nobeiguma noteikumi</h4>
    <p>7.1. Visas domstarpības starp pusēm par SIA "ZPARTS.LV" konfidencialitātes politiku tiek risinātas sarunu veidā. Ja vienošanās netiek panākta, strīds tiek risināts saskaņā ar LR likumdošanu.</p>
    <p>7.2 Ja Jums ir kādi jautājumi vai pieprasījumi, lūdzu, sazinieties ar SIA "ZPARTS.LV";</p>
    <p>tālrunis: +371 28888111</p>
    <p>epasta adrese: info@zparts.lv</p>

  </div>

  


  <footer>
    <div id="author">
      <p>&#169; zparts.lv<br></p>
    </div>
    
    <div id="pr-policy">
      <a href="privacypolicy.php">Privacy Policy</a>
    </div>

    <div class="links">
      <a href="#" class="fa fa-youtube"></a>
      <a href="#" class="fa fa-facebook"></a>
    </div>
    
  </footer>

</body>
</html>