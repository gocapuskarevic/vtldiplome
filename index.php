
<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;


$dompdf = new Dompdf();
$dompdf->set_option('chroot', 'C:\wamp64\www\vtldiplome');
$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);

//$html = file_get_contents('diploma.html');

$html = '
<html>
  <head>
    <link rel="stylesheet" type="text/css" media="all" href="styles.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="content">
        <div class="logo">
          <img src="vtl.png" alt="" class="left">
          <img src="bukovac.png" alt="" class="right">
        </div>
        <h1>DIPLOMA</h1>
        <h2>Goran Žigić</h2>
        <div class="data">
          <p class="left">Staza : 35.7km</p>
          <p class="right">Vreme : 08:35:22</p>
        </div>
        <div class="date">
          <p>Bukovac, 12.09.2020.</p>
        </div>
      </div>
    </div>
  </body>
</html>';

$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'landscape');


$dompdf->render();


$dompdf->stream('name',array('Attachment'=>0));
?> 
