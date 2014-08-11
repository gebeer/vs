<?php
// No Direct Access
defined( '_JEXEC' ) or die;
$blogDate = new DateTime($cck->getValue('art_created'));
$termMonth = $blogDate->getTimestamp();
setlocale(LC_TIME, "de_DE");

// share links stuff
$doc = JFactory::getDocument();
$array_search=array("'", '"');
$array_replace=array("&#39;","&#34;");
$itemurl = JURI::current();
$doc->addCustomTag( "<meta property='og:url' content='".$itemurl."'>" );
$description = mb_substr(strip_tags($cck->getValue('art_fulltext')), 0, 200) . ' &hellip;';
$doc->addCustomTag( "<meta property='og:description' content='". str_replace($array_search, $array_replace, $description) ."'>" );
$doc->addCustomTag( "<meta property='og:title' content='" . $cck->getValue('art_title') . "'>" );
if ($cck->getValue('art_image_fulltext')) {
	$doc->addCustomTag( "<meta property='og:image' content='" . JURI::base() . $cck->getValue('art_image_fulltext') . "'>" );
} else {
	$doc->addCustomTag( "<meta property='og:image' content='" . JURI::base() . "images/news/volker-saar-kein-bild-gross.png" . "'>" );
}
$doc->addScript('http://w.sharethis.com/button/buttons.js');


if ($cck->getValue('art_image_fulltext') != '' && $cck->getValue('blog_video') == '') {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
} elseif ($cck->getValue('blog_video') == '' && $cck->getValue('art_image_fulltext') != '') {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
}  elseif ($cck->getValue('blog_video') != '' && $cck->getValue('art_image_fulltext') != '') {
	$figure = $cck->renderField('blog_video');
} elseif ($cck->getValue('blog_video') != '' && $cck->getValue('art_image_fulltext') == '') {
	$figure = $cck->renderField('blog_video');
} elseif ($cck->getValue('art_image_fulltext') == '' && !$cck->getValue('blog_video')) {
	$figure = '';
}
?>

<a class="boldit black left" href="<?php echo JRoute::_('index.php?option=com_cck&view=list'); ?>" title="Zurück zur Übersicht">Zurück zur Übersicht</a>
<br /><br />
<article class="article blog">
	<header>
		<h1><?php echo $cck->getValue('art_title'); ?></h1>
		<p><?php echo strftime("%B", $termMonth) . ' ' . $blogDate->format('d, Y') . ' <span>|</span> Autor: ' . $cck->renderField('art_created_by'); ?></p>
		<div class="socialicons">
			<span class='st_facebook_custom socicon' displayText='Facebook'></span>
			<span class='st_google_bmarks_custom socicon' ></span>
		</div>
	</header>
	<?php if ($figure != '') { ?>
	<figure>
		<?php echo $figure; ?>
	</figure>
	<?php } ?>
	<div class="article-body">
		<?php echo $cck->getValue('art_fulltext'); ?>
	</div>
</article>
<a class="boldit black left" href="<?php echo JRoute::_('index.php?option=com_cck&view=list'); ?>" title="Zurück zur Übersicht">Zurück zur Übersicht</a>
<script type="text/javascript">
stLight.options({
	publisher: "05be0bc3-91b2-4883-ba22-b5fa5e7b7812",
});
</script>