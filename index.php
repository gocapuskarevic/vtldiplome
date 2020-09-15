
<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;


$dompdf = new Dompdf();
$dompdf->set_option('chroot', 'C:\wamp64\www\vtldiplome');
$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);

$html = file_get_contents('diploma.html');
$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'landscape');


$dompdf->render();


$dompdf->stream('name',array('Attachment'=>0));
?> 
