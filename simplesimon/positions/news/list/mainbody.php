<?php
// No Direct Access
defined( '_JEXEC' ) or die;

/*$semTitle = $cck->getValue('art_title');
$semDatStart = new DateTime($cck->getValue('sem_date_start'));
$semDatEnd = new DateTime($cck->getValue('sem_date_end'));
$semThema = $cck->getValue('sem_thema');
$semOrt = $cck->getValue('sem_ort');
$semHinweis = $cck->getValue('sem_hinweis');
$semPlaetze = $cck->getValue('sem_plaetze');
$semAnmForm = $cck->get('sem_anm_form')->link;
$semDetailLink = $cck->get('art_title')->link;

if ($semDatStart->format('d.m.Y') == $semDatEnd->format('d.m.Y')) {
	$semDatZeit = $semDatStart->format('d.m.Y') . ' um ' . $semDatStart->format('H:i') . ' - ' . $semDatEnd->format('H:i');	
} else {
	$semDatZeit = $semDatStart->format('d.m.Y') . ' um ' . $semDatStart->format('H:i') . ' bis ' . $semDatEnd->format('d.m.Y') . ' um ' . $semDatEnd->format('H:i');
}
*/
$category = $cck->getValue('news_category');
switch ($category) {
	case '19':
		include "mainbody-news.php";
		break;
	
	case '20':
		include "mainbody-termine.php";
		break;
	
	case '21':
		include "mainbody-presse.php";
		break;
	
}


?>
