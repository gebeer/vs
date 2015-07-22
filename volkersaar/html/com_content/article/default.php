<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $this->item->params->get('access-edit');
$user    = JFactory::getUser();
$info = $this->item->params->get('info_block_position', 0);

?>
<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h2><span class="subheading-category"><?php echo $this->params->get('page_heading'); ?></span></h2>
<?php endif; ?>

	<?php echo $this->item->text; ?>

