<?php
// No Direct Access
defined( '_JEXEC' ) or die;
//JLoader::register('JHtmlString', JPATH_LIBRARIES.'/joomla/html/html/string.php');
//JHTML::_('string.truncate', $cck->getValue('art_introtext'), 85);
$newsDate = new DateTime($cck->getValue('art_created'));
if ($cck->getValue('art_image_intro') && $cck->getValue('news_video')) {
	$figure = $cck->renderField('news_video');
} elseif (!$cck->getValue('art_image_intro') && $cck->getValue('news_video')) {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('art_image_intro') && !$cck->getValue('news_video')) {
	$figure = '<img src="' . $cck->getValue('art_image_intro') . '" alt="' . $cck->getValue('art_image_intro_alt') . '" />';
} elseif ($cck->getValue('art_image_intro') == '' && !$cck->getValue('news_video')) {
	$figure = '<img src="images/news/volker-saar-kein-bild-klein.png" alt="Volker Saar - kein Bild vorhanden" />';
}
include_once "trunCate.php";
//echo $cck->getValue('news_video');
?>

<article class="article news intro clearfix grid-item one-half">
	<figure class="img-left">
		<?php echo $figure; ?>
	</figure>
	<div class="article-body">
		<header>
			<h1><?php echo $cck->getValue('art_title'); ?></h1>
		</header>
		<?php //echo trunCate($cck->getValue('art_introtext'), 80); ?>
		<?php echo $cck->getValue('art_introtext'); ?><br/>
	</div>
</article>
