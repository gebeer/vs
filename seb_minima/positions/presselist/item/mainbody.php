<?php
// No Direct Access
defined( '_JEXEC' ) or die;
include_once "trunCate.php";
$newsDate = new DateTime($cck->getValue('art_created'));
if ($cck->getValue('art_image_intro') != '' && $cck->getValue('news_video') == '') {
	$figure = '<img src="' . $cck->getValue('art_image_intro') . '" alt="' . $cck->getValue('art_image_intro_alt') . '" />';
} elseif ($cck->getValue('news_video') == '' && $cck->getValue('art_image_intro') != '') {
	$figure = '<img src="' . $cck->getValue('art_image_intro') . '" alt="' . $cck->getValue('art_image_intro_alt') . '" />';
}  elseif ($cck->getValue('news_video') != '' && $cck->getValue('art_image_intro') != '') {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('news_video') != '' && $cck->getValue('art_image_intro') == '') {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('art_image_intro') == '' && !$cck->getValue('news_video')) {
	$figure = '<img src="images/news/volker-saar-kein-bild-klein.png" alt="Volker Saar - kein Bild vorhanden" />';
}
if (strlen($cck->getValue('art_introtext')) <= 200) {
	$introtext = $cck->getValue('art_introtext');
} else {
	$introtext = trunCate($cck->getValue('art_introtext'), 200);
}
?>

<article class="article news intro clearfix">
	<figure class="img-left">
		<?php echo $figure; ?>
	</figure>
	<div class="article-body">
		<header>
			<h1 class="blue"><?php echo '<span>' . $newsDate->format('d.m.Y') . ' |</span> ' . $cck->getValue('art_title'); ?></h1>
		</header>
		<?php echo $introtext; ?>
		<p><a class="boldit" href="<?php echo $cck->get('news_read_more')->link; ?>" title="Mehr Informationen zu <?php echo $cck->getValue('art_title'); ?>">Mehr Informationen</a></p>
	</div>
</article>