<?php
// No Direct Access
defined( '_JEXEC' ) or die;
?>
<div class="grid-item one-half short">
	<label><?php echo $cck->get('kontakt_surname')->label; ?><span>*</span></label>
	<?php echo $cck->renderField('kontakt_surname'); ?>
</div>
<div class="grid-item one-half">
	<label><?php echo $cck->get('kontakt_name')->label; ?><span>*</span></label>
	<?php echo $cck->renderField('kontakt_name'); ?>
</div>
<div class="grid-item one-half short">
	<label><?php echo $cck->get('kontakt_email')->label; ?><span>*</span></label>
	<?php echo $cck->renderField('kontakt_email'); ?>
</div>
<div class="grid-item one-half">
	<label><?php echo $cck->get('kontakt_phone')->label; ?></label>
	<?php echo $cck->renderField('kontakt_phone'); ?>
</div>
</div>
<label><?php echo $cck->get('kontakt_message')->label; ?><span>*</span></label>
<?php echo $cck->renderField('kontakt_message'); ?>
<?php echo $cck->renderField('button_submit'); ?>
