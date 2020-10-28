
<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$kolo = 'za učešće u V kolu Vojvođanske Treking Lige';

$dompdf = new Dompdf();
$dompdf->set_option('chroot', 'C:\wamp64\www\vtldiplome');
$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);

$html = file_get_contents('zasavica2020.html');

/*$html = '<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="stylesdva.css" />
  <meta charset="UTF-8">
</head>
<body>
  <div class="wrapper">
    <div class="content">
      <!-- <div class="logo">
        <img src="vtl.png" alt="" class="left">
        <img src="bukovac.png" alt="" class="right">
      </div> -->
      <div class="left-side left">
        
      </div>
      <div class="right-side right">
        <h1>DIPLOMA</h1>
        <h3 style="margin-top:-70px">dodeljuje planinarski sportski klub "Spartak" iz Subotice</h3>
        <h2>Gordana Puskarevci</h2>
        <h3>za učešće u VI kolu Vojvođanske Treking Lige</h3>
        
        <div class="data">
          <p><span>STAZA</span> : 34.6KM <span id="second">VREME</span> : 08:35:22</p>
        </div>
        <div class="date">
          <p>Subotica, 10.10.2020.</p>
        </div>
        <div class="logo">
          <img src="spartak.png" style="width: 160px;margin-right: 15px;">
          <img src="vtlzasuboticu.png" style="margin-right: -18px;">
        </div>
      </div>
    </div>
  </div>
</body>
</html>';*/

$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'landscape');


$dompdf->render();


$dompdf->stream('name',array('Attachment'=>0));

/*
$dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $output_pdf = $dompdf->output();

    file_put_contents('diplome/'.$name.'.pdf', $output_pdf);
    unset($dompdf);
*/
?> 
