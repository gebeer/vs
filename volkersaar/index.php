<?php defined('_JEXEC') or die;
/* =====================================================================
Template:  OneWeb for Joomla
Author:   Seth Warburton - Internet Inspired! - @nternetinspired
Version:   3.0
Created:   April 2013
Copyright:  Seth Warburton - (C) 2013 - All rights reserved
Licenses:  GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
                DBAD License http://philsturgeon.co.uk/code/dbad-license
/* ===================================================================== */

// Load template logic
include_once JPATH_THEMES . '/' . $this->template . '/logic.php';
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="de"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="de"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie10 lt-ie9" lang="de"> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10" lang="de"> <![endif]-->
<!--[if !IE]><!--> <html class="no-js" lang="de"> <!--<![endif]-->
<head>
<jdoc:include type="head" />
<link rel="author" href="https://plus.google.com/104297445898014737508">
    <!--[if lt IE 9]>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/respond.min.js"></script>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
    <body class="<?php echo $siteHome ; ?>-page <?php echo $option . ' view-' . $view . ' itemid-' . $itemid . ' '  . $pageParams->get( 'pageclass_sfx' );?>">

        <header role="banner" class="top">
            <div class="wrapper">
                <div class="main">
                <div class="logo">
                    <a href="<?php echo $this->baseurl ?>/" title="<?php echo htmlspecialchars($app->getCfg('sitename'));?>"><img src="<?php echo 'templates/' . $this->template . '/images/volker-saar-logo.png' ?>" width="157" height="135" alt="Volker Saar Logo"></a>
                </div>
                <?php if($this->countModules('header')) : ?>
                        <jdoc:include type="modules" name="header" style="none" />
                <?php endif; ?>
                <?php if($this->countModules('menu')) : ?>
                    <nav role="navigation" class="mainnav">
                        <jdoc:include type="modules" name="menu" style="none" />
                    </nav>
                <?php endif; ?>
                </div>
            </div>
        </header>
        <?php if($this->countModules('callform')) : ?>
      <aside class="callform" title="Informationen und/ oder Rückruf erwünscht? Hier klicken." onclick="trackForm('byFlag')">
                <jdoc:include type="modules" name="callform" style="none" />
            </aside>
        <?php endif; ?>
        <?php if($this->countModules('breadcrumbs')) : ?>
            <div class="breadcrumb-row">
                   <section class="content">
                       <jdoc:include type="modules" name="breadcrumbs" style="gangnam" />
                    </section>
            </div>
        <?php endif; ?>

        <?php if($this->countModules('above')) : ?>
            <aside class="above">
            <div class="wrapper">
                    <jdoc:include type="modules" name="above" style="none" />
            </div>
            </aside>
        <?php endif; ?>
        <?php if($this->countModules('submenu')) : ?>
            <nav class="subnav">
                <div class="wrapper">
                        <jdoc:include type="modules" name="submenu" style="none" />
                </div>
            </nav>
        <?php endif; ?>

        <?php if($siteHome != 'home' or ($frontpage == 0)) : ?>
            <div class="maincont wrapper">
                    <?php if($this->countModules('leftcol')) : ?>
                    <div role="navigation" class="leftcol<?php echo $leftcolwidth; ?>">
                        <jdoc:include type="modules" name="leftcol" style="gangnam" />
                    </div>
                    <?php endif; ?>
                    <?php if($this->countModules('leftcol-blog')) : ?>
                    <div role="navigation" class="leftcol<?php echo $leftcolwidth; ?>">
                        <jdoc:include type="modules" name="leftcol-blog" style="gangnam" />
                    </div>
                    <?php endif; ?>
                    <main role="main" class="content<?php echo $mainwidth; ?>"<?php echo $mainpadding; ?>>
                        <jdoc:include type="message" />
                        <jdoc:include type="component" />
                        <?php if($this->countModules('complementary')) : ?>
                        <jdoc:include type="modules" name="complementary" style="training" />
                        <?php endif; ?>
                        <?php if($this->countModules('complementary2')) : ?>
                        <jdoc:include type="modules" name="complementary2" style="whatsnew" />
                        <?php endif; ?>
                    </main>
            </div>
        <?php endif; ?>

        <?php if($this->countModules('below')) : ?>
            <aside class="below row">
                        <jdoc:include type="modules" name="below" style="none" />
            </aside>
        <?php endif; ?>
        <?php if($this->countModules('teaser')) : ?>
            <aside class="teaser">
                <div class="wrapper">
                    <jdoc:include type="modules" name="teaser" style="none" />
                </div>
            </aside>
        <?php endif; ?>

        <?php if($this->countModules('footer-menu') OR $this->countModules('contentinfo')) : ?>
            <footer role="contentinfo">
                <div class="wrapper">
                        <?php if($this->countModules('contentinfo')) : ?>
                            <jdoc:include type="modules" name="contentinfo" style="gangnam" />
                        <?php endif; ?>
                        <?php if($this->countModules('footer-menu')) : ?>
                                <jdoc:include type="modules" name="footer-menu" style="nav" />
                        <?php endif; ?>
                </div>
            </footer>
        <?php endif; ?>

        <div class="credit-row">
            <div class="wrapper">
                <p>&copy; Copyright <?php echo date("Y"); ?> - <?php echo htmlspecialchars($app->getCfg('sitename'));?> - All rights reserved.&nbsp;&nbsp;&nbsp;Created by gruenklee - kommunikation.design</p>
            </div>
        </div>
        <?php if($this->countModules('debug')) : ?>
            <jdoc:include type="modules" name="debug"/>
        <?php endif; ?>

        <?php if ($scripts > 0) : ?>
          <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/scripts.js"></script>
            <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/plugins.js"></script>
        <?php endif; ?>
        <?php if ($analytics != "") : ?>

            <script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			  ga('create', '<?php echo htmlspecialchars($analytics); ?>', 'volkersaar.de');
			  ga('set', 'anonymizeIp', true);
			  ga('require', 'displayfeatures');
			  ga('send', 'pageview');
			</script> 
            
            <script>
    function trackKontakt(_by){
        var actionType = _by;
        _gaq.push(['_trackEvent', 'kontakt', actionType]);
    }
    function trackForm(_by){
        var actionTypeForm = _by;
        _gaq.push(['_trackEvent', 'form', actionTypeForm]);
    }
    function trackSocial(_by){
        var socialType = _by;
        _gaq.push(['_trackEvent', 'social', socialType]);
    }
    function trackVideo(_viewType, _by){
        var viewType = _viewType;
        var videoType = _by;
        _gaq.push(['_trackEvent', 'byVideoType_'+viewType, 'byVideoArticle_'+videoType]);
    }
    jQuery('.track_youtube').click(function(){
        var socialType = 'youtube_footer';
        _gaq.push(['_trackEvent', 'social', socialType]);
    });
    jQuery('.track_xing').click(function(){
        var socialType = 'xing_footer';
        _gaq.push(['_trackEvent', 'social', socialType]);
    });

    jQuery('.track_google').click(function(){
        var socialType = 'google_footer';
        _gaq.push(['_trackEvent', 'social', socialType]);
    });

    jQuery('.track_linkedin').click(function(){
        var socialType = 'linkedin_footer';
        _gaq.push(['_trackEvent', 'social', socialType]);
    });
</script>
        <?php endif; ?>

    </body>
</html>
