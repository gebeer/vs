<?php
// No Direct Access
defined( '_JEXEC' ) or die;
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


$category = $cck->getValue('news_category');
switch ($category) {
	case '19': //News Detailseite Template
$newsDate = new DateTime($cck->getValue('art_created'));
if ($cck->getValue('art_image_fulltext') != '' && $cck->getValue('news_video') == '') {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
} elseif ($cck->getValue('news_video') == '' && $cck->getValue('art_image_fulltext') != '') {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
}  elseif ($cck->getValue('news_video') != '' && $cck->getValue('art_image_fulltext') != '') {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('news_video') != '' && $cck->getValue('art_image_fulltext') == '') {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('art_image_fulltext') == '' && !$cck->getValue('news_video')) {
	$figure = '<img src="images/news/volker-saar-kein-bild-gross.png" alt="Volker Saar - kein Bild vorhanden" />';
}
?>
<a class="boldit black left" href="<?php echo JRoute::_('index.php?option=com_cck&view=list'); ?>" title="Zurück zur News-Übersicht">Zurück zur News-Übersicht</a>
<br /><br />
<section>
	<header class="page-header">
		<h2 class="black">News</h2>
	</header>
<article class="article news">
	<div class="article-body grid-item six-tenths">
		<div class="inner">
		<header>
			<h1 class="blue"><?php echo $cck->getValue('art_title'); ?></h1>
			<p><span class="date"><?php echo $newsDate->format('d.m.Y'); ?></span> | <span class="author"><a href="https://plus.google.com/104297445898014737508/posts?rel=author" title="<?php echo $cck->renderField('art_created_by'); ?>"><?php echo $cck->renderField('art_created_by'); ?></a></span><p>
			<div class="socialicons">
				<span class='st_facebook_custom socicon' displayText='Facebook'></span>
				<span class='st_google_bmarks_custom socicon' ></span>
			</div>
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
<?php		break;
	
	case '20': //Termine Detailseite template (noch nicht vorhanden)
		//include "mainbody-termine.php";
		break;
	
	case '21': //Presse Detailseite Template
$newsDate = new DateTime($cck->getValue('art_created'));
if ($cck->getValue('art_image_fulltext') != '' && $cck->getValue('news_video') == '') {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
} elseif ($cck->getValue('news_video') == '' && $cck->getValue('art_image_fulltext') != '') {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
}  elseif ($cck->getValue('news_video') != '' && $cck->getValue('art_image_fulltext') != '') {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('news_video') != '' && $cck->getValue('art_image_fulltext') == '') {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('art_image_fulltext') == '' && !$cck->getValue('news_video')) {
	$figure = '<img src="images/news/volker-saar-kein-bild-gross.png" alt="Volker Saar - kein Bild vorhanden" />';
}
?>
<a class="boldit black left" href="<?php echo JRoute::_('index.php?option=com_cck&view=list'); ?>" title="Zurück zur Presse-Übersicht">Zurück zur Presse-Übersicht</a>
<br /><br />
<section>
	<header class="page-header">
		<h2 class="black">Presse</h2>
	</header>
<article class="article news">
	<div class="article-body grid-item six-tenths">
		<div class="inner">
		<header>
			<h1 class="blue"><?php echo $cck->getValue('art_title'); ?></h1>
			<p><span class="date"><?php echo '<span>' . $newsDate->format('d.m.Y'); ?></span> | <span class="author"><a href="https://plus.google.com/104297445898014737508/posts?rel=author" title="<?php echo $cck->renderField('art_created_by'); ?>"><?php echo $cck->renderField('art_created_by'); ?></a></span><p>
			<div class="socialicons">
				<span class='st_facebook_custom socicon' displayText='Facebook'></span>
				<span class='st_google_bmarks_custom socicon' ></span>
			</div>
		</header>
		<?php echo $cck->getValue('art_fulltext'); ?>
		<?php if ($cck->getValue('presse_file')) { ?>
		<p><a class="btn" href="<?php echo $cck->getValue('presse_file'); ?>" title="<?php echo $cck->getValue('presse_file') ?>">Informationen als PDF herunterladen</a></p>
		<?php } ?>
		</div>
	</div>
	<figure class="grid-item four-tenths">
	<?php echo $figure; ?>
	</figure>
</article>
</section>
<a class="boldit left" href="<?php echo JRoute::_('index.php?option=com_cck&view=list'); ?>" title="Zurück zur Presse-Übersicht">Zurück zur Presse-Übersicht</a>
<?php		break;
	case '28': // Wichtig fuer Sie  Detailseite Template
$newsDate = new DateTime($cck->getValue('art_created'));
if ($cck->getValue('art_image_fulltext') != '' && $cck->getValue('news_video') == '') {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
} elseif ($cck->getValue('news_video') == '' && $cck->getValue('art_image_fulltext') != '') {
	$figure = '<img src="' . $cck->getValue('art_image_fulltext') . '" alt="' . $cck->getValue('art_image_fulltext_alt') . '" />';
}  elseif ($cck->getValue('news_video') != '' && $cck->getValue('art_image_fulltext') != '') {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('news_video') != '' && $cck->getValue('art_image_fulltext') == '') {
	$figure = $cck->renderField('news_video');
} elseif ($cck->getValue('art_image_fulltext') == '' && !$cck->getValue('news_video')) {
	$figure = '<img src="images/news/volker-saar-kein-bild-gross.png" alt="Volker Saar - kein Bild vorhanden" />';
}
?>
<article class="article news">
	<div class="article-body grid-item six-tenths">
		<div class="inner">
		<header>
			<h2 class="black"><?php echo $cck->getValue('art_title'); ?></h2>
			<p>&nbsp;<p>
		</header>
		<?php echo $cck->getValue('art_fulltext'); ?>
		</div>
	</div>
	<figure class="grid-item four-tenths">
	<?php echo $figure; ?>
	</figure>
</article>
<?php		break;
	
}

?>
<script type="text/javascript">
stLight.options({
	publisher: "05be0bc3-91b2-4883-ba22-b5fa5e7b7812",
});
</script>
