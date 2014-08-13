<?php
// No Direct Access
defined( '_JEXEC' ) or die;
?>
<div class="grid-item one-half">
<div class="inner">
<?php echo $cck->renderField('art_catid'); ?>
<?php echo $cck->renderField('art_state'); ?>
<?php echo $cck->renderField('ks_mail'); ?>
<label><?php echo $cck->get('ks_vorname')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('ks_vorname'); ?>
<label><?php echo $cck->get('ks_firma')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('ks_firma'); ?>
<label><?php echo $cck->get('ks_email')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('ks_email'); ?>
<label><?php echo $cck->get('ks_text')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('ks_text'); ?>
</div>
</div>
<div class="grid-item one-half">
<div class="inner">
<label><?php echo $cck->get('ks_name')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('ks_name'); ?>
<label><?php echo $cck->get('ks_job')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('ks_job'); ?>
<div class="rating">
<label><?php echo $cck->get('ks_rate')->label; ?> <span>*</span></label>
<?php echo $cck->renderField('ks_rate'); ?>
</div>
<?php echo $cck->renderField('button_submit'); ?>
</div>
</div>
<label><span>* </span>Pflichtfelder</label>
<br>
<hr class="blue">
