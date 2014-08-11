<?php
// No Direct Access
defined( '_JEXEC' ) or die;
$blogDate = new DateTime($cck->getValue('art_created'));
$termMonth = $blogDate->getTimestamp();
setlocale(LC_TIME, "de_DE");


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

<article class="article blog intro">
	<?php if ($figure != '') { ?>
	<figure>
		<?php echo $figure; ?>
	</figure>
	<?php } ?>
	<header>
		<h1><?php echo $cck->getValue('art_title'); ?></h1>
		<p><?php echo strftime("%B", $termMonth) . ' ' . $blogDate->format('d, Y') . ' <span>|</span> Autor: ' . $cck->renderField('art_created_by'); ?></p>
	</header>
	<div class="article-body">
		<?php echo $cck->getValue('art_introtext'); ?>
		<p><a class="btn orange" href="<?php echo $cck->get('art_title')->link; ?>" title="Mehr Informationen zu <?php echo $cck->getValue('art_title'); ?>">Mehr Informationen</a></p>
	</div>
	<hr>
</article>