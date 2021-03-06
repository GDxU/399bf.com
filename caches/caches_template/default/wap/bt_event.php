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

    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">

    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>main.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>bt_immediate.css">
</head>
<body>
<div class="page-group">
    <div class="page page-current" id="bt_event">

        <header class="bar bar-nav">
            <a class="button pull-left btn-back back close-popup" href="<?php echo WAP_PATH;?>lqscore/">
                <i class="fa fa-angle-left fa-2x orange"></i>
            </a>
            <h1 class='title'><a class="icon-angle-left fl"></a>篮球资料库</h1>
        </header>

        <!--<div class="bar bar-header-secondary">-->
            <!--<div class="searchbar">-->
                <!--<a class="searchbar-cancel">取消</a>-->
                <!--<div class="search-input">-->
                    <!--<label class="icon icon-search" for="search"></label>-->
                    <!--<input type="search" id='search' placeholder='搜索'/>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

        <div class="content">
            <div class="buttons-tab">
                <?php $n=1; if(is_array($area)) foreach($area AS $key => $r) { ?>
                <a href="#tab-<?php echo $key;?>" class="ft tab-item tab-link button <?php if($key === 'euro') { ?>active<?php } ?>"><?php echo $r['name'];?></a>
                <?php $n++;}unset($n); ?>
            </div>
            <div class="content-block">
                <div class="tabs">
                    <?php $n=1; if(is_array($stat)) foreach($stat AS $key => $value) { ?>
                    <div id="tab-<?php echo $key;?>" class="tab <?php if($key === 'euro') { ?>active<?php } ?>">
                        <div class="content-block">
                            <div class="buttons-row inner-nav">
                                <a href="#country-<?php echo $key;?>" class="button button-round active tab-link">国家</a>
                                <a href="#state-<?php echo $key;?>" class="button button-round tab-link">洲际</a>
                            </div>
                        </div>
                        <div class="tabs">
                                <!--国家-->
                                <?php $countryArr = array_chunk($value['country']['countryname'], ceil(count($value['country']['countryname'])/3));?>
                                <div id="country-<?php echo $key;?>" class="tab active">
                                    <div class="content-block">
                                        <div class="row mt15">
                                            <?php $n=1; if(is_array($countryArr)) foreach($countryArr AS $key2 => $value2) { ?>
                                            <div class="col-33 " <?php if($key2 != 0) { ?>style="border-left: 1px solid #cccccc;"<?php } ?>>
                                                <?php $n=1;if(is_array($value2)) foreach($value2 AS $r) { ?>
                                                <div class="item">
                                                    <a href="#country-list-<?php echo $r['countryid'];?>" class="item-country">
                                                        <img src="" height="40" class="fl mar10 bt-competition-photo">
                                                        <div class="team-name"><?php echo $r['countryname'];?></div>
                                                    </a>
                                                </div>
                                                <?php $n++;}unset($n); ?>
                                            </div>
                                            <?php $n++;}unset($n); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--洲际-->
                                <?php $sclassArr = array_chunk($value['zone'], ceil(count($value['zone'])/3));?>
                                <div id="state-<?php echo $key;?>" class="tab">
                                    <div class="content-block">
                                        <div class="row mt15">
                                            <?php $n=1; if(is_array($sclassArr)) foreach($sclassArr AS $key2 => $value2) { ?>
                                            <div class="col-33 " <?php if($key2 != 0) { ?>style="border-left: 1px solid #cccccc;"<?php } ?>>
                                                <?php $n=1;if(is_array($value2)) foreach($value2 AS $r) { ?>
                                                <div class="item">
                                                    <a href="<?php echo WAP_PATH;?>sclass/<?php echo $r['sclassid'];?>/schedule/" class="close-popup">
                                                        <img src="" height="40" class="fl mar10 bt-competition-photo">
                                                        <div class="team-name"><?php echo $r['name'];?></div>
                                                    </a>
                                                </div>
                                                <?php $n++;}unset($n); ?>
                                            </div>
                                            <?php $n++;}unset($n); ?>
                                        </div>
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
    <?php $n=1; if(is_array($stat)) foreach($stat AS $key => $value) { ?>
    <?php $n=1; if(is_array($value['country']['sclass'])) foreach($value['country']['sclass'] AS $id => $list) { ?>
    <div class="page" id="country-list-<?php echo $id;?>">
        <!-- header -->
        <header class="bar bar-nav">
            <a class="button pull-left btn-back" href="#bt_event">
                <i class="fa fa-angle-left fa-2x orange"></i>
            </a>
            <nav class="header-nav ml">
                <div class="buttons-row">
                    <span class="button"><?php echo $value['country']['countryname'][$id]['countryname'];?></span>
                </div>
            </nav>
        </header>
        <!-- header end -->
        <div class="content">

            <!-- match -->
            <div class="match-box">
                <div class="row">
                    <?php $n=1;if(is_array($list)) foreach($list AS $r) { ?>
                    <div class="col-50">
                        <a href="<?php echo WAP_PATH;?>sclass/<?php echo $r['sclassid'];?>/schedule/" class="match-item close-popup">
                            <img src="" alt="" class="pull-left bt-competition-photo" style="height: 1.8rem;margin-top: 0.15rem;">
                            <?php echo $r['name'];?>
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
