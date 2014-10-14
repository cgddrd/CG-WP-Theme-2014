<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title>
        <?php bloginfo( 'name'); ?>|
        <?php is_home() ? bloginfo( 'description') : wp_title( ''); ?>
    </title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width" />

    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" type='text/css' />

    <?php wp_head(); ?>
</head>

<body>
    <?php include_once( "analyticstracking.php") ?>

    <div id="site-container"></div>

    <header id="title-bar">
        <div id="title-inner">
            <div class="logo">
                <a href="index.php">CG</a>
                <span></span>
            </div>
            <div class="nav">
                <ul class="nav-list">
                    <li>
                        <a href="http://photo.connorlukegoddard.com/">Photography</a>
                    </li>
                    <li>
                        <a href="http://docs.connorlukegoddard.com/CLG-CV.pdf">CV</a>
                    </li>
                    <li>
                        <a href="http://lab.connorlukegoddard.com/wordwarz">Wordwarz</a>
                    </li>
                </ul>
                <ul class="social-list">
                    <a href="https://twitter.com/cgddrd">
                        <li class="twitter">
                            <i class="icon-twitter"></i>
                        </li>
                    </a>
                    <a href="mailto:hello@connorlukegoddard.com">
                        <li class="mail">
                            <i class="icon-envelope"></i>
                        </li>
                    </a>
                    <a href="http://www.linkedin.com/pub/connor-goddard/25/92/567">
                        <li class="linkedin">
                            <i class="icon-linkedin"></i>
                        </li>
                    </a>
                </ul>
                <ul class="social-list">
                    <a href="https://github.com/cgddrd">
                        <li class="github">
                            <i class="icon-github"></i>
                        </li>
                    </a>
                    <a href="http://www.flickr.com/photos/cgoddard/">
                        <li class="flickr">
                            <i class="icon-flickr"></i>
                        </li>
                    </a>

                    <li class="copyright">&copy; Connor Luke Goddard 2013.</li>
                </ul>
            </div>
        </div>
    </header>