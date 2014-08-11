<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = &$this->item->params;
$images = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$info = $this->item->params->get('info_block_position', 0);

?>
<tr class="article referenz">
	<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
		<td class="img-<?php echo htmlspecialchars($imgfloat); ?>">
			<a href="<?php echo $urls->urla; ?>" title="<?php echo $urls->urlatext; ?>" target="_blank" rel="nofollow"><img title="<?php echo htmlspecialchars($images->image_intro_caption); ?>" src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/></a>
				<?php if ($images->image_intro_caption): ?>
					<figcaption><?php echo htmlspecialchars($images->image_intro_caption); ?></figcaption>
				<?php endif; ?>
		</td>
	<?php endif; ?>

<td class="article-body">
	<?php if ($params->get('show_title')) : ?>
		<header>
			<h1 <?php echo ($urls->urlatext != '' ? 'class="' . $urls->urlatext . '"' : ''); ?>>
				<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>" title="<?php echo $this->escape($this->item->title); ?>"> <?php echo $this->escape($this->item->title); ?></a>
				<?php else : ?>
				<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			</h1>
		</header>
	<?php endif; ?>
		<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php echo $this->item->introtext; ?>



	</td>
</tr>
<?php echo $this->item->event->afterDisplayContent; ?>
