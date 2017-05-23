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
      <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>ft_match.css">
    <!-- build css end -->


  </head>
  <body>
    <div class="page-group">

        <div class="page page-current" id="ft_database">

            <?php include template('wap', 'ft_game_info'); ?>

            <div class="content">
                <!-- 二级导航 -->
                <div class="buttons-tab">
                    <a href="<?php echo WAP_PATH;?>game/<?php echo $gameid;?>/event/" class="tab-item button">事件</a>
                    <a href="<?php echo WAP_PATH;?>game/<?php echo $gameid;?>/lineup/" class="tab-item button">阵容</a>
                    <a href="<?php echo WAP_PATH;?>game/<?php echo $gameid;?>/analyse/" class="tab-item active button">分析</a>
                    <a href="<?php echo WAP_PATH;?>game/<?php echo $gameid;?>/oddsasia/" class="tab-item button">亚赔</a>
                    <a href="<?php echo WAP_PATH;?>game/<?php echo $gameid;?>/oddseuro/" class="tab-item button">欧赔</a>
                    <a href="<?php echo WAP_PATH;?>game/<?php echo $gameid;?>/oddsou/" class="tab-item button">大小</a>
                </div>
                <!-- 二级导航 end-->

                <!-- 积分排名 -->
                <div class="analyse-item">
                    <div class="analyse-title">积分排名</div>
                    <div class="analyse-inner-title">
                        <img src="<?php echo PHOTO_PATH;?>team/<?php echo $game_info['hometeamid'];?>.jpg" alt="<?php echo $game_info['homename'];?>" class="team-photo">
                        <?php echo $game_info['homename'];?>
                    </div>
                    <table class="table table-max table-noborder">
                        <tr>
                            <th>全区</th>
                            <th>赛</th>
                            <th>胜</th>
                            <th>平</th>
                            <th>负</th>
                            <th>进/失</th>
                            <th>净胜</th>
                            <th>积分</th>
                            <th class="orange">排名</th>
                        </tr>
                        <?php $n=1; if(is_array($standings_info[$game_info['hometeamid']])) foreach($standings_info[$game_info['hometeamid']] AS $type => $data) { ?>
                        <tr>
                            <td><?php echo L($type);?></td>
                            <td><?php echo $data['total'];?></td>
                            <td><?php echo $data['win'];?></td>
                            <td><?php echo $data['draw'];?></td>
                            <td><?php echo $data['lose'];?></td>
                            <td><?php echo $data['goal'];?>/<?php echo $data['nongoal'];?></td>
                            <td><?php echo $data['net'];?></td>
                            <td><?php echo $data['score'];?></td>
                            <td class="orange"><?php echo $data['rank'];?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>

                    <div class="analyse-inner-title">
                        <img src="<?php echo PHOTO_PATH;?>team/<?php echo $game_info['awayteamid'];?>.jpg" alt="<?php echo $game_info['awayname'];?>" class="team-photo">
                        <?php echo $game_info['awayname'];?>
                    </div>
                    <table class="table table-max table-noborder">
                        <tr>
                            <th>全区</th>
                            <th>赛</th>
                            <th>胜</th>
                            <th>平</th>
                            <th>负</th>
                            <th>进/失</th>
                            <th>净胜</th>
                            <th>积分</th>
                            <th class="orange">排名</th>
                        </tr>
                        <?php $n=1; if(is_array($standings_info[$game_info['awayteamid']])) foreach($standings_info[$game_info['awayteamid']] AS $type => $data) { ?>
                        <tr>
                            <td><?php echo L($type);?></td>
                            <td><?php echo $data['total'];?></td>
                            <td><?php echo $data['win'];?></td>
                            <td><?php echo $data['draw'];?></td>
                            <td><?php echo $data['lose'];?></td>
                            <td><?php echo $data['goal'];?>/<?php echo $data['nongoal'];?></td>
                            <td><?php echo $data['net'];?></td>
                            <td><?php echo $data['score'];?></td>
                            <td class="orange"><?php echo $data['rank'];?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>
                
                <!-- 交往战绩 -->
                <div class="analyse-item">
                    <div class="analyse-title">交往战绩</div>
                    <table class="table jw">
                        <tr>
                            <th width="16.5%">日期赛事</th>
                            <th width="29.3%">&nbsp;</th>
                            <th width="10%">对阵</th>
                            <th width="29.3%">&nbsp;</th>
                            <th width="">盘路</th>
                        </tr>
                        <?php $n=1;if(is_array($meeting)) foreach($meeting AS $data) { ?>
                        <tr>
                            <td>
                                <div class="line-lg gray"><?php echo $data['date'];?></div>
                                <div class="line-lg gray"><?php echo $data['competition_name'];?></div>
                            </td>
                            <td class="text-right">
                                <div class="line-lg"><span class="gray"><?php echo $data['homename'];?></span></div>
                                <div class="line-lg">&nbsp;</div>

                            </td>
                            <td>
                                <div class="line-lg">
                                    <span class="red"><?php echo $data['homescore'];?>-<?php echo $data['awayscore'];?></span>
                                </div>
                                <div class="line-lg">
                                    <span class="gray">
                                        <?php if($data['half']) { ?>
                                        ( <?php echo $data['half'];?> )
                                        <?php } ?>
                                    </span>
                                </div>
                            </td>
                            <td class="text-left">
                                <div class="line-lg"><span class="gray"><?php echo $data['awayname'];?></span></div>
                                <div class="line-lg">&nbsp;</div>
                            </td>
                            <td>
                                <div class="line-lg">
                                    <span class="<?php echo $data['plate']['0'];?>"><?php echo $data['handicap'];?></span>
                                </div>
                                <div class="line-lg">
                                    <span class="<?php echo $data['plate']['0'];?>"><?php echo L($data['plate'][0]);?><?php echo L($data['plate'][1]);?></span>
                                </div>
                            </td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                    <div class="analyse-hint">
                        近<?php echo count($meeting);?>场战绩，<?php echo $game_info['homename'];?><?php echo $meeting_stats['win'];?>胜<?php echo $meeting_stats['equal'];?>平<?php echo $meeting_stats['lose'];?>负，进<?php echo $meeting_stats['goal'];?>球，失<?php echo $meeting_stats['nongoal'];?>球，胜率：<?php echo $meeting_stats['win_rate'];?>
                    </div>
                </div>

                <!-- 近期战绩 -->
                <div class="analyse-item">
                    <div class="analyse-title">近期战绩</div>

                    <div class="analyse-inner-title">
                        <img src="<?php echo PHOTO_PATH;?>team/<?php echo $game_info['hometeamid'];?>.jpg" alt="<?php echo $game_info['homename'];?>" class="team-photo">
                        <?php echo $game_info['homename'];?>
                    </div>
                    <table class="table jw">
                        <tr>
                            <th width="16.5%">日期赛事</th>
                            <th width="29.3%">&nbsp;</th>
                            <th width="10%">对阵</th>
                            <th width="29.3%">&nbsp;</th>
                            <th width="">盘路</th>
                        </tr>
                        <?php $n=1;if(is_array($team_history['home'])) foreach($team_history['home'] AS $data) { ?>
                        <tr>
                            <td>
                                <div class="line-lg gray"><?php echo $data['date'];?></div>
                                <div class="line-lg gray"><?php echo $data['competition_name'];?></div>
                            </td>
                            <td class="text-right">
                                <div class="line-lg"><span class="gray"><?php echo $data['homename'];?></span></div>
                                <div class="line-lg">&nbsp;</div>

                            </td>
                            <td>
                                <div class="line-lg">
                                    <span class="red"><?php echo $data['homescore'];?>-<?php echo $data['awayscore'];?></span>
                                </div>
                                <div class="line-lg">
                                    <span class="gray">
                                        <?php if($data['half']) { ?>
                                        ( <?php echo $data['half'];?> )
                                        <?php } ?>
                                    </span>
                                </div>
                            </td>
                            <td class="text-left">
                                <div class="line-lg"><span class="gray"><?php echo $data['awayname'];?></span></div>
                                <div class="line-lg">&nbsp;</div>
                            </td>
                            <td>
                                <div class="line-lg">
                                    <span class="<?php echo $data['plate']['0'];?>"><?php echo $data['handicap'];?></span>
                                </div>
                                <div class="line-lg">
                                    <span class="<?php echo $data['plate']['0'];?>"><?php echo L($data['plate'][0]);?><?php echo L($data['plate'][1]);?></span>
                                </div>
                            </td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                    <div class="analyse-hint">
                        <?php echo $game_info['homename'];?>,
                        主场：<?php echo $history_stats['home']['home_win'];?>胜<?php echo $history_stats['home']['home_equal'];?>平<?php echo $history_stats['home']['home_lose'];?>负,
                        客场：<?php echo $history_stats['home']['away_win'];?>胜<?php echo $history_stats['home']['away_equal'];?>平<?php echo $history_stats['home']['away_lose'];?>负。
                    </div>

                    <div class="analyse-inner-title">
                        <img src="<?php echo PHOTO_PATH;?>team/<?php echo $game_info['awayteamid'];?>.jpg" alt="<?php echo $game_info['awayname'];?>" class="team-photo">
                        <?php echo $game_info['awayname'];?>
                    </div>
                    <table class="table jw">
                        <tr>
                            <th width="16.5%">日期赛事</th>
                            <th width="29.3%">&nbsp;</th>
                            <th width="10%">对阵</th>
                            <th width="29.3%">&nbsp;</th>
                            <th width="">盘路</th>
                        </tr>
                        <?php $n=1;if(is_array($team_history['away'])) foreach($team_history['away'] AS $data) { ?>
                        <tr>
                            <td>
                                <div class="line-lg gray"><?php echo $data['date'];?></div>
                                <div class="line-lg gray"><?php echo $data['competition_name'];?></div>
                            </td>
                            <td class="text-right">
                                <div class="line-lg"><span class="gray"><?php echo $data['homename'];?></span></div>
                                <div class="line-lg">&nbsp;</div>

                            </td>
                            <td>
                                <div class="line-lg">
                                    <span class="red"><?php echo $data['homescore'];?>-<?php echo $data['awayscore'];?></span>
                                </div>
                                <div class="line-lg">
                                    <span class="gray">
                                        <?php if($data['half']) { ?>
                                        ( <?php echo $data['half'];?> )
                                        <?php } ?>
                                    </span>
                                </div>
                            </td>
                            <td class="text-left">
                                <div class="line-lg"><span class="gray"><?php echo $data['awayname'];?></span></div>
                                <div class="line-lg">&nbsp;</div>
                            </td>
                            <td>
                                <div class="line-lg">
                                    <span class="<?php echo $data['plate']['0'];?>"><?php echo $data['handicap'];?></span>
                                </div>
                                <div class="line-lg">
                                    <span class="<?php echo $data['plate']['0'];?>"><?php echo L($data['plate'][0]);?><?php echo L($data['plate'][1]);?></span>
                                </div>
                            </td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                    <div class="analyse-hint">
                        <?php echo $game_info['awayname'];?>,
                        主场：<?php echo $history_stats['away']['home_win'];?>胜<?php echo $history_stats['away']['home_equal'];?>平<?php echo $history_stats['away']['home_lose'];?>负,
                        客场：<?php echo $history_stats['away']['away_win'];?>胜<?php echo $history_stats['away']['away_equal'];?>平<?php echo $history_stats['away']['away_lose'];?>负。
                    </div>
                </div>

                <!-- 盘路走势 -->
                <div class="analyse-item">
                    <div class="analyse-title">盘路走势</div>
                    <div class="analyse-inner-title">
                        <img src="<?php echo PHOTO_PATH;?>team/<?php echo $game_info['hometeamid'];?>.jpg" alt="<?php echo $game_info['homename'];?>" class="team-photo">
                        <?php echo $game_info['homename'];?>
                    </div>
                    <table class="table table-max table-noborder">
                        <tr>
                            <th></th>
                            <th>总场数</th>
                            <th>开盘</th>
                            <th>上盘</th>
                            <th class="border">赢盘</th>
                            <th>赢盘率</th>
                            <th>走水</th>
                            <th>输盘</th>
                            <th>净胜</th>
                        </tr>
                        <?php $n=1; if(is_array($oddsway_info[$game_info['hometeamid']])) foreach($oddsway_info[$game_info['hometeamid']] AS $type => $data) { ?>
                        <tr>
                            <td><?php echo L($type);?></td>
                            <td><?php echo $data['total'];?></td>
                            <td><?php echo $data['open'];?></td>
                            <td><?php echo $data['up'];?></td>
                            <td class="border"><?php echo $data['win'];?></td>
                            <td><?php echo $data['winrate'];?>%</td>
                            <td><?php echo $data['draw'];?></td>
                            <td><?php echo $data['lose'];?></td>
                            <td><?php echo $data['winlose'];?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                        <tr>
                            <td colspan="9">
                                近8场：
                                <?php $n=1;if(is_array($recent_info[$game_info['hometeamid']])) foreach($recent_info[$game_info['hometeamid']] AS $data) { ?>
                                <span class="<?php echo $data['0'];?>"><?php echo L($data[0]);?><?php echo L($data[1]);?></span>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                    </table>

                    <div class="analyse-inner-title">
                        <img src="<?php echo PHOTO_PATH;?>team/<?php echo $game_info['awayteamid'];?>.jpg" alt="<?php echo $game_info['awayname'];?>" class="team-photo">
                        <?php echo $game_info['awayname'];?>
                    </div>
                    <table class="table table-max table-noborder">
                        <tr>
                            <th></th>
                            <th>总场数</th>
                            <th>开盘</th>
                            <th>上盘</th>
                            <th class="border">赢盘</th>
                            <th>赢盘率</th>
                            <th>走水</th>
                            <th>输盘</th>
                            <th>净胜</th>
                        </tr>
                        <?php $n=1; if(is_array($oddsway_info[$game_info['awayteamid']])) foreach($oddsway_info[$game_info['awayteamid']] AS $type => $data) { ?>
                        <tr>
                            <td><?php echo L($type);?></td>
                            <td><?php echo $data['total'];?></td>
                            <td><?php echo $data['open'];?></td>
                            <td><?php echo $data['up'];?></td>
                            <td class="border"><?php echo $data['win'];?></td>
                            <td><?php echo $data['winrate'];?>%</td>
                            <td><?php echo $data['draw'];?></td>
                            <td><?php echo $data['lose'];?></td>
                            <td><?php echo $data['winlose'];?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                        <tr>
                            <td colspan="9">
                                近8场：
                                <?php $n=1;if(is_array($recent_info[$game_info['awayteamid']])) foreach($recent_info[$game_info['awayteamid']] AS $data) { ?>
                                <span class="<?php echo $data['0'];?>"><?php echo L($data[0]);?><?php echo L($data[1]);?></span>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                    </table>

                </div>


                <?php include template('wap', 'footer_nav'); ?>



            </div>
        </div>


    </div>

    <?php include template('wap', 'wap_footer'); ?>