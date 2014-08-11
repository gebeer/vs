<?php
// No Direct Access
defined( '_JEXEC' ) or die;

/*$semTitle = $cck->getValue('art_title');
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
*/
$newsDate = new DateTime($cck->getValue('art_created'));
?>
<article class="article news">
	<figure class="img-left">
	<img src="<?php echo $cck->getValue('art_image_intro'); ?>" alt="<?php echo $cck->getValue('art_image_intro_alt'); ?>" />
	</figure>
	<div class="article-body">
		<header>
			<h1 class="blue"><?php echo '<span>' . $newsDate->format('d.m.Y') . ' |</span> ' . $cck->getValue('art_title'); ?></h1>
		</header>
		<?php echo $cck->getValue('art_introtext'); ?>
		<a class="boldit" href="<?php echo $cck->get('news_read_more')->link; ?>" title="Mehr Informationen zu <?php echo $cck->getValue('art_title'); ?>">Mehr Informationen</a>
	</div>
</article>