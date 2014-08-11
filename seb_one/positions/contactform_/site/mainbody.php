<?php
// No Direct Access
defined( '_JEXEC' ) or die;
?>
<fieldset class="grid-item one-half">
	<?php echo $cck->renderField('contact_surname'); ?>
	<?php echo $cck->renderField('contact_phone'); ?>
</fieldset>
<fieldset class="grid-item one-half">
	<?php echo $cck->renderField('contact_name'); ?>
	<?php echo $cck->renderField('contact_email'); ?>
</fieldset>
<?php echo $cck->renderField('contact_message'); ?>
<?php echo $cck->renderField('button_submit'); ?>
