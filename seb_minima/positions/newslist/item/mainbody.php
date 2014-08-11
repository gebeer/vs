<?php
// No Direct Access
defined( '_JEXEC' ) or die;

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

	case '38':
		include "mainbody-sdw.php";
		break;
	
}


?>
