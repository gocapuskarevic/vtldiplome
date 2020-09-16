
<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;


$fn = fopen('takmicari.csv',"r");
  while (!feof($fn)) {
    $dompdf = new Dompdf();
    $dompdf->set_option('chroot', 'C:\wamp64\www\vtldiplome');
    $dompdf->set_option('defaultMediaType', 'all');
    $tmp = explode(',',fgets($fn));
    $name = $tmp[2];
    $length = $tmp[11];
    $time = $tmp[5];
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
            <h2>'.$name.'</h2>
            <div class="data">
              <p class="left">Staza : '.$length.'</p>
              <p class="right">Vreme : '.$time.'</p>
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

    $output_pdf = $dompdf->output();

    file_put_contents('diplome/'.$name.'.pdf', $output_pdf);
    unset($dompdf);
}
fclose($fn); 


?> 
