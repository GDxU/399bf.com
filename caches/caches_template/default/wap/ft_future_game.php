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
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>ft_live_end.css">
    <!-- build css end -->


  </head>
  <body>
    <div class="page-group">

        <div class="page page-current" id="ft_futrue">
            
            <header class="bar bar-nav">
                <a class="button pull-left btn-back" href="<?php echo WAP_PATH;?>zqscore/">
                    <i class="icon icon-left orange"></i>
                </a>
                <nav class="header-nav">
                    <div class="buttons-row">
                        <a href="<?php echo WAP_PATH;?>zqwanchang/" class="button close-popup">完场</a>
                        <a href="<?php echo WAP_PATH;?>zqsaicheng/" class="button active">下日</a>
                    </div>
                </nav>
            </header>
            <div class="content">

                <!-- 二级导航 -->
                <div class="buttons-tab">
                    <?php $n=1;if(is_array($arr_date)) foreach($arr_date AS $data) { ?>
                    <a class="button <?php if($data['date'] == $date) { ?>active<?php } ?>" href="<?php echo WAP_PATH;?>zqsaicheng/?date=<?php echo $data['date'];?>">
                        <time><?php echo $data['date_text'];?></time>
                        <div class="tab-week"><?php echo $data['day'];?></div>
                    </a>
                    <?php $n++;}unset($n); ?>
                    <div class="button">
                        <i class="fa fa-calendar orange calendar-icon"></i>
                        <input type="text" id="calendar" class="button" readonly placeholder="" value="">
                    </div>
                    
                </div>

                <!-- 卡片 -->
                <div class="card-box">
                    <?php $n=1;if(is_array($future_game)) foreach($future_game AS $data) { ?>
                    <div class="card" data-action="link" data-url="<?php echo WAP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/">
                        <a href="<?php echo WAP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/" class="gray btn-link fixed-right">
                            <i class="icon icon-right"></i>
                        </a>
                        <table class="table">
                            <tr>
                                <th width="40%" class="text-left">
                                    <span class="card-title pull-left"><?php echo $data['competitionshortname'];?></span>
                                    <time class="gray time"><?php echo date('H:i', $data['date']);?></time>
                                </th>
                                <th>
                                    <span class="red state"><?php echo $data['status_text'];?></span>
                                </th>
                                <th width="40%">&nbsp;</th>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <span class="gray">
                                        <?php if(isset($data['homerank'])) { ?>
                                        [<?php echo $data['homerank'];?>]
                                        <?php } ?>
                                    </span>
                                    <span class="yellow-card"><?php echo $data['homeyellowcard'];?></span>
                                    <span class="red-card"><?php echo $data['homeredcard'];?></span>
                                    <span class="team-name"><?php echo $data['homeshortname'];?></span>
                                </td>
                                <td>
                                    <span class="live-score red"><?php echo $data['homescore'];?>-<?php echo $data['awayscore'];?></span>
                                </td>
                                <td class="text-left">
                                    <span class="team-name"><?php echo $data['awayshortname'];?></span>
                                    <span class="red-card"><?php echo $data['awayredcard'];?></span>
                                    <span class="yellow-card"><?php echo $data['awayyellowcard'];?></span>
                                    <span class="gray">
                                        <?php if(isset($data['awayrank'])) { ?>
                                        [<?php echo $data['awayrank'];?>]
                                        <?php } ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php $n++;}unset($n); ?>
                </div>
                <!-- 卡片 end -->


                <?php include template('wap', 'footer_nav'); ?>


            </div>
        </div>

    </div>

<?php $js = ['ft_future_game.js'];?>
<?php include template('wap', 'wap_footer'); ?>
