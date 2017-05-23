<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $SEO['title'];?></title>
    <meta name="keywords" content="<?php echo $SEO['keyword'];?>">
    <meta name="description" content="<?php echo $SEO['description'];?>">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- build css -->
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">

    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>main.css">
    <?php if(isset($css)) { ?>
    <?php $n=1;if(is_array($css)) foreach($css AS $data) { ?>
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?><?php echo $data;?>">
    <?php $n++;}unset($n); ?>
    <?php } ?>
    <!-- build css end -->


</head>
<body>
<div class="page-group">

    <div class="page page-current">

        <header class="bar bar-nav">
            <div class="pull-left">
                <a href="<?php echo WAP_PATH;?>"><img src="<?php echo WAP_IMG_PATH;?>logo.png" alt="" class="logo"></a>
            </div>
            <nav class="header-nav pull-right">
                <div class="buttons-row">
                    <a href="<?php echo WAP_PATH;?>zqscore/" class="close-popup button <?php if($nav_id == 1) { ?>active<?php } ?>">足球</a>
                    <a href="<?php echo WAP_PATH;?>lqscore/" class="close-popup button <?php if($nav_id == 2) { ?>active<?php } ?>">篮球</a>
                    <a href="<?php echo WAP_PATH;?>zctj/" class="close-popup button <?php if($nav_id == 3) { ?>active<?php } ?>">情报</a>
                    <a href="<?php echo WAP_PATH;?>wdls/" class="close-popup button <?php if($nav_id == 4) { ?>active<?php } ?>">资讯</a>
                    <a href="<?php echo WAP_PATH;?>tuku/" class="close-popup button <?php if($nav_id == 5) { ?>active<?php } ?>">图库</a>
                </div>
            </nav>
        </header>