<?php defined('BASEPATH') OR exit('No direct script access allowed');

define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once(dirname(__FILE__) . '/dompdf_v2.1/autoload.inc.php');
use Dompdf\Dompdf;
class Pdf_view{
	public function load_view($html,$filename){
		   		
		   $dompdf = new Dompdf();
		   $dompdf->load_html($html);
		   $dompdf->set_paper('A4', 'potret');
		   $dompdf->render();
		   $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
	}
}
