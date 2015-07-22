<?php
// No Direct Access
defined( '_JEXEC' ) or die;
include_once "trunCate.php";
$trainerName = $cck->getValue('art_title');
$trainerSlogan = $cck->getValue('trainer_slogan');
$trainerLink = $cck->get('art_title')->link;
if ($cck->getValue('trainer_image') != '' ) {
	$trainerImg = '<img src="' . $cck->get('trainer_image')->thumb1 . '" alt="' . $cck->getValue('art_title') . '" />';
}
$introItems = $cck->get('trainer_intro')->value;
var_dump($introItems);
?>

<article class="article trainer intro clearfix">
	<figure class="grid-item one-quarter">
		<a href="<?php echo $trainerLink; ?>" title="Mehr Informationen zu <?php echo $trainerName; ?>">
		<?php echo $trainerImg; ?>
		</a>
	</figure>
	<div class="article-body grid-item three-quarters">
		<div class="inner">
			<header>
				<h1 class="blue"><?php echo $trainerName; ?>&nbsp;<span class="orange">&#8222;<?php echo $trainerSlogan; ?>&#8220;</span></h1>
			</header>
			<?php foreach ($introItems as $item) {
				echo "<h3>{$item['art_title']}</h3>";
			} ?>
			<p><a class="boldit" href="<?php echo $trainerLink; ?>" title="Mehr Informationen zu <?php echo $trainerName; ?>">Zum Trainerprofil von <?php echo $trainerName; ?></a></p>
		</div>
	</div>
</article>