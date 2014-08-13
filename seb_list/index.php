<?php
/**
* @version 			SEBLOD 3.x More
* @package			SEBLOD (App Builder & CCK) // SEBLOD nano (Form Builder)
* @url				http://www.seblod.com
* @editor			Octopoos - www.octopoos.com
* @copyright		Copyright (C) 2013 SEBLOD. All Rights Reserved.
* @license 			GNU General Public License version 2 or later; see _LICENSE.php
**/

defined( '_JEXEC' ) or die;

// -- Initialize
require_once dirname(__FILE__).'/config.php';
$cck	=	CCK_Rendering::getInstance( $this->template );
if ( $cck->initialize() === false ) { return; }

// -- Prepare
$items			=	$cck->getItems();
$count			=	count( $items );

// -- Render
?>
<div class="ratingradio">
	<?php
	$ratingTotal = 0;
	foreach ( $items as $item ) {
		$ratingTotal = $ratingTotal + $item->getValue('ks_rate');
	}
	$averagRatings = round($ratingTotal / $count, 0);
	//echo 'total:'.$totalRatings.'<br>'.'av:'.$averagRatings;

	$radio = "";
	for ($i=1; $i <= 5; $i++) {
		$checked = ($i == $averagRatings) ? " checked='checked'" : '';
		$radio .= "<input name='ks_rateaverage' type='radio' class='star {split:2}' disabled='disabled' $checked/>\n";
	}
	$radio .= "<span class='ratingaverage'>&nbsp;($count)</span>\n";
	echo $radio;
	?>
</div>
<div style="display:none;">
<?php
	foreach ( $items as $item ) {
		echo $item->getValue('ks_rate').'<br>';
	}

?>
</div>
<?php
// -- Finalize
$cck->finalize();
?>