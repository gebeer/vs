<?php
// No Direct Access
defined( '_JEXEC' ) or die;

$newsDate = new DateTime($cck->getValue('art_created'));
if ($cck->getValue('art_image_fulltext') && $cck->getValue('news_video')) {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('art_image_fulltext') && !$cck->getValue('news_video')) {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
} elseif ($cck->getValue('art_image_fulltext') == '' && !$cck->getValue('news_video')) {
	$figure = '<img src="images/news/volker-saar-kein-bild-gross.png" alt="Volker Saar - kein Bild vorhanden" />';
}
?>
<section>
	<header class="page-header">
		<h2 class="black">News</h2>
	</header>
<article class="article news">
	<div class="article-body grid-item six-tenths">
		<div class="inner">
		<header>
			<h1 class="blue"><?php echo $cck->getValue('art_title'); ?></h1>
			<p><span class="date"><?php echo '<span>' . $newsDate->format('d.m.Y'); ?></span> | <span class="author"><?php echo $cck->renderField('art_created_by'); ?></span><p>
		</header>
		<?php echo $cck->getValue('art_fulltext'); ?>
		</div>
	</div>
	<figure class="grid-item four-tenths">
	<?php echo $figure; ?>
	</figure>
</article>
</section>
<a class="boldit left" href="<?php echo JRoute::_('index.php?option=com_cck&view=list'); ?>" title="Zurück zur News-Übersicht">Zurück zur News-Übersicht</a>
