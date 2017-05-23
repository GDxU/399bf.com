<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $SEO['title'];?></title>
    <meta name="keywords" content="<?php echo $SEO['keyword'];?>">
    <meta name="description" content="<?php echo $SEO['description'];?>">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- build css -->
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">

    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>main.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>ft_database.css">
    <!-- build css end -->
</head>
<body>
<div class="page-group">

    <!-- 资料库 -->
    <div class="page page-current" id="ft_database">

        <!-- header -->
        <header class="bar bar-nav">
            <a class="button pull-left btn-back external" href="<?php echo WAP_PATH;?>zqscore/">
                <i class="icon icon-left orange"></i>
            </a>
            <h1 class="title orange">足球资料库</h1>
        </header>
        <!-- header end -->

        <!-- search bar -->
        <!--<div class="bar bar-header-secondary">-->
            <!--<div class="searchbar">-->
                <!--<a class="searchbar-cancel">取消</a>-->
                <!--<div class="search-input">-->
                    <!--<label class="icon icon-search" for="search"></label>-->
                    <!--<input type="search" id='search' placeholder='输入关键字...'/>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!-- search end -->

        <div class="content">


            <!-- 二级导航 -->
            <div class="buttons-tab">
                <a href="#zone-13" class="tab-link active button">欧洲赛事</a>
                <a href="#zone-25" class="tab-link button">亚洲赛事</a>
                <a href="#zone-26" class="tab-link button">美洲赛事</a>
                <a href="#zone-27" class="tab-link button">大洋洲赛事</a>
                <a href="#zone-29" class="tab-link button">国际赛事</a>
            </div>
            <!-- 二级导航 end-->

            <div class="">
                <div class="tabs">
                    <?php $n=1; if(is_array($eventData)) foreach($eventData AS $id => $list) { ?>
                    <div class="tab <?php if($id == 13) { ?>active<?php } ?>" id="zone-<?php echo $id;?>">
                        <!-- 内联导航 -->
                        <div class="buttons-row inner-nav">
                            <a href="#country-<?php echo $id;?>" class="button button-round active tab-link">国家</a>
                            <a href="#state-<?php echo $id;?>" class="button button-round tab-link">洲际</a>
                        </div>
                        <!-- 内联导航 end -->

                        <div class="">
                            <div class="tabs">
                                <div class="tab active" id="country-<?php echo $id;?>">
                                    <!-- 国家盒子 -->
                                    <div class="country-box content-padded">
                                        <div class="row">
                                            <?php $n=1;if(is_array($list[2])) foreach($list[2] AS $data) { ?>
                                            <div class="col-33">
                                                <a href="#country-list-<?php echo $id;?>-<?php echo $data['id'];?>" class="country-item">
                                                    <div class="cell">
                                                        <img src="<?php echo $data['countrylogo'];?>" alt="" class="competition-photo">
                                                    </div>
                                                    <div class="cell">
                                                    <?php echo $data['countryname'];?>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php $n++;}unset($n); ?>
                                        </div>
                                    </div>
                                    <!-- 国家盒子 end -->
                                </div>
                                <div class="tab" id="state-<?php echo $id;?>">
                                    <!-- 洲际 -->
                                    <div class="country-box content-padded">
                                        <div class="row">
                                            <?php $n=1;if(is_array($list[1])) foreach($list[1] AS $data) { ?>
                                            <div class="col-33">
                                                <a href="<?php echo WAP_PATH;?>competition/<?php echo $data['id'];?>/schedule/" class="country-item external" >
                                                    <div class="cell">
                                                        <img src="<?php echo $data['countrylogo'];?>" alt="" class="competition-photo">
                                                    </div>
                                                    <div class="cell">
                                                        <?php echo $data['name'];?>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php $n++;}unset($n); ?>
                                        </div>
                                    </div>
                                    <!-- 洲际 end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $n++;}unset($n); ?>
                </div>
            </div>



            <?php include template('wap', 'footer_nav'); ?>
        </div>



    </div>

    <!-- 内联赛事页 -->
    <?php $n=1; if(is_array($eventData)) foreach($eventData AS $id => $list) { ?>
        <?php $n=1;if(is_array($list[2])) foreach($list[2] AS $data) { ?>
            <div class="page" id="country-list-<?php echo $id;?>-<?php echo $data['id'];?>">
                <!-- header -->
                <header class="bar bar-nav">
                    <a class="button pull-left btn-back" href="#ft_database">
                        <i class="icon icon-left orange"></i>
                    </a>
                    <nav class="header-nav">
                        <div class="buttons-row">
                            <span class="button"><?php echo $data['countryname'];?></span>
                        </div>
                    </nav>
                </header>
                <!-- header end -->
                <div class="content">

                    <!-- match -->
                    <div class="match-box">
                        <div class="row">
                            <?php $n=1;if(is_array($data['event'])) foreach($data['event'] AS $value) { ?>
                            <div class="col-50">
                                <a href="<?php echo WAP_PATH;?>competition/<?php echo $value['eventid'];?>/schedule/" class="match-item external">
                                    <img src="<?php echo PHOTO_PATH;?>competition/<?php echo $value['eventid'];?>.jpg" alt="" class="pull-left competition-photo">
                                    <?php echo $value['eventname'];?>
                                </a>
                            </div>
                            <?php $n++;}unset($n); ?>
                        </div>

                    </div>

                    <!-- match end -->
                </div>
            </div>
        <?php $n++;}unset($n); ?>
    <?php $n++;}unset($n); ?>

</div>

<script>
    var router = true;
</script>
<?php include template('wap', 'wap_footer'); ?>
