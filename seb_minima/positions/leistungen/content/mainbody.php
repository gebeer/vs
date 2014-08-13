<?php
// No Direct Access
defined( '_JEXEC' ) or die;

$createDate = new DateTime($cck->getValue('art_created'));
$fakten = $cck->getValue('lei_fakten');
//var_dump($cck->getValue('lei_anschaulich'));
$inhaltwidth = '';
if (!$cck->getValue('lei_anschau_header')) {
	$inhaltwidth = ' style="min-height: 350px !important"';
}

// share links stuff
$doc = JFactory::getDocument();
$array_search=array("'", '"');
$array_replace=array("&#39;","&#34;");
$itemurl = JURI::current();
$doc->addCustomTag( "<meta property='og:url' content='".$itemurl."'>" );
$description = mb_substr(strip_tags($cck->getValue('art_fulltext')), 0, 200) . ' &hellip;';
$doc->addCustomTag( "<meta property='og:description' content='". str_replace($array_search, $array_replace, $description) ."'>" );
$doc->addCustomTag( "<meta property='og:title' content='" . $cck->getValue('art_title') . "'>" );
$doc->addCustomTag( "<meta property='og:image' content='" . JURI::base() . "images/misc/volker-saar-discover-your-skills.png'>" );
$doc->addScript('http://w.sharethis.com/button/buttons.js');

?>

<article class="article train">
		<header>
			<h2 class="black"><?php $art_title = $cck->getValue('art_title'); echo $art_title; ?></h2>
			<!--<p><span class="date"><?php echo $createDate->format('d.m.Y'); ?></span> | <span class="author"><?php echo $cck->renderField('art_created_by'); ?></span><p>-->
			<div class="socialicons">
				<span title="Diesen Inhalt auf Facebook teilen" onclick="trackSocial('shareBy_facebook')" class='st_facebook_custom socicon' displayText='Facebook'></span>
				<span  title="Diesen Inhalt auf Google+ teilen" onclick="trackSocial('shareBy_google_plus')" class='st_google_bmarks_custom socicon' ></span>
			</div>
		</header>
	<div class="article-body clearfix">
	{emailcloak=off}
		<div class="fulltext">
			<?php echo $cck->getValue('art_fulltext'); ?>
			<p><strong>Sie haben Interesse an weiterführenden Informationen?<br>Nehmen Sie Kontakt mit mir auf:</strong></p>
			<p class="margB_0-5"><a class="btn margR_0-3" href="/kontakt" title="Rufen Sie mich an, ich helfe Ihnen gerne weiter." onclick="trackKontakt('by_fon')">Telefon: 0911 567 58 37</a>

			<script type="text/javascript">
        <!--
        { coded = "AOvc@5cUH9bKGGb.S9"
          key = "rxRYE2gOcesdq5ViLjbFX78TPJ19KSakDAZuMWlfy06CIhtBGHznow3mUvQN4p"
          shift=coded.length
          link=""
          for (i=0; i<coded.length; i++) {
            if (key.indexOf(coded.charAt(i))==-1) {
              ltr = coded.charAt(i)
              link += (ltr)
            }
            else {
              ltr = (key.indexOf(coded.charAt(i))-shift+key.length) % key.length
              link += (key.charAt(ltr))
            }
          }
        title_sem = "<?php echo $art_title; ?>";
        document.write("<a title='Schreiben Sie mir ein E-Mail mit Ihrem Mailprogramm, ich melde mich so schnell wie möglich bei Ihnen.' onclick='trackKontakt(\"by_mailto\")' href='mailto:"+link+"?subject=Ich habe Interesse an weiterführenden Informationen zu "+title_sem+".' class='btn'>E-Mail schreiben</a>")
        }
        //-->
      </script>
      <noscript>Diese E-Mail-Adresse ist vor Spambots geschützt! Zur Anzeige muss JavaScript eingeschaltet sein!  </noscript>
			</p>

			<p><a class="btn" href="/kontakt" title="Schreiben Sie mir ein Nachricht via Formular, ich melde mich so schnell wie möglich bei Ihnen." onclick="trackKontakt('by_form')">Nachricht via Formular schreiben</a></p>
      		<?php if ($cck->getValue('general_file')) : ?>
		  	<p class="margB_0"><a class="btn orange" href="<?php echo $cck->get('general_file')->link; ?>" onclick="trackKontakt('by_pdf')" title="Faxanmeldung im PDF-Format herunterladen">Anmeldung: PDF herunterladen</a></p>
			<?php endif ?>
		</div>
		<div class="right">
			<aside class="nutzen">
				<h3>Ihr Nutzen</h3>
				<p><?php echo $cck->getValue('lei_nutzen'); ?></p>

			</aside>
			<aside class="kundenstimmen">
				<h3>Kundenstimmen</h3>
				{loadposition ratingmod}
			</aside>
		</div>
		<div class="wrap clearfix">
			<section class="inhalte"<?php echo $inhaltwidth ?>>
				<h3>Inhalt</h3>
				<ul>
				<?php
					foreach($cck->getValue( 'lei_inhalte' ) as $gx){ ?>
						<li>
						<?php if ($gx['art_title']->value) : ?>
						<b><?php echo $gx['art_title']->value; ?></b><br>
						<?php endif ?>
						<?php echo $gx['leiinh_text']->value; ?></li>
					<?php }
				?>
				</ul>
			</section>
			<section class="fakten">
				<h3><span>Fakten</span></h3>
					<?php if ($cck->getValue('leifa_teilnehmer')) : ?>
					<h4>Typische Teilnehmer</h4>
					<p><?php echo $fakten['leifa_teilnehmer']->value; ?></p>
					<?php endif ?>
					<?php if ($fakten['leifa_dauer']->value) : ?>
					<h4>Dauer</h4>
					<p><?php echo $fakten['leifa_dauer']->value; ?></p>
					<?php endif ?>
					<?php if ($fakten['art_urlb']->value) : ?>
					<h4>Teilnehmerzahl</h4>
					<p><?php echo $fakten['art_urlb']->value; ?></p>
					<?php endif ?>
					<?php if ($fakten['art_urlc_text']->value) : ?>
					<h4>Kosten</h4>
					<p><?php echo $fakten['art_urlc_text']->value; ?></p>
					<?php endif ?>
			</section>
			<?php if ($cck->getValue('lei_anschau_header')) {  ?>
			<section class="ansch">
				<h3><span>Anschaulich</span></h3>
				<figure>
					<?php echo $cck->renderField('lei_anschau_video'); ?>
				</figure>
				<div class="wrap">
					<h4><?php echo $cck->getValue('lei_anschau_header'); ?></h4>
					<p><?php echo $cck->getValue('lei_anschau_text'); ?>
					<!-- <a target="_blank" href="<?php echo $cck->getValue('lei_anschau_link'); ?>" title="Weiter Videos auf YouTube. Hinweis: Neues Fenster." class="btn btn-small">Besuchen Sie meinen YouTube-Kanal</a></p> -->
					<a target="_blank" href="https://www.youtube.com/user/MaxMorck" title="Weiter Videos finden Sie auf meinem YouTube-Kanal. Hinweis: Neues Fenster." class="btn btn-small" onclick="trackVideo('kanal', '<?php echo $art_title; ?>')">Besuchen Sie meinen YouTube-Kanal</a></p>
				</div>
			</section>
			<?php } ?>
		</div>
	</div>
</article>
<script type="text/javascript">
stLight.options({
	publisher: "05be0bc3-91b2-4883-ba22-b5fa5e7b7812",
});
</script>