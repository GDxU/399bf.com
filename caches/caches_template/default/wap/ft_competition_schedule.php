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

    <!-- 资料 详细页 -->
    <div class="page page-current" id="ft_database">

        <!-- header -->
        <header class="bar bar-nav">
            <a class="button pull-left btn-back" href="<?php echo WAP_PATH;?>zqevent/">
                <i class="icon icon-left orange"></i>
            </a>
            <h1 class="title orange"><?php echo $competition_info['range'];?> <?php echo $competition_info['shortname'];?></h1>
            <!--<a href="#" class="button pull-right btn-orange open-about-race">赛季</a>-->
        </header>
        <!-- header end -->


        <div class="content">


            <!-- 二级导航 -->
            <div class="buttons-tab">
                <a href="<?php echo WAP_PATH;?>competition/<?php echo $competitionid;?>/standings/"
                   class="tab-item button">积分</a>
                <a href="<?php echo WAP_PATH;?>competition/<?php echo $competitionid;?>/schedule/"
                   class="tab-item active button">赛程</a>
                <a href="<?php echo WAP_PATH;?>competition/<?php echo $competitionid;?>/oddsway/"
                   class="tab-item button">盘路</a>
                <a href="<?php echo WAP_PATH;?>competition/<?php echo $competitionid;?>/hfstat/"
                   class="tab-item button">半全场</a>
                <a href="<?php echo WAP_PATH;?>competition/<?php echo $competitionid;?>/shooter/"
                   class="tab-item button">射手榜</a>
            </div>
            <!-- 二级导航 end-->

            <!-- 内联导航 -->
            <div class=" inner-nav">
                <div class="select">
                    <input type="text" value="<?php echo $current;?>" id="picker-ring" class="input-select" readonly>
                    <i class="fa fa-angle-down fa-lg"></i>
                </div>
            </div>
            <!-- 内联导航 end -->

            <!-- match table -->
            <div class="match-table">
                <table class="table table-lg">
                    <thead>
                    <tr>
                        <td>时间</td>
                        <td>&nbsp;</td>
                        <td>对阵</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    </thead>
                    <tbody>
                    <?php $n=1;if(is_array($list)) foreach($list AS $data) { ?>
                    <tr data-action="link" data-url="<?php echo WAP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/">
                        <td width="18%">
                            <div class="line gray minfont"><?php echo date('y/m/d', $data['date']);?></div>
                            <div class="line gray minfont"><?php echo date('H:i', $data['date']);?></div>
                        </td>
                        <td width="25%" class="text-right">
                            <?php echo $team_info[$data['hometeamid']]['name'];?>
                        </td>
                        <td>
                            <span class="orange"><?php echo $data['homescore'];?>-<?php echo $data['awayscore'];?></span>
                            <span class="gray minfont">
                                <?php if($data['half']) { ?>
                                (<?php echo $data['half'];?>)
                                <?php } ?>
                            </span>
                        </td>
                        <td width="25%" class="text-left"><?php echo $team_info[$data['awayteamid']]['name'];?></td>
                        <td>
                            <a href="<?php echo WAP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/" class="gray btn-link">
                                <i class="fa fa-angle-right fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $n++;}unset($n); ?>
                    </tbody>
                </table>
            </div>
            <!-- match table end -->


            <?php include template('wap', 'footer_nav'); ?>


        </div>

        <!-- 赛季弹窗 -->
        <div class="popup popup-about-race">
            <header class="bar bar-nav">
                <h1 class="title">赛季</h1>
                <a class="close pull-right popup-close-race">
                    &times
                </a>
            </header>
            <ul class="content-block season-select">
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>
                <li>2016-2017</li>

            </ul>
        </div>

    </div>


</div>

<script>
    var WAP_PATH = '<?php echo WAP_PATH;?>';
    var competitionid = <?php echo $competitionid;?>;
    var category_value = [];
    var category_show = [];
    <?php $n=1; if(is_array($competition_category)) foreach($competition_category AS $key => $value) { ?>
    category_show.push('<?php echo $key;?>');
    category_value.push('<?php echo $value;?>');
    <?php $n++;}unset($n); ?>
</script>
<?php $js =['ft_competition_schedule.js'];?>
<?php include template('wap', 'wap_footer'); ?>

