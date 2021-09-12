<?php
/*
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->set_option('chroot', 'C:\wamp64\www\vtldiplome');

$dompdf->set_option('defaultMediaType', 'all');

$dompdf->set_option('isFontSubsettingEnabled', true);

$html = '<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="style_s21.css" />
  <meta charset="UTF-8">
</head>
<body>
  
  <div class="content">
    
  <div class="logo">
  <img src="bukovac.png">
  <img src="vtl.png">
  <!--<img class="tls" src="tls.png">-->
</div>
    <img src="bukovac2021.png" class="bgd">
    <h1>Diploma</h1>
    <h3>dodeljuje PD Vilina vodica</h3>
    <h2>Goca P</h2>
    <h3>za učešće u VI kolu Vojvođanske Treking Lige</h3>
        
    <div class="data">
      <p class="first">STAZA: 35km</p>
      <p class="second">VREME: 3:45:25</p>
    </div>
  </div>
  <div class="date">
    <p>Direktor : Bosiljka Kolarski</p>
    <p>Bukovac,&nbsp;11.09.2021.</p>
  </div>
  
</body>
</html>';

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream('name',array('Attachment'=>0));
*/

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;


$fn = fopen('takmicari.csv',"r");
  while (!feof($fn)) {
    $dompdf = new Dompdf();
    $dompdf->set_option('chroot', 'C:\wamp64\www\vtldiplome');
    $dompdf->set_option('defaultMediaType', 'all');
    $tmp = explode(',',fgets($fn));
    $name = $tmp[2];
    $length = '15.7 km';
    $time = $tmp[5];

    $html = '<html>
    <head>
      <link rel="stylesheet" type="text/css" media="all" href="style_s21.css" />
      <meta charset="UTF-8">
    </head>
    <body>
      
      <div class="content">
        
      <div class="logo">
      <img src="bukovac.png">
      <img src="vtl.png">
      <!--<img class="tls" src="tls.png">-->
    </div>
        <img src="bukovac2021.png" class="bgd">
        <h1>Diploma</h1>
        <h3>dodeljuje PD Vilina vodica</h3>
        <h2>'.$name.'</h2>
        <h3>za učešće u VI kolu Vojvođanske Treking Lige</h3>
            
        <div class="data">
          <p class="first">STAZA: 23.7km</p>
          <p class="second">VREME: '.$time.'</p>
        </div>
      </div>
      <div class="date">
        <p>Direktor : Bosiljka Kolarski</p>
        <p>Bukovac,&nbsp;11.09.2021.</p>
      </div>
      
    </body>
    </html>';
    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $output_pdf = $dompdf->output();

    file_put_contents('diplome/'.str_replace(' ','_',$name).'.pdf', $output_pdf);
    unset($dompdf);
}
fclose($fn); 

?> 