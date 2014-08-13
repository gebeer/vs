<?php
// No Direct Access
defined( '_JEXEC' ) or die;

$alias = $cck->getValue('art_alias');
$rating = $cck->getValue('ks_rate');
$radio = '';

for ($i=1; $i <= 5; $i++) {
	$checked = ($i == $rating) ? " checked='checked'" : '';
	$radio .= "<input name='ks_rate$alias' type='radio' class='star' disabled='disabled' $checked />\n";
}
?>

<article class="article referenz">
	<div class="article-body">
		<header>
			<h1><?php echo $cck->getValue('ks_firma'); ?></h1>
		</header>
		<p>&bdquo;<?php echo $cck->getValue('ks_text'); ?>&ldquo;</p>
		<p class="nomargin"><strong><?php echo $cck->getValue('ks_vorname') . "&nbsp;". $cck->getValue('ks_name'); ?></strong> &ndash; <em><?php echo $cck->getValue('ks_job'); ?></em></p>   
	</div>
	<div class="rating clearfix">
		<?php echo $radio; ?>
	</div>
	<p>&nbsp;</p>
</article>
