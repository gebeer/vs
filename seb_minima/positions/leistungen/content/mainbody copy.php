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
			<h2 class="black"><?php echo $cck->getValue('art_title'); ?></h2>
			<!--<p><span class="date"><?php echo $createDate->format('d.m.Y'); ?></span> | <span class="author"><?php echo $cck->renderField('art_created_by'); ?></span><p>-->
			<div class="socialicons">
				<span class='st_facebook_custom socicon' displayText='Facebook'></span>
				<span class='st_google_bmarks_custom socicon' ></span>
			</div>
		</header>
	<div class="article-body clearfix">
		<div class="fulltext">
			<?php echo $cck->getValue('art_fulltext'); ?>
			<p><a class="btn" href="/kontakt" title="Nehmen Sie Kontakt mit uns auf" onclick="trackKontakt('by_form')">Kontakt aufnehmen</a></p>
			<?php if ($cck->getValue('general_file')) : ?>
				<p><a class="btn" href="<?php echo $cck->get('general_file')->link; ?>" titel="<?php echo $cck->getValue('general_file') ?> downloaden"  onclick="trackKontakt('by_pdf')">Anmeldung als PDF herunterladen</a></p>
			<?php endif ?>
		</div>
		<aside class="nutzen">
			<h3>Ihr Nutzen</h3>
			<p><?php echo $cck->getValue('lei_nutzen'); ?></p>

		</aside>
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
					<a href="<?php echo $cck->getValue('lei_anschau_link'); ?>" title="Mehr zu <?php echo $cck->getValue('lei_anschau_head'); ?>" class="btn btn-small">Erfahren Sie mehr</a></p>
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