<?php
/**
* @version 			SEBLOD 3.x Core ~ $Id: index.php alexandrelapoux $
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


// Params init
$items_number					=	0;
$id 							= 	$cck->id;	
$items							=	$cck->getItems();
$item_margin		 			=	$cck->getStyleParam( 'item_margin', '10' );
$columns_debug	 				=	$cck->getStyleParam( 'debug', '0' );

// Params init Leadings 1
$line_main_1					= 	0;
$row_main_1						= 	0;
$line_items_main_1				= 	0;
$items_number_columns_main_1	=	0;
$columns_width_main_1[0]		= 	'';
$columns_width_main_1[1]		= 	array('100');
$columns_width_main_1[2] 		= 	array('50','50');
$columns_width_main_1[3] 		= 	array('33f','34f','33f');
$columns_width_main_1[4] 		=	array('25','25','25','25');
$columns_width_main_1[5] 		= 	array('20','20','20','20','20');
$columns_width_main_1[6] 		= 	array('17f','16f','17f','17f','16f','17f');	
$items_main_1					=	$cck->getStyleParam( 'top_items', '1' );
$top_display					=	$cck->getStyleParam( 'top_display', 'renderItem' );
if ( $top_display == 'renderItem' ) {
	$top_display_params			=	array();
} else {
	$top_display_params			=	array( 'field_name'=>$cck->getStyleParam( 'top_display_field_name', '' ), 'target'=>strtolower( substr( $top_display, strpos( $top_display, '_' ) + 1 ) ) );
	$top_display				=	'renderItemField';
}
$columns_number_main_1			=	$cck->getStyleParam( 'top_columns', '1' );
$columns_number_main_1			=	( !$columns_number_main_1 ) ? 1 : $columns_number_main_1;
$lrortb_main_1					=	$cck->getStyleParam( 'top_item_order', '0' );
$columns_width_data_main_1		=	$cck->getStyleParam( 'top_column_width_custom', '50,50' );	
$tmp_main_1						= 	null; preg_match_all('#[0-9]*#',$columns_width_data_main_1, $tmp_main_1);
$columns_width_custom_main_1	=	array_values( array_filter( $tmp_main_1[0] ) );
$top_item_height				=	$cck->getStyleParam( 'top_item_height', '1' );

// Params init Intro	
$line_intro						= 	0;
$row_intro						= 	0;
$line_items_intro				= 	0;
$items_number_columns_intro		=	0;
$columns_width_intro[0]			= 	'';
$columns_width_intro[1]			= 	array('100');
$columns_width_intro[2] 		= 	array('50','50');
$columns_width_intro[3] 		= 	array('33f','34f','33f');
$columns_width_intro[4] 		=	array('25','25','25','25');
$columns_width_intro[5] 		= 	array('20','20','20','20','20');
$columns_width_intro[6] 		= 	array('17f','16f','17f','17f','16f','17f');
$items_intro					=	$cck->getStyleParam( 'middle_items', '4' );
$middle_display					=	$cck->getStyleParam( 'middle_display', 'renderItem' );
if ( $middle_display == 'renderItem' ) {
	$middle_display_params		=	array();
} else {
	$middle_display_params		=	array( 'field_name'=>$cck->getStyleParam( 'middle_display_field_name', '' ), 'target'=>strtolower( substr( $middle_display, strpos( $middle_display, '_' ) + 1 ) ) );
	$middle_display				=	'renderItemField';
}
$columns_number_intro			=	$cck->getStyleParam( 'middle_columns', '2' );
$columns_number_intro			=	( !$columns_number_intro ) ? 1 : $columns_number_intro;
$lrortb_intro					=	$cck->getStyleParam( 'middle_item_order', '0' );
$columns_width_data_intro		=	$cck->getStyleParam( 'middle_column_width_custom', '50,50' );	
$tmp_intro						= 	null; preg_match_all('#[0-9]*#',$columns_width_data_intro, $tmp_intro);
$columns_width_custom_intro		=	array_values( array_filter( $tmp_intro[0] ) );
$force_height_intro				=	$cck->getStyleParam( 'middle_item_height', '1' );

// Params init Links
$line_links						= 	0;
$row_links						= 	0;
$line_items_links				= 	0;
$items_number_columns_links		=	0;
$columns_width_links[0]			= 	'';
$columns_width_links[1]			= 	array('100');
$columns_width_links[2] 		= 	array('50','50');
$columns_width_links[3] 		= 	array('33f','34f','33f');
$columns_width_links[4] 		=	array('25','25','25','25');
$columns_width_links[5] 		= 	array('20','20','20','20','20');
$columns_width_links[6] 		= 	array('17f','16f','17f','17f','16f','17f');
$items_links					=	$cck->getStyleParam( 'bottom_items', '' );
$bottom_display					=	$cck->getStyleParam( 'bottom_display', 'renderItem' );
if ( $bottom_display == 'renderItem' ) {
	$bottom_display_params		=	array();
} else {
	$bottom_display_params		=	array( 'field_name'=>$cck->getStyleParam( 'bottom_display_field_name', '' ), 'target'=>strtolower( substr( $bottom_display, strpos( $bottom_display, '_' ) + 1 ) ) );
	$bottom_display				=	'renderItemField';
}
$columns_number_links			=	$cck->getStyleParam( 'bottom_columns', '3' );
$columns_number_links			=	( !$columns_number_links ) ? 1 : $columns_number_links;
$lrortb_links					=	$cck->getStyleParam( 'bottom_item_order', '0' );
$columns_width_data_links		=	$cck->getStyleParam( 'bottom_column_width_custom', '33,34,33' );	
$tmp_links						= 	null; preg_match_all('#[0-9]*#',$columns_width_data_links, $tmp_links);
$columns_width_custom_links		=	array_values( array_filter( $tmp_links[0] ) );
$force_height_links				=	$cck->getStyleParam( 'bottom_item_height', '1' );

$firstitem = current($items);
if($firstitem->fields['news_category']->value == 38) {
	$doc = JFactory::getDocument();
	$doc->addCustomTag( "<meta property='og:image' content='" . JURI::base() . "images/news/spruch_der_woche_social.jpg" . "'>" );
	$doc->addCustomTag( "<meta property='og:url' content='" . JURI::base() . "aktuelle-meldungen/spruch-der-woche" . "'>" );
}
// Set template
foreach ( $items as $item ) {

//			echo $cck->$top_display( $item->pk, $top_display_params );
			echo $cck->$middle_display( $item->pk, $middle_display_params );
//			echo $cck->$bottom_display( $item->pk, $bottom_display_params );
				}					
$cck->finalize();
?>