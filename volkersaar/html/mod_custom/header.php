<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_custom
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$bgimg = $params->get('backgroundimage');
$bgimgdim = getimagesize($bgimg);
?>

<div class="slogan<?php echo $params->get('moduleclass_sfx'); ?>">
<?php echo $module->content;?>
</div>
<?php if ($bgimg): ?>
<img src="<?php echo $bgimg;?>" alt="<?php echo basename($bgimg, '.png');?>" <?php echo $bgimgdim[3];?> />
<?php endif;?>