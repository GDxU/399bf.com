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

    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>main.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>bt_game_analyse.css">
</head>
<body>
<div class="page-group">
    <div class="page page-current">
        <!-- 你的html代码 -->
        <nav class="nav">
            <!-- header -->
            <header class="bar bar-nav">
                <a class="button pull-left back" href="<?php echo WAP_PATH;?>lqscore/">
                    <i class="icon icon-left"></i>
                </a>
                <h1 class="title white">
                    <?php echo $scheduleData['sclassname_cn'];?>
                    <?php echo $scheduleData['sclassseason'];?>
                </h1>
            </header>
            <!-- header end -->
            <div class="row match-nav">
                <div class="col-33 team">
                    <div class="team-icon">
                        <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['hometeamid'];?>.jpg" alt="" class="bt-team-photo">
                    </div>
                    <div class="team-name"><?php echo $scheduleData['homename_cn'];?></div>
                     <div class="team-rank">联赛排名：<?php echo $homeScheduleArr['0']['0']['6'];?></div>
                </div>
                <div class="col-33">
                    <div class="match-state">
                        <div class="score-line"><?php echo $scheduleData['homescore'];?>:<?php echo $scheduleData['guestscore'];?></div>
                        <p><?php echo date('Y-m-d', $scheduleData ['date']);?></p>
                        <p>半场<?php echo $scheduleData['homehalfscore'];?>:<?php echo $scheduleData['guesthalfscore'];?></p>
                        <p>状态:<?php echo $scheduleData['status_cn'];?></p>
                    </div>
                </div>
                <div class="col-33 team">
                    <div class="team-icon">
                        <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['guestteamid'];?>.jpg" alt="" class="bt-team-photo">
                    </div>
                    <div class="team-name"><?php echo $scheduleData['guestname_cn'];?></div>
                    <div class="team-rank">联赛排名：<?php echo $homeScheduleArr['2']['0']['6'];?></div>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="buttons-tab">
                <a href="<?php echo WAP_PATH;?>schedule/<?php echo $sclassid;?>/analyse/" class="tab-item active button">分析</a>
                <a href="<?php echo WAP_PATH;?>schedule/<?php echo $sclassid;?>/euro/" class="tab-item button">欧赔</a>
                <a href="<?php echo WAP_PATH;?>schedule/<?php echo $sclassid;?>/asia/" class="tab-item button">让分</a>
                <a href="<?php echo WAP_PATH;?>schedule/<?php echo $sclassid;?>/ou/" class="tab-item button">总分</a>
            </div>
            <div class="buttons-tab">
                <a href="#tab1" class="tab-link active button">交往战绩</a>
                <a href="#tab2" class="tab-link button">积分排名</a>
                <a href="#tab3" class="tab-link button">近期战绩</a>
                <a href="#tab4" class="tab-link button">盘路走势</a>
            </div>
            <div class="content-block">
                <div class="tabs">
                    <div id="tab1" class="tab active">
                        <div class="content-block">
                            <table>
                                <tr style="color: #999;">
                                    <td>日期赛事</td>
                                    <td></td>
                                    <td>对阵</td>
                                    <td></td>
                                    <td>盘路</td>
                                </tr>
                                <?php $n=1; if(is_array($beforeSchedule['sclass'])) foreach($beforeSchedule['sclass'] AS $key => $item) { ?>
                                <tr>
                                    <td>
                                        <div class="line"><?php echo date('Y-m-d', $item['date']);?></div>
                                        <div class="line"><?php echo $item['sclassname_cn'];?></div>
                                    </td>
                                    <td class="text-right">
                                        <div class="line"><span><?php echo $item['homename_cn'];?></span></div>
                                        <div class="line">&nbsp;</div>

                                    </td>
                                    <td>
                                        <div class="line">
                                            <span class="red"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></span>
                                        </div>
                                        <div class="line">
                                            <span>( <?php echo $item['homehalfscore'];?>-<?php echo $item['guesthalfscore'];?> )</span>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="line"><span><?php echo $item['guestname_cn'];?></span></div>
                                        <div>&nbsp;</div>
                                    </td>
                                    <td>
                                        <div class="line">
                                            <span class="green"><?php echo $item['total_plate'];?></span>
                                        </div>
                                        <div class="line">
                                            &nbsp;
                                        </div>
                                    </td>
                                </tr>
                                <?php $n++;}unset($n); ?>
                                <tr style="color: #999999;background-color: #fafafa;">
                                    <td colspan="5">两队近  <span class="red"><?php echo $beforeSchedule['match']['0'];?></span> 场交锋，
                                        <span class="red"><?php echo $scheduleData['homename_cn'];?></span>胜 
                                        <span class="red"><?php echo $beforeSchedule['match']['1'];?></span>场，胜率:
                                        <span class="red"><?php echo $beforeSchedule['match']['2'];?></span>, 让分胜率: 
                                        <span class="red"><?php echo $beforeSchedule['match']['3'];?></span> 大球率为:
                                        <span class="red"><?php echo $beforeSchedule['match']['4'];?></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div id="tab2" class="tab">
                        <div class="content-block">
                            <!--一条数据start-->
                            <div class="data-wrap">
                                <div class="data-title">
                                    <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['hometeamid'];?>.jpg" alt="" class="bt-team-photo">
                                   <?php echo $scheduleData['homename_cn'];?>
                                </div>
                                <table>
                                    <tr style="color: #999;">
                                        <td>全场</td>
                                        <td>赛</td>
                                        <td>胜</td>
                                        <td>负</td>
                                        <td>得</td>
                                        <td>失</td>
                                        <td>净胜</td>
                                        <td>胜率</td>
                                        <td class="orange">排名</td>
                                    </tr>
                                    <?php $n=1; if(is_array($homeScheduleArr[0])) foreach($homeScheduleArr[0] AS $key => $item) { ?>
                                    <tr>
                                        <td style="border-right: 1px solid #dddddd;"><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td class="orange"><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <tr style="color: #999;">
                                        <td>半场</td>
                                        <td>赛</td>
                                        <td>胜</td>
                                        <td>负</td>
                                        <td>得</td>
                                        <td>失</td>
                                        <td>净胜</td>
                                        <td>胜率</td>
                                        <td class="orange">排名</td>
                                    </tr>
                                    <?php $n=1; if(is_array($homeScheduleArr[1])) foreach($homeScheduleArr[1] AS $key => $item) { ?>
                                    <tr>
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td class="orange"><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </table>
                            </div>
                            <div class="data-wrap">
                                <div class="data-title">
                                    <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['guestteamid'];?>.jpg" alt="" class="bt-team-photo">
                                    <?php echo $scheduleData['guestname_cn'];?>
                                </div>
                                <table>
                                    <tr style="color: #999;">
                                        <td>全场</td>
                                        <td>赛</td>
                                        <td>胜</td>
                                        <td>负</td>
                                        <td>得</td>
                                        <td>失</td>
                                        <td>净胜</td>
                                        <td>胜率</td>
                                        <td class="orange">排名</td>
                                    </tr>
                                    <?php $n=1; if(is_array($homeScheduleArr[2])) foreach($homeScheduleArr[2] AS $key => $item) { ?>
                                    <tr>
                                        <td style="border-right: 1px solid #dddddd;"><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td class="orange"><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <tr style="color: #999;">
                                        <td>半场</td>
                                        <td>赛</td>
                                        <td>胜</td>
                                        <td>负</td>
                                        <td>得</td>
                                        <td>失</td>
                                        <td>净胜</td>
                                        <td>胜率</td>
                                        <td class="orange">排名</td>
                                    </tr>
                                    <?php $n=1; if(is_array($homeScheduleArr[3])) foreach($homeScheduleArr[3] AS $key => $item) { ?>
                                    <tr>
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td class="orange"><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </table>
                            </div>
                            <!--一条数据end-->
                        </div>
                    </div>
<!--                   近期战绩-->
                    <div id="tab3" class="tab">
                        <div class="content-block">
                            <div class="data-wrap">
                                <div class="data-title">
                                    <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['hometeamid'];?>.jpg" alt="" class="bt-team-photo"><?php echo $scheduleData['homename_cn'];?>
                                </div>
                                <table>
                                    <tr style="color: #999;">
                                        <td>日期赛事</td>
                                        <td style="text-align: right;">主</td>
                                        <td>对阵</td>
                                        <td style="text-align: left;">客</td>
                                        <td>盘路</td>
                                    </tr>
                                    <?php $n=1; if(is_array($recentSchedule['home'])) foreach($recentSchedule['home'] AS $key => $item) { ?>
                                    <tr>
                                        <td>
                                            <div class="line"><?php echo date('y-m-d', $item['date']);?></div>
                                            <div class="line"><?php echo $item['sclassname_cn'];?></div>
                                        </td>
                                        <td class="text-right">
                                            <div class="line"><span class="<?php if($item['hometeamid'] == $hometeamid) { ?>orange<?php } ?>"><?php echo $item['homename_cn'];?></span></div>
                                            <div class="line">&nbsp;</div>

                                        </td>
                                        <td>
                                            <div class="line">
                                                <span class="red"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></span>
                                            </div>
                                            <div class="line">
                                                <span>( <?php echo $item['homehalfscore'];?>-<?php echo $item['guesthalfscore'];?> )</span>
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="line"><span class="<?php if($item['guestteamid'] == $hometeamid) { ?>orange<?php } ?>"><?php echo $item['guestname_cn'];?></span></div>
                                            <div>&nbsp;</div>
                                        </td>
                                        <td>
                                            <div class="line">
                                                <span class="<?php if($item['total_result']=='大') { ?>red big<?php } else { ?>green<?php } ?>"><?php echo $item['letgoal'];?></span>
                                            </div>
                                            <div class="line">
                                                <span class="<?php if($item['let_plate']=='赢') { ?>red gain<?php } else { ?>green<?php } ?>"><?php echo $item['let_plate'];?></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <tr style="color: #999999;background-color: #fafafa;">
                                        <td colspan="5">
                                            近<span class="red" name="homecount">10</span>场，
                                            胜<span class="red" name="homewin">5</span>负<span class="green" name="homelose">5</span>,
                                            胜率:
                                            <span class="red" name="homewin_rate">50%</span>,
                                            赢盘率:
                                            <span class="red" name="homedish_rate">50%</span>,
                                            大球率为:
                                            <span class="red" name="homeball_rate">30%</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                                       <div class="data-wrap">
                                <div class="data-title">
                                    <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['guestteamid'];?>.jpg" alt="" class="bt-team-photo"><?php echo $scheduleData['guestname_cn'];?>
                                </div>
                                <table>
                                    <tr style="color: #999;">
                                        <td>日期赛事</td>
                                        <td style="text-align: right;">主</td>
                                        <td>对阵</td>
                                        <td style="text-align: left;">客</td>
                                        <td>盘路</td>
                                    </tr>
                                    <?php $n=1; if(is_array($recentSchedule['guest'])) foreach($recentSchedule['guest'] AS $key => $item) { ?>
                                    <tr>
                                        <td>
                                            <div class="line"><?php echo date('y-m-d', $item['date']);?></div>
                                            <div class="line"><?php echo $item['sclassname_cn'];?></div>
                                        </td>
                                        <td class="text-right">
                                            <div class="line"><span class="<?php if($item['hometeamid'] == $guestteamid) { ?>orange<?php } ?>"><?php echo $item['homename_cn'];?></span></div>
                                            <div class="line">&nbsp;</div>

                                        </td>
                                        <td>
                                            <div class="line">
                                                <span class="red"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></span>
                                            </div>
                                            <div class="line">
                                                <span>( <?php echo $item['homehalfscore'];?>-<?php echo $item['guesthalfscore'];?> )</span>
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="line"><span class="<?php if($item['guestteamid'] == $guestteamid) { ?>orange<?php } ?>"><?php echo $item['guestname_cn'];?></span></div>
                                            <div>&nbsp;</div>
                                        </td>
                                        <td>
                                            <div class="line">
                                                <span class="<?php if($item['total_result']=='大') { ?>red big<?php } else { ?>green<?php } ?>"><?php echo $item['letgoal'];?></span>
                                            </div>
                                            <div class="line">
                                                <span class="<?php if($item['let_plate']=='赢') { ?>red gain<?php } else { ?>green<?php } ?>"><?php echo $item['let_plate'];?></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <tr style="color: #999999;background-color: #fafafa;">
                                        <td colspan="5">
                                            近<span class="red" name="guestcount">10</span>场，
                                            胜<span class="red" name="guestwin">5</span>负<span class="green" name="guestlose">5</span>,
                                            胜率:
                                            <span class="red" name="guestwin_rate">50%</span>,
                                            赢盘率:
                                            <span class="red" name="guestdish_rate">50%</span>,
                                            大球率为:
                                            <span class="red" name="guestball_rate">30%</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tab4" class="tab">
                        <div class="content-block">
                            <!--一条数据start-->
<!--                            //盘路走势-->
                            <div class="data-wrap">
                                <div class="data-title">
                                    <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['hometeamid'];?>.jpg" alt="" class="bt-team-photo"><?php echo $scheduleData['homename_cn'];?>
                                </div>
                                <table>
                                    <tr style="color: #999;">
                                        <td>全场</td>
                                        <td>赛</td>
                                        <td>赢盘</td>
                                        <td>走水</td>
                                        <td>输盘</td>
                                        <td>赢盘率</td>
                                    </tr>
                                      <?php $n=1; if(is_array($letCompare[0])) foreach($letCompare[0] AS $key => $item) { ?>
                                    <tr>
                                        <td style="border-right: 1px solid #dddddd;"><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                         <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                    </tr>
                                     <?php $n++;}unset($n); ?>
                                    <tr style="color: #999;">
                                        <td>半场</td>
                                        <td>赛</td>
                                        <td>赢盘</td>
                                        <td>走水</td>
                                        <td>输盘</td>
                                        <td>赢盘率</td>
                                    </tr>
                                   <?php $n=1; if(is_array($letCompare[1])) foreach($letCompare[1] AS $key => $item) { ?>
                                    <tr>
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                                 <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </table>
                            </div>
                            <div class="data-wrap">
                                <div class="data-title">
                                    <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['guestteamid'];?>.jpg" alt="" class="bt-team-photo"><?php echo $scheduleData['guestname_cn'];?>
                                </div>
                                <table>
                                    <tr style="color: #999;">
                                        <td>全场</td>
                                        <td>赛</td>
                                        <td>赢盘</td>
                                        <td>走水</td>
                                        <td>输盘</td>
                                        <td>赢盘率</td>
                                    </tr>
                                    <?php $n=1; if(is_array($letCompare[2])) foreach($letCompare[2] AS $key => $item) { ?>
                                    <tr>
                                        <td style="border-right: 1px solid #dddddd;"><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                        <td><span class="red"><?php echo $item['2'];?></span></td>
                                        <?php if($key!=3) { ?>
                                        <td><span class="red"><?php echo $item['3'];?></span></td>
                                        <td><span class="red"><?php echo $item['4'];?></span></td>
                                        <?php } ?>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <tr style="color: #999;">
                                        <td>半场</td>
                                        <td>赛</td>
                                        <td>赢盘</td>
                                        <td>走水</td>
                                        <td>输盘</td>
                                        <td>赢盘率</td>
                                    </tr>
                                   <?php $n=1; if(is_array($letCompare[3])) foreach($letCompare[3] AS $key => $item) { ?>
                                    <tr>
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                        <td><span class="red"><?php echo $item['2'];?></span></td>
                                        <?php if($key!=3) { ?>
                                        <td><span class="red"><?php echo $item['3'];?></span></td>
                                        <td><span class="red"><?php echo $item['4'];?></span></td>
                                        <?php } ?>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </table>
                            </div>
                            <!--一条数据end-->
                        </div>
                    </div>
                </div>
            </div>

            <?php include template('wap', 'footer_nav'); ?>
        </div>



    </div>
</div>


<?php include template('wap', 'wap_footer'); ?>