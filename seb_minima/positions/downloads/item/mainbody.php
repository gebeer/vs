<?php
// No Direct Access
defined( '_JEXEC' ) or die;

$category = $cck->getValue('down_category');
switch ($category) {
	case '30':
		$file = $cck->getValue('down_file_allg');
		break;
	
	case '32':
		$file = $cck->getValue('down_file_leist_train');
		break;
	
	case '33':
		$file = $cck->getValue('down_file_leist_coach');
		break;	
		
	case '34':
		$file = $cck->getValue('down_file_presse');
		break;	
		
	case '35':
		$file = $cck->getValue('down_file_termine');
		break;	
}
?>

<div class="downloads">
	<a href="<?php echo $file; ?>" title="Download <?php echo basename($file); ?>" target="_blank"></a>
	<p><?php echo $cck->getValue('art_title'); ?><br />
	<?php if ($cck->getValue('down_file_text')) { ?>
	<?php echo $cck->getValue('down_file_text'); ?>
	<?php } ?>
	</p>
</div>