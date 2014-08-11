<?php
// No Direct Access
defined( '_JEXEC' ) or die;

?>
	<figure>
		<?php echo $cck->renderField('vid_video'); ?>
	</figure>
	<h1><?php echo $cck->getValue('art_title'); ?></h1>
	<?php echo $cck->getValue('art_introtext'); ?>
