<?php
// No Direct Access
defined( '_JEXEC' ) or die;
?>
<fieldset>
<label><?php echo $cck->get('kontakt_surname')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('kontakt_surname'); ?>
<label><?php echo $cck->get('kontakt_name')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('kontakt_name'); ?>
<label><?php echo $cck->get('kontakt_phone')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('kontakt_phone'); ?>
<label><?php echo $cck->get('kontakt_message')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('kontakt_message'); ?>
<?php echo $cck->renderField('button_submit'); ?>
</fieldset>