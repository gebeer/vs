<?php
// No Direct Access
defined( '_JEXEC' ) or die;

$artDate = new DateTime($cck->getValue('art_created'));
$termDate = new DateTime($cck->getValue('termin_dat'));
$termMonth = $termDate->getTimestamp();
setlocale(LC_TIME, "de_DE");

?>

<article class="article termin intro clearfix">
	<div class="info grid-item one-fifth">
	<div class="date"><?php echo strftime("%B", $termMonth); ?><br/>
	<time  datetime="<?php echo $termDate->format('Y-m-d') ?>"><?php echo $termDate->format('d.m.Y'); ?></time>
	</div>
	<div class="time"><?php echo $cck->getValue('news_time'); ?></div>
	<div class="place"><?php echo $cck->getValue('news_place'); ?></div>
	</div>
	<div class="article-body grid-item four-fifths">
		<header>
			<h1 class="blue"><?php echo $cck->getValue('art_title'); ?></h1>
		</header>
		<?php echo $cck->getValue('art_introtext'); ?>
		<?php if ($cck->getValue('termin_file')) { ?>
		<p><a class="btn" href="<?php echo $cck->getValue('termin_file'); ?>" title="Melden Sie sich hier an">Melden Sie sich hier an</a></p>
		<?php } ?>
	</div>
</article>