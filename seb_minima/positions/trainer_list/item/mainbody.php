<?php
// No Direct Access
defined( '_JEXEC' ) or die;
include_once "trunCate.php";
$trainerName = $cck->getValue('art_title');
$trainerSlogan = $cck->getValue('trainer_slogan');
$trainerLink = $cck->get('art_title')->link;
$trainerImg = ($cck->getValue('trainer_image') != '' ) ? '<img src="' . $cck->get('trainer_image')->thumb1 . '" alt="' . $cck->getValue('art_title') . '" />' : '';
$specialImg = ($cck->getValue('trainer_image_special') != '' ) ? '<img src="' . $cck->get('trainer_image_special')->thumb1 . '" alt="' . $cck->getValue('art_title') . '" />' : '';
$introItems = $cck->get('trainer_intro')->value;
// var_dump($introItems);
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
				<h1 class="blue"><?php echo $trainerName; ?>&nbsp;&mdash;&nbsp;<span><?php echo $trainerSlogan; ?></span></h1>
			</header>
				<?php
					foreach($introItems as $item){ 
						$title = ($item['art_title']->value) ? "<h2>{$item['art_title']->value}</h2>" : "";
						$items = explode("<br />", nl2br($item['leiinh_text']->value));
						echo "<div class='grid-item one-half'>";
						echo $title;
						echo "<ul>";
						foreach ($items as $i) {
							// $img = ($i['art_title']->value == "Special") ? $specialImg : "";
							echo "<li>$i</li>";
						}
						if ($specialImg && $item['art_title']->value == "Special") echo "<li class='nobullet'>$specialImg</li>";
						echo "</ul>
						</div>";
						?>
					<?php }

				?>
			<p><a class="btn" href="<?php echo $trainerLink; ?>" title="Mehr Informationen zu <?php echo $trainerName; ?>">Zum Trainerprofil von <?php echo $trainerName; ?></a></p>
		</div>
	</div>
</article>