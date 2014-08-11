<?php
// No Direct Access
defined( '_JEXEC' ) or die;

$semTitle = $cck->getValue('art_title');
$semDatStart = new DateTime($cck->getValue('sem_date_start'));
$semDatEnd = new DateTime($cck->getValue('sem_date_end'));
$semThema = $cck->getValue('sem_thema');
$semOrt = $cck->getValue('sem_ort');
$semHinweis = $cck->getValue('sem_hinweis');
$semPlaetze = $cck->getValue('sem_plaetze');
$semAnmForm = $cck->get('sem_anm_form')->link;
$semDetailLink = $cck->get('art_title')->link;

if ($semDatStart->format('d.m.Y') == $semDatEnd->format('d.m.Y')) {
	$semDatZeit = $semDatStart->format('d.m.Y') . ' um ' . $semDatStart->format('H:i') . ' - ' . $semDatEnd->format('H:i');	
} else {
	$semDatZeit = $semDatStart->format('d.m.Y') . ' um ' . $semDatStart->format('H:i') . ' bis ' . $semDatEnd->format('d.m.Y') . ' um ' . $semDatEnd->format('H:i');
}


?>
<div class="bgwhite sem clearfix">
<div class="semHead">
<div class="floatleft"><?php echo $semDatStart->format('d.m.Y'); ?><span> || </span><?php echo $semTitle; ?></div>
<a class="semHeadLink" href="<?php echo $semAnmForm; ?>" title ="Anmeldeformular downloaden">> Anmeldeformular downloaden</a>
<a class="semHeadLink" href="<?php echo $semDetailLink; ?>" title ="Mehr Details finden Sie hier">> Mehr Details finden Sie hier</a>
</div>
<div class="semdetail iconThema">
<b><?php echo $cck->getLabel('sem_thema'); ?></b>:<br>
<?php echo $semThema; ?>
</div>
<div class="semdetail iconOrt floatleft">
<b><?php echo $cck->getLabel('sem_ort'); ?></b>:<br>
<?php echo $semOrt; ?>
</div>
<div class="semdetail iconHinweis floatright">
<b><?php echo $cck->getLabel('sem_hinweis'); ?></b>:<br>
<?php echo $semHinweis; ?>
</div>
<div class="clearfix"></div>
<div class="semdetail iconDatZeit floatleft">
<b>Datum & Zeit</b>:<br>
<?php echo $semDatZeit; ?>
</div>
<div class="semdetail iconPlaetze floatright">
<b><?php echo $cck->getLabel('sem_plaetze'); ?></b>:<br>
<?php echo $semPlaetze; ?>
</div>
</div>