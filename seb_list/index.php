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
<div class="ratingradio clearfix" itemscope itemtype="http://schema.org/LocalBusiness">
	<?php
	$ratingTotal = 0;
	foreach ( $items as $item ) {
		$ratingTotal = $ratingTotal + $item->getValue('ks_rate');
	}
	$averagRatings = round($ratingTotal / $count, 0);
	//echo 'total:'.$totalRatings.'<br>'.'av:'.$averagRatings;

	$radio = '';
	for ($i=1; $i <= 5; $i++) {
		$checked = ($i == $averagRatings) ? " checked='checked'" : '';
		$radio .= "<input name='ks_rateaverage' type='radio' class='star {split:2}' disabled='disabled' $checked/>\n";
	}
	//$radio .= "<span class='ratingaverage'>&nbsp;($count</span>)\n";
	echo $radio;
	?>
</div>
<div itemscope itemtype="http://schema.org/LocalBusiness">
	<h1 class="visuallyhidden"><span itemprop="name">Volker Saar</span></h1>
	<div class="visuallyhidden" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
	    <span itemprop="streetAddress">Niederweg 13</span>,
	    <span itemprop="addressLocality">Nürnberg</span>,
	    <span itemprop="postalCode">90427</span>,
	    <span itemprop="telephone">+49 911 567 58 37</span>
	</div>
	<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    	<span class="ratingaverage"><span itemprop="ratingValue"><?php echo $averagRatings; ?></span> Sterne aus <span itemprop="ratingCount"><?php echo $count; ?></span> Bewertungen</span>
    </div>
</div>
<?php
// -- Finalize
$cck->finalize();
?>