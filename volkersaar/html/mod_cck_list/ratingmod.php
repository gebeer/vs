<?php
/**
* @version 			SEBLOD 3.x Core ~ $Id: default.php sebastienheraud $
* @package			SEBLOD (App Builder & CCK) // SEBLOD nano (Form Builder)
* @url				http://www.seblod.com
* @editor			Octopoos - www.octopoos.com
* @copyright		Copyright (C) 2013 SEBLOD. All Rights Reserved.
* @license 			GNU General Public License version 2 or later; see _LICENSE.php
**/

defined( '_JEXEC' ) or die;

if ( $show_list_desc == 1 && $description != '' ) {
	echo '<div class="cck_module_desc'.$class_sfx.'">' . $description . '</div><div class="clr"></div>';
}
?>

<div class="cck_module_list <?php echo $class_sfx; ?>">
<?php
if ( $search->content > 0 ) {
	echo $data;
} else {
	include dirname(__FILE__).'/default_items.php';
}
?>
<p><a class="btn orange bewerten" href="#" data-reveal-id="ratingmodal">Bewerten Sie unsere Leistungen</a><p>
<p><a class="boldit kusti" href="/referenzen-kundenstimmen">Mehr Kundenstimmen</a></p>
<p><a class="btn kusti" href="/referenzen-kundenstimmen">Mehr Kundenstimmen</a></p>
</div>