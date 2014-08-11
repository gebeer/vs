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

$doc = JFactory::getDocument();

$headData=$doc->getHeadData();
unset($headData['styleSheets'][JURI::base(true).'/media/cck/css/cck.css']);
unset($headData['styleSheets'][JURI::base(true).'/media/cck/css/cck.content.css']);
unset($headData['styleSheets'][JURI::base(true).'/media/cck/css/cck.intro.css']);
unset($headData['styleSheets'][JURI::base(true).'/media/cck/css/cck.list.css']);
unset($headData['styleSheets'][JURI::base(true).'/media/cck/css/cck.search.css']);
//unset($headData['scripts'][JURI::base(true).'/media/system/js/validate.js']);
//unset($headData['scripts'][JURI::base(true).'/media/cck/js/cck.core-3.0.0.min.js']);
//$headData['style']['text/css'] = preg_replace('%/\* Variation: seb_css3 \*/\s*div.seb_css3 \{.*overflow:hidden; \}%', '', $headData['style']['text/css']);
       
$doc->setHeadData($headData);





// -- Initialize
require_once dirname(__FILE__).'/config.php';
$cck	=	CCK_Rendering::getInstance( $this->template );
if ( $cck->initialize() === false ) { return; }



// -- Render
if ( $cck->id_class != '' ) {
	echo $cck->renderPosition( 'mainbody', '', $cck->h( 'mainbody' ) );
} else {
	echo $cck->renderPosition( 'mainbody', '', $cck->h( 'mainbody' ) );
}

if ( $cck->countFields( 'hidden' ) ) { ?>
	<div style="display: none;">
		<?php echo $cck->renderPosition( 'hidden' ); ?>
	</div>
<?php }

// -- Finalize
$cck->finalize();
?>