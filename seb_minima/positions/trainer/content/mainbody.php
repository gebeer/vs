<?php
// No Direct Access
defined( '_JEXEC' ) or die;

// share links stuff
$doc = JFactory::getDocument();
$itemurl = JURI::current();
$doc->addCustomTag( "<meta property='og:url' content='".$itemurl."'>" );
$doc->addCustomTag( "<meta property='og:description' content='Skills Academy Trainer ". $cck->getValue('art_title') ."'>" );
$doc->addCustomTag( "<meta property='og:title' content='" . $cck->getValue('art_title') . "'>" );
if ($cck->getValue('trainer_image')) {
	$doc->addCustomTag( "<meta property='og:image' content='" . JURI::base() . $cck->getValue('trainer_image') . "'>" );
}
// $doc->addScript('http://w.sharethis.com/button/buttons.js');

$trainerName = $cck->getValue('art_title');
$trainerImg = ($cck->getValue('trainer_image') != '' ) ? '<img src="' . $cck->getValue('trainer_image') . '" alt="' . $cck->getValue('art_title') . '" />' : '';
$trainerSlogan = $cck->getValue('trainer_slogan');
$trainerSchwerpunkte = ($cck->getValue('trainer_schwerpunkte')) ? "<h2>{$cck->getLabel('trainer_schwerpunkte')}</h2><p>{$cck->getValue('trainer_schwerpunkte')}</p><br>" : "";
$trainerQualifikationen = ($cck->getValue('trainer_qualifikationen')) ? "<h2>{$cck->getLabel('trainer_qualifikationen')}</h2><p>{$cck->getValue('trainer_qualifikationen')}</p><br>" : "";
$trainerWerdegang = ($cck->getValue('trainer_werdegang')) ? "<h2>{$cck->getLabel('trainer_werdegang')}</h2><p>{$cck->getValue('trainer_werdegang')}</p><br>" : "";
$trainerReferenzen = ($cck->getValue('trainer_referenzen')) ? "<h2>{$cck->getLabel('trainer_referenzen')}</h2><p>{$cck->getValue('trainer_referenzen')}</p><br>" : "";
$trainerEmail = $cck->getValue('trainer_email');
$bcc = ($trainerEmail != "info@volkersaar.de") ? "&bcc=info@volkersaar.de" : "";
$mailto = base64_encode("mailto:$trainerEmail?subject=Skills Academy Anfrage$bcc");
?>
<a class="boldit left" href="<?php echo JRoute::_('index.php?option=com_cck&view=list'); ?>" title="Zurück zur Trainer-Übersicht">Zurück zur Trainer-Übersicht</a>
<br /><br />
<section>
	<article class="article trainer">
		<div class="article-body grid-item six-tenths">
			<div class="inner">
				<header>
					<h1 class="blue"><?php echo $trainerName; ?>&nbsp;&mdash;&nbsp;<span><?php echo $trainerSlogan; ?></span></h1>
					<br><br>
				</header>
				<?php echo $trainerSchwerpunkte; ?>
				<?php echo $trainerQualifikationen; ?>
				<?php echo $trainerWerdegang; ?>
				<?php echo $trainerReferenzen; ?>
			</div>
		</div>
		<figure class="grid-item four-tenths">
		<img title="hier kommt das SkillsTrainer-Logo hin:" src="<?php echo 'templates/volkersaar/images/SkillAcademy_Logo.svg' ?>" alt="Skills Trainer Logo" />
		<?php echo $trainerImg; ?>
				{emailcloak=off}
				<script type="text/javascript">
				dw = document.write.bind(document)
		        name = "<?php echo $trainerName; ?>";
		        mt = "<?php echo $mailto; ?>";
		        dw("<a title='Schreiben Sie mir ein E-Mail mit Ihrem Mailprogramm, ich melde mich so schnell wie möglich bei Ihnen.' onclick='trackKontakt(\"by_mailto\")' href='"+mt+"' class='btn btn-block'>E-Mail schreiben an "+name+"</a>");
		        jQuery("a.btn-block").on('click', function(event) {
		        	event.preventDefault();
		        	var $this = jQuery(this);
		        	var src = jQuery.base64.decode($this.attr("href"));
		        	window.location.href = src;
		        });
		      </script>
		      <noscript>Diese E-Mail-Adresse ist vor Spambots geschützt! Zur Anzeige muss JavaScript eingeschaltet sein!  </noscript>
		</figure>
	</article>
</section>
<a class="boldit left" href="<?php echo JRoute::_('index.php?option=com_cck&view=list'); ?>" title="Zurück zur Trainer-Übersicht">Zurück zur Trainer-Übersicht</a>
<script type="text/javascript">
// stLight.options({
// 	publisher: "05be0bc3-91b2-4883-ba22-b5fa5e7b7812",
// });
</script>
