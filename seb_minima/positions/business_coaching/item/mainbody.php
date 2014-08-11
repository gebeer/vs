<?php
// No Direct Access
defined( '_JEXEC' ) or die;
$artTitle = ($cck->getValue('lei_title') != '') ? $cck->getValue('lei_title') : $cck->getValue('art_title');
?>
<article class="article train busi intro clearfix">
	<header>
		<a href="<?php echo $cck->get('art_title')->link; ?>" title="Erfahren Sie mehr über <?php echo $cck->getValue('art_title'); ?>">
			<h1><?php echo $artTitle; ?></h1>
			<?php if ($cck->getValue('art_image_intro_alt')) { ?>
			<h2><?php echo $cck->getValue('art_image_intro_alt'); ?></h2>
		</a>
			<?php } ?>		
	</header>
	<div class="article-body">
		<p><?php echo $cck->getValue('lei_schlagworte'); ?><p>
	</div>
</article>
