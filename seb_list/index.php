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
$class		=	trim( $cck->getStyleParam( 'class', '' ) );
$class		=	$class ? ' class="'.$class.'"' : '';

$items		=	$cck->getItems();
$fieldnames	=	$cck->getFields( 'element', '', false );
$multiple	=	( count( $fieldnames ) > 1 ) ? true : false;
$count		=	count( $items );
$auto_clean	=	( $count == 1 ) ? $cck->getStyleParam( 'auto_clean', 0 ) : 0;

// -- Render
if ( $cck->id_class ) {
?>
<div class="<?php echo trim( $cck->id_class ); ?>"><?php }
if ( !$auto_clean ) { ?>
<ul<?php echo $class; ?>>
<?php }
	if ( $count ) {
		foreach ( $items as $i=>$item ) {
			$html	=	'';
			foreach ( $fieldnames as $fieldname ) {
				$content	=	$item->renderField( $fieldname );	// todo: markup from $cck->renderField()
				if ( $content != '' && ( $multiple || $item->getMarkup_Class( $fieldname ) ) ) {
					$html	.=	'<div class="cck-clrfix'.$item->getMarkup_Class( $fieldname ).'">'.$content.'</div>';
				} else {
					$html	.=	$content;
				}
			}
			if ( $html && !$auto_clean ) {
				$html	=	'<li>'.$html.'</li>';
			}
            echo $html;
		}
	}
if ( !$auto_clean ) {
?>
</ul>
<?php
}
if ( $cck->id_class ) { ?>
</div>
<?php } ?>
<?php
// -- Finalize
$cck->finalize();
?>