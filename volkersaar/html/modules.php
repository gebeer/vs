<?php defined('_JEXEC') or die;
/* =====================================================================
Template:	OneWeb for Joomla 2.5
Author: 	Seth Warburton - Internet Inspired! - @nternetinspired
Version: 	3.0
Created: 	April 2013
Copyright:	Seth Warburton - (C) 2013 - All rights reserved
Licenses:	GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
Sources:	Beez5 by Angie Radkte
/* ===================================================================== */

/* Let's make the module output using HTML5 elements */
function modChrome_gangnam($module, &$params, &$attribs)
{
    if ($params->get('moduleclass_sfx') == 'blog') { ?>
        <section class="module-blog">
            <header>
                <h1><?php echo $module->title; ?></h1>
            </header>
            <div class="module-body">
            <?php echo $module->content; ?>
            </div>
        </section>
    <?php } else {
        $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
        if (!empty ($module->content)) : ?>
        <div class="module<?php echo $params->get('moduleclass_sfx'); ?> module-<?php echo $module->id; ?>">
            <div class="module-inner">
                <?php if ($module->showtitle) : ?>
                <div class="module-header">
                        <h<?php echo $headerLevel; ?>><?php echo $module->title; ?></h<?php echo $headerLevel; ?>>
                </div>
                <?php endif; ?>
                <?php echo $module->content; ?>
            </div>
        </div>
        <?php endif;
    }
}
function modChrome_training($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
    <div class="module <?php echo $params->get('moduleclass_sfx'); ?> module-<?php echo $module->id; ?>">
            <?php if ($module->showtitle) : ?>
                    <h2 class="orange"><span><?php echo $module->title; ?></span></h2>
            <?php endif; ?>
            <?php echo $module->content; ?>
    </div>
    <?php endif;
}
function modChrome_ratingform($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
    <div class="module <?php echo $params->get('moduleclass_sfx'); ?> module-<?php echo $module->id; ?>">
            <?php if ($module->showtitle) : ?>
                    <h2 class="blue"><span><?php echo $module->title; ?></span></h2>
            <?php endif; ?>
            <?php echo $module->content; ?>
    </div>
    <?php endif;
}
function modChrome_ratingaverage($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
    <div class="module <?php echo $params->get('moduleclass_sfx'); ?> module-<?php echo $module->id; ?>">
            <?php if ($module->showtitle) : ?>
                    <h2 class="icon orange star right"><span><?php echo $module->title; ?></span></h2>
            <?php endif; ?>
            <article class="article clearfix">
            <h1>Ihre Stimme ist uns wichtig!</h3>
            <?php echo $module->content; ?>
            </article>
            <a class="btn" href="#" data-reveal-id="ratingmodal">Bewerten Sie unsere Leistungen</a>
            <hr>
    </div>
    <?php endif;
}
function modChrome_whatsnew($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
    <div class="module <?php echo $params->get('moduleclass_sfx'); ?> module-<?php echo $module->id; ?>">
            <?php if ($module->showtitle) : ?>
                    <h2><span><?php echo $module->title; ?></span></h2>
            <?php endif; ?>
            <?php echo $module->content; ?>
    </div>
    <?php endif;
}
function modChrome_nav($module, &$params, &$attribs)
{
    $headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
    if (!empty ($module->content)) : ?>
    <div class="footer-menu module<?php echo $params->get('moduleclass_sfx'); ?> module-<?php echo $module->id; ?>">
    <?php if ($module->showtitle) : ?>
    <div class="module-header">
            <h<?php echo $headerLevel; ?>><?php echo $module->title; ?></h<?php echo $headerLevel; ?>>
    </div>
    <?php endif; ?>
    <nav >
            <?php echo $module->content; ?>
    </nav>
    </div>
    <?php endif;
}
