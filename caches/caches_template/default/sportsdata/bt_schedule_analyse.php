<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = ['bt_schedule_analyse.css'];?>
<?php include template('content', 'header_score'); ?>

<!-- nav -->
<nav>
    <div class="container">
        <div class="crumbs" style="margin-top: 5px;">
            <i class="crumbs-icon"></i>当前位置：
            <a href="<?php echo APP_PATH;?>" class="orange">首页</a>&gt;
            <a href="<?php echo APP_PATH;?>lqevent/" class="orange">篮球资料库</a>&gt;
            <a href="<?php echo APP_PATH;?>sclass/<?php echo $scheduleData['scheduleid'];?>/schedule/" class="orange"><?php echo $scheduleData['sclassname_cn'];?></a>&gt;
            <?php echo $scheduleData['homename_cn'];?> vs <?php echo $scheduleData['guestname_cn'];?>
        </div>
        <div class="row matchNav">

            <div class="matchNav-hd clearfix">
                <div class="col-md-4">
                    <div class="match-tip">
                        <span>
                            <?php echo $sclassData['name_s'];?>
                            <?php echo $scheduleData['sclasscategory_cn'];?>
                        </span>
                        <span><?php echo $scheduleData['sclassseason'];?></span>
                    </div>
                    <div class="match-team">
                        <div class="team-rank">联赛排名：<?php echo $homeScheduleArr['0']['0']['6'];?></div>
                        <div class="team-name"><a href="<?php echo APP_PATH;?>lq/team/<?php echo $scheduleData['hometeamid'];?>/" target="_blank"><?php echo $scheduleData['homename_cn'];?></a></div>
                    </div>
                    <div class="match-team-icon">
                        <a href="<?php echo APP_PATH;?>lq/team/<?php echo $scheduleData['hometeamid'];?>/" target="_blank">
                            <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['hometeamid'];?>.jpg" alt="" class="bt-team-photo">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="match-score">
                        <div class="line-score">
                            <div class="team-score"><?php echo $scheduleData['homescore'];?>:<?php echo $scheduleData['guestscore'];?></div>
                            <div>半场<?php echo $scheduleData['homehalfscore'];?>:<?php echo $scheduleData['guesthalfscore'];?></div>
                        </div>
                        <div class="line-site">
                            <div>
                                <i class="site-icon"></i>
                                <?php echo $scheduleData['stadium'];?>
                            </div>
                            <div>
                                <span class="">状态:</span>
                                <?php echo $scheduleData['status_cn'];?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 right">
                    <div class="match-team-icon">
                        <a href="<?php echo APP_PATH;?>lq/team/<?php echo $scheduleData['guestteamid'];?>/" target="_blank">
                            <img src="<?php echo BT_TEAM_PATH;?><?php echo $scheduleData['guestteamid'];?>.jpg" alt="" class="bt-team-photo">
                        </a>
                    </div>
                    <div class="match-team">
                        <div class="team-rank">联赛排名：<?php echo $homeScheduleArr['2']['0']['6'];?></div>
                        <div class="team-name"><a href="<?php echo APP_PATH;?>lq/team/<?php echo $scheduleData['guestteamid'];?>/" target="_blank"><?php echo $scheduleData['guestname_cn'];?></a></div>
                    </div>
                </div>
            </div>
            <div class="matchNavBar">
                <ul class="clearfix">
                    <li><a href="javascript:;" class="active">分析</a></li>
                    <li><a href="<?php echo APP_PATH;?>schedule/<?php echo $scheduleData['scheduleid'];?>/euro/">欧赔</a></li>
                    <li><a href="<?php echo APP_PATH;?>schedule/<?php echo $scheduleData['scheduleid'];?>/asia/">让分</a></li>
                    <li><a href="<?php echo APP_PATH;?>schedule/<?php echo $scheduleData['scheduleid'];?>/ou/">总分</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>
<!-- nav end -->

<!-- main body -->
<section class="main pdB20" id="table-content">
    <div class="container">
        <div class="row">

            <!-- 联赛积分排名 -->
            <div class="score-item bt_scoreitem" id="scoreRank">

                <div class="score-item-hd">
                    <span class="score-item-title">联赛积分排名</span>
                </div>

                <div class="score-item-bd pdB20">

                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="9" class=""><?php echo $scheduleData['homename_cn'];?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th width="65">全场</th>
                                        <th>赛</th>
                                        <th>胜</th>
                                        <th>负</th>
                                        <th>得</th>
                                        <th>失</th>
                                        <th>净</th>
                                        <th>排名</th>
                                        <th class="">胜率</th>
                                    </tr>
                                    <?php $n=1; if(is_array($homeScheduleArr[0])) foreach($homeScheduleArr[0] AS $key => $item) { ?>
                                    <tr>
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><span class="red"><?php echo $item['3'];?></span></td>
                                        <td><span class="red"><?php echo $item['4'];?></span></td>
                                        <td><span class="red"><?php echo $item['5'];?></span></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td class=""><?php echo $item['7'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                                <tbody>
                                <tr>
                                    <th width="65">半场</th>
                                    <th>赛</th>
                                    <th>胜</th>
                                    <th>负</th>
                                    <th>得</th>
                                    <th>失</th>
                                    <th>净</th>
                                    <th>排名</th>
                                    <th class="">胜率</th>
                                </tr>
                                <?php $n=1; if(is_array($homeScheduleArr[1])) foreach($homeScheduleArr[1] AS $key => $item) { ?>
                                <tr>
                                    <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                    <td><?php echo $item['0'];?></td>
                                    <td><?php echo $item['1'];?></td>
                                    <td><?php echo $item['2'];?></td>
                                    <td><span class="red"><?php echo $item['3'];?></span></td>
                                    <td><span class="red"><?php echo $item['4'];?></span></td>
                                    <td><span class="red"><?php echo $item['5'];?></span></td>
                                    <td><?php echo $item['6'];?></td>
                                    <td class=""><?php echo $item['7'];?></td>
                                </tr>
                                <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="9" class="border"><?php echo $scheduleData['guestname_cn'];?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th width="65">全场</th>
                                        <th>赛</th>
                                        <th>胜</th>
                                        <th>负</th>
                                        <th>得</th>
                                        <th>失</th>
                                        <th>净</th>
                                        <th>排名</th>
                                        <th>胜率</th>
                                    </tr>
                                    <?php $n=1; if(is_array($homeScheduleArr[2])) foreach($homeScheduleArr[2] AS $key => $item) { ?>
                                    <tr>
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><span class="red"><?php echo $item['3'];?></span></td>
                                        <td><span class="red"><?php echo $item['4'];?></span></td>
                                        <td><span class="red"><?php echo $item['5'];?></span></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td class=""><?php echo $item['7'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                                <tbody>
                                <tr>
                                    <th width="65">全场</th>
                                    <th>赛</th>
                                    <th>胜</th>
                                    <th>负</th>
                                    <th>得</th>
                                    <th>失</th>
                                    <th>净</th>
                                    <th>排名</th>
                                    <th>胜率</th>
                                </tr>
                                <?php $n=1; if(is_array($homeScheduleArr[3])) foreach($homeScheduleArr[3] AS $key => $item) { ?>
                                <tr>
                                    <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                    <td><?php echo $item['0'];?></td>
                                    <td><?php echo $item['1'];?></td>
                                    <td><?php echo $item['2'];?></td>
                                    <td><span class="red"><?php echo $item['3'];?></span></td>
                                    <td><span class="red"><?php echo $item['4'];?></span></td>
                                    <td><span class="red"><?php echo $item['5'];?></span></td>
                                    <td><?php echo $item['6'];?></td>
                                    <td class=""><?php echo $item['7'];?></td>
                                </tr>
                                <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 交往战绩 -->
            <div class="score-item" id="jiaowang">
                <div class="score-item-hd">
                    <span class="score-item-title">交往战绩</span>
                </div>

                <div class="score-item-bd">
                    <table class="table">
                        <tr>
                            <th class="border">赛事</th>
                            <th class="border">比赛时间</th>
                            <th>主队</th>
                            <th>比分</th>
                            <th class="border">客队</th>
                            <th class="border">胜负</th>
                            <th class="border">分差</th>
                            <th class="border">让分盘</th>
                            <th class="border">盘路</th>
                            <th class="border">总分</th>
                            <th class="border">总分盘</th>
                            <th>盘路</th>
                        </tr>
                        <?php $n=1; if(is_array($beforeSchedule['sclass'])) foreach($beforeSchedule['sclass'] AS $key => $item) { ?>
                        <tr>
                            <td class="border"><?php echo $item['sclassname_cn'];?></td>
                            <td class="border"><?php echo date('Y-m-d', $item['date']);?></td>
                            <td><?php echo $item['homename_cn'];?></td>
                            <td>
                                <span class="red"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></span>
                                <span class="orange"><?php echo $item['homehalfscore'];?>-<?php echo $item['guesthalfscore'];?></span>
                            </td>
                            <td class="border"><?php echo $item['guestname_cn'];?></td>
                            <td class="border"><span class="green"><?php echo $item['result'];?></span></td>
                            <td class="border"><span class="red"><?php echo $item['poor'];?></span></td>
                            <td class="border"><?php echo $item['letgoal'];?></td>
                            <td class="border"><span class="red"><?php echo $item['plate'];?></span></td>
                            <td class="border"><span class="greenA"><?php echo $item['total_points'];?></span></td>
                            <td class="border"><?php echo $item['totalscore'];?></td>
                            <td><span class="red"><?php echo $item['total_plate'];?></span></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>

                <div class="score-item-fd">
                    <p class="hint">
                        两队近
                        <span class="red"><?php echo $beforeSchedule['match']['0'];?></span>
                        场交锋，<?php echo $scheduleData['homename_cn'];?>胜
                        <span class="red"><?php echo $beforeSchedule['match']['1'];?></span>
                        场，胜率:
                        <span class="red"><?php echo $beforeSchedule['match']['2'];?></span>,
                        让分胜率:
                        <span class="red"><?php echo $beforeSchedule['match']['3'];?></span>
                        大球率为:
                        <span class="red"><?php echo $beforeSchedule['match']['4'];?></span>

                    </p>
                </div>
            </div>

            <!-- 近期战绩 -->
            <div class="score-item bt_scoreitem" id="jinqi">
                <div class="score-item-hd">
                    <span class="score-item-title">近期战绩</span>
                </div>

                <div class="score-item-bd">
                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="9" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="homeRecentButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="homeRecentButton">
                                                    <ul>
                                                        <li onclick="homeRecent(2)">5</li>
                                                        <li onclick="homeRecent(3)">10</li>
                                                        <li onclick="homeRecent(4)">20</li>
                                                        <li onclick="homeRecent(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <label for="recent_home" class="checkbox-inline" onclick="homeRecent('', 'home')">
                                                <input type="checkbox" id="recent_home">
                                                <i class="table-checkbox"></i>
                                                主场
                                            </label>
                                            <label for="recent_general" class="checkbox-inline" onclick="homeRecent('', 'general')">
                                                <input type="checkbox" id="recent_general" checked="checked" >
                                                <i class="table-checkbox"></i>
                                                常规赛
                                            </label>
                                            <label for="recent_season_before" class="checkbox-inline" onclick="homeRecent('', 'before')">
                                                <input type="checkbox" id="recent_season_before">
                                                <i class="table-checkbox"></i>
                                                季前赛
                                            </label>
                                            <label for="recent_season_after" class="checkbox-inline" onclick="homeRecent('', 'after')">
                                                <input type="checkbox" id="recent_season_after" checked="checked">
                                                <i class="table-checkbox"></i>
                                                季后赛
                                            </label>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>NBA</th>
                                        <th>时间</th>
                                        <th>主队</th>
                                        <th>比分</th>
                                        <th>客队</th>
                                        <th>胜负</th>
                                        <th>分差</th>
                                        <th>盘口</th>
                                        <th class="">盘路</th>
                                    </tr>
                                    <?php $n=1; if(is_array($recentSchedule['home'])) foreach($recentSchedule['home'] AS $key => $item) { ?>

                                    <tr class="homeRecentAll homeRecent<?php echo $key;?> <?php if($item['hometeamid'] != $hometeamid) { ?>guestData<?php } ?> category<?php echo $item['sclasscategory'];?>"  <?php if($item['sclasscategory']==1) { ?>style="display: none;"<?php } ?>>
                                        <td><?php echo $item['sclassname_cn'];?></td>
                                        <td><?php echo date('y-m-d', $item['date']);?></td>
                                        <td class="<?php if($item['hometeamid'] == $hometeamid) { ?>orange<?php } ?>"><?php echo $item['homename_cn'];?></td>
                                        <td>
                                            <span class="red"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></span>
                                            <span class="orange">[<?php echo $item['homehalfscore'];?>-<?php echo $item['guesthalfscore'];?>]</span>
                                        </td>
                                        <td class="<?php if($item['guestteamid'] == $hometeamid) { ?>orange<?php } ?>"><?php echo $item['guestname_cn'];?></td>
                                        <td><span class="<?php if($item['result']=='胜') { ?>red win<?php } else { ?>green<?php } ?>"><?php echo $item['result'];?></span></td>
                                        <td><?php echo $item['poor'];?></td>
                                        <td>
                                            <?php echo $item['letgoal'];?>
                                            <span class="<?php if($item['total_result']=='大') { ?>red big<?php } else { ?>green<?php } ?>"></span>
                                        </td>
                                        <td><span class="<?php if($item['let_plate']=='赢') { ?>red gain<?php } else { ?>green<?php } ?>"><?php echo $item['let_plate'];?></span></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="9" class="border text-left">
                                            <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="guestRecentButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="guestRecentButton">
                                                    <ul>
                                                        <li onclick="guestRecent(2)">5</li>
                                                        <li onclick="guestRecent(3)">10</li>
                                                        <li onclick="guestRecent(4)">20</li>
                                                        <li onclick="guestRecent(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <label for="guest_recent_home" class="checkbox-inline" onclick="guestRecent('')">
                                                <input type="checkbox" id="guest_recent_home">
                                                <i class="table-checkbox"></i>
                                                客场
                                            </label>
                                            <label for="guest_recent_general" class="checkbox-inline" onclick="guestRecent('')">
                                                <input type="checkbox" id="guest_recent_general" checked="checked" >
                                                <i class="table-checkbox"></i>
                                                常规赛
                                            </label>
                                            <label for="guest_recent_season_before" class="checkbox-inline" onclick="guestRecent('')">
                                                <input type="checkbox" id="guest_recent_season_before">
                                                <i class="table-checkbox"></i>
                                                季前赛
                                            </label>
                                            <label for="guest_recent_season_after" class="checkbox-inline" onclick="guestRecent('')">
                                                <input type="checkbox" id="guest_recent_season_after" checked="checked">
                                                <i class="table-checkbox"></i>
                                                季后赛
                                            </label>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>NBA</th>
                                        <th>时间</th>
                                        <th>主队</th>
                                        <th>比分</th>
                                        <th>客队</th>
                                        <th>胜负</th>
                                        <th>分差</th>
                                        <th>盘口</th>
                                        <th>盘路</th>
                                    </tr>
                                    <?php $n=1; if(is_array($recentSchedule['guest'])) foreach($recentSchedule['guest'] AS $key => $item) { ?>
                                    <tr class="guestRecentAll guestRecent<?php echo $key;?> <?php if($item['hometeamid'] == $guestteamid) { ?>homeData<?php } ?> guest_category<?php echo $item['sclasscategory'];?>"  <?php if($item['sclasscategory']==1) { ?>style="display: none;"<?php } ?>>
                                    <td><?php echo $item['sclassname_cn'];?></td>
                                    <td><?php echo date('y-m-d', $item['date']);?></td>
                                    <td class="<?php if($item['hometeamid'] == $hometeamid) { ?>orange<?php } ?>"><?php echo $item['homename_cn'];?></td>
                                    <td>
                                        <span class="red"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></span>
                                        <span class="orange">[<?php echo $item['homehalfscore'];?>-<?php echo $item['guesthalfscore'];?>]</span>
                                    </td>
                                    <td class="<?php if($item['guestteamid'] == $guestteamid) { ?>orange<?php } ?>"><?php echo $item['guestname_cn'];?></td>
                                    <td><span class="<?php if($item['result']=='胜') { ?>red win<?php } else { ?>green<?php } ?>"><?php echo $item['result'];?></span></td>
                                    <td><?php echo $item['poor'];?></td>
                                    <td>
                                        <?php echo $item['letgoal'];?>
                                        <span class="<?php if($item['total_result']=='大') { ?>red big<?php } else { ?>green<?php } ?>"></span>
                                    </td>
                                    <td><span class="<?php if($item['let_plate']=='赢') { ?>red gain<?php } else { ?>green<?php } ?>"><?php echo $item['let_plate'];?></span></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="score-item-fd row">
                    <div class="col-md-6">
                         <p class="hint">
                            近<span class="red" name="homecount">10</span>场，
                            胜<span class="red" name="homewin">5</span>负<span class="green" name="homelose">5</span>,
                            胜率:
                            <span class="red" name="homewin_rate">50%</span>,
                            赢盘率:
                            <span class="red" name="homedish_rate">50%</span>,
                            大球率为:
                            <span class="red" name="homeball_rate">30%</span>
                        </p>
                    </div>
                    <div class="col-md-6">
                         <p class="hint">
                            近<span class="red" name="guestcount">10</span>场，
                            胜<span class="red" name="guestwin">5</span>负<span class="green" name="guestlose">5</span>,
                            胜率:
                            <span class="red" name="guestwin_rate">50%</span>,
                            赢盘率:
                            <span class="red" name="guestdish_rate">50%</span>,
                            大球率为:
                            <span class="red" name="guestball_rate">30%</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- 让分盘路比较 -->
            <div class="score-item bt_scoreitem" id="jinqiu">

                <div class="score-item-hd">
                    <span class="score-item-title">让分盘路比较</span>
                </div>

                 <div class="score-item-bd pdB20">
                        <div class="row">
                            <div class="col-md-6 pdR0">
                                <table class="table bigTable">
                                    <thead>
                                        <tr>
                                            <td colspan="7" class=" text-left">
                                                <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                                <div class="dropdown">
                                                    <button class="btn btn-default" id="homeLetCompareButton" data-toggle="dropdown">
                                                        近10场
                                                        <i class="icon-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="homeLetCompareButton">
                                                        <ul>
                                                            <li onclick="homeLetCompare(2)">5</li>
                                                            <li onclick="homeLetCompare(3)">10</li>
                                                            <li onclick="homeLetCompare(4)">20</li>
                                                            <li onclick="homeLetCompare(1)">总</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gray">
                                            <td colspan="7" class="">全场</td>
                                        </tr>
                                        <tr class="gray">
                                            <td>&nbsp;</td>
                                            <td>赛</td>
                                            <td>赢盘</td>
                                            <td>走水</td>
                                            <td>输盘</td>
                                            <td>赢盘率</td>
                                            <td class="">详情</td>
                                        </tr>
                                        <?php $n=1; if(is_array($letCompare[0])) foreach($letCompare[0] AS $key => $item) { ?>
                                        <tr class="homeLetCompare1" style="display: none;">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[4])) foreach($letCompare[4] AS $key => $item) { ?>
                                        <tr class="homeLetCompare2" style="display: none;">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>

                                        <?php $n=1; if(is_array($letCompare[8])) foreach($letCompare[8] AS $key => $item) { ?>
                                        <tr class="homeLetCompare3">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>

                                        <?php $n=1; if(is_array($letCompare[12])) foreach($letCompare[12] AS $key => $item) { ?>
                                        <tr class="homeLetCompare4" style="display: none;">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                    <tbody>
                                        <tr class="gray">
                                            <td colspan="7" class="">半场</td>
                                        </tr>
                                        <tr class="gray">
                                            <td>&nbsp;</td>
                                            <td>赛</td>
                                            <td>赢盘</td>
                                            <td>走水</td>
                                            <td>输盘</td>
                                            <td>赢盘率</td>
                                            <td class="">详情</td>
                                        </tr>
                                        <?php $n=1; if(is_array($letCompare[1])) foreach($letCompare[1] AS $key => $item) { ?>
                                        <tr class="homeLetCompare1" style="display: none;">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[5])) foreach($letCompare[5] AS $key => $item) { ?>
                                        <tr class="homeLetCompare2" style="display: none;">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[9])) foreach($letCompare[9] AS $key => $item) { ?>
                                        <tr class="homeLetCompare3">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[13])) foreach($letCompare[13] AS $key => $item) { ?>
                                        <tr class="homeLetCompare4" style="display: none;">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                    
                                </table>
                                <table class="table" style="border-top: none">
                                    <thead>
                                        <tr>
                                            <td colspan="9" class="">
                                                <b class="team-label">【相同历史盘口】</b>
                                                <div class="dropdown">
                                                    <button class="btn btn-default" id="homeSamePlateButton" data-toggle="dropdown">
                                                        近5场
                                                        <i class="icon-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="homeSamePlateButton">
                                                        <ul>
                                                            <li onclick="homeSamePlate(1)">5</li>
                                                            <li onclick="homeSamePlate(2)">10</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--<label for="season_after2" class="checkbox-inline">-->
                                                    <!--<input type="checkbox" id="season_after2">-->
                                                    <!--<i class="table-checkbox"></i>-->
                                                    <!--季后赛-->
                                                <!--</label>-->
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>赛事</th>
                                            <th>时间</th>
                                            <th class="noBorder">主队</th>
                                            <th class="noBorder">比分</th>
                                            <th>客队</th>
                                            <th>分差</th>
                                            <th>胜负</th>
                                            <th>盘口</th>
                                            <th class="">盘路</th>
                                        </tr>
                                        <?php $n=1; if(is_array($letSameData['home'])) foreach($letSameData['home'] AS $key => $item) { ?>
                                        <tr>
                                            <td><?php echo $item['sclassname_cn'];?></td>
                                            <td><?php echo date('y-m-d', $item['date']);?></td>
                                            <td class="noBorder"><span class="orange"><?php echo $item['homename_cn'];?></span></td>
                                            <td  class="noBorder"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></td>
                                            <td><?php echo $item['guestname_cn'];?></td>
                                            <td><?php echo $item['poor'];?></td>
                                            <td><span class="green"><?php echo $item['result'];?></span></td>
                                            <td><?php echo $item['letgoal'];?></td>
                                            <td class=""><span class="green"><?php echo $item['let_plate'];?></span></td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 pdL0">
                                <table class="table bigTable">
                                    <thead>
                                        <tr>
                                            <td colspan="7" class="text-left">
                                                <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                                <div class="dropdown">
                                                    <button class="btn btn-default" id="jw_dropA" data-toggle="dropdown">
                                                        近10场
                                                        <i class="icon-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="jw_dropA">
                                                        <ul>
                                                            <li onclick="guestLetCompare(2)">5</li>
                                                            <li onclick="guestLetCompare(3)">10</li>
                                                            <li onclick="guestLetCompare(4)">20</li>
                                                            <li onclick="guestLetCompare(1)">总</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gray">
                                            <td colspan="7">全场</td>
                                        </tr>
                                        <tr class="gray">
                                            <td>&nbsp;</td>
                                            <td>赛</td>
                                            <td>赢盘</td>
                                            <td>走水</td>
                                            <td>输盘</td>
                                            <td>赢盘率</td>
                                            <td>详情</td>
                                        </tr>
                                        <?php $n=1; if(is_array($letCompare[2])) foreach($letCompare[2] AS $key => $item) { ?>
                                        <tr class="guestLetCompare1" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[6])) foreach($letCompare[6] AS $key => $item) { ?>
                                        <tr class="guestLetCompare2" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[10])) foreach($letCompare[10] AS $key => $item) { ?>
                                        <tr class="guestLetCompare3">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[14])) foreach($letCompare[14] AS $key => $item) { ?>
                                        <tr class="guestLetCompare4" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>

                                    </tbody>
                                    <tbody>
                                        <tr class="gray">
                                            <td colspan="7">半场</td>
                                        </tr>
                                        <tr class="gray">
                                            <td>&nbsp;</td>
                                            <td>赛</td>
                                            <td>赢盘</td>
                                            <td>走水</td>
                                            <td>输盘</td>
                                            <td>赢盘率</td>
                                            <td>详情</td>
                                        </tr>
                                        <?php $n=1; if(is_array($letCompare[3])) foreach($letCompare[3] AS $key => $item) { ?>
                                        <tr class="guestLetCompare1" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[7])) foreach($letCompare[7] AS $key => $item) { ?>
                                        <tr class="guestLetCompare2" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[11])) foreach($letCompare[11] AS $key => $item) { ?>
                                        <tr class="guestLetCompare3">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($letCompare[15])) foreach($letCompare[15] AS $key => $item) { ?>
                                        <tr class="guestLetCompare4" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                </table>
                                 <table class="table" style="border-top: none">
                                    <thead>
                                        <tr>
                                            <td colspan="9" class="">
                                                <b class="team-label">【相同历史盘口】</b>
                                                <div class="dropdown">
                                                    <button class="btn btn-default" id="guestSamePlateButton" data-toggle="dropdown">
                                                        近5场
                                                        <i class="icon-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="guestSamePlateButton">
                                                        <ul>
                                                            <li onclick="guestSamePlate(1)">5</li>
                                                            <li onclick="guestSamePlate(2)">10</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--<label for="season_after3" class="checkbox-inline">-->
                                                    <!--<input type="checkbox" id="season_after3">-->
                                                    <!--<i class="table-checkbox"></i>-->
                                                    <!--季后赛-->
                                                <!--</label>-->
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>赛事</th>
                                            <th>时间</th>
                                            <th class="noBorder">主队</th>
                                            <th class="noBorder">比分</th>
                                            <th>客队</th>
                                            <th>分差</th>
                                            <th>胜负</th>
                                            <th>盘口</th>
                                            <th>盘路</th>
                                        </tr>
                                        <?php $n=1; if(is_array($letSameData['guest'])) foreach($letSameData['guest'] AS $key => $item) { ?>
                                        <tr>
                                            <td><?php echo $item['sclassname_cn'];?></td>
                                            <td><?php echo date('y-m-d', $item['date']);?></td>
                                            <td class="noBorder"><span class="orange"><?php echo $item['homename_cn'];?></span></td>
                                            <td  class="noBorder"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></td>
                                            <td><?php echo $item['guestname_cn'];?></td>
                                            <td><?php echo $item['poor'];?></td>
                                            <td><span class="green"><?php echo $item['result'];?></span></td>
                                            <td><?php echo $item['letgoal'];?></td>
                                            <td class=""><span class="green"><?php echo $item['let_plate'];?></span></td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
    
            <!-- 总分盘路比较 -->
            <div class="score-item bt_scoreitem" id="jinqiu">

                <div class="score-item-hd">
                    <span class="score-item-title">总分盘路比较</span>
                </div>

                 <div class="score-item-bd pdB20">
                        <div class="row">
                            <div class="col-md-6 pdR0">
                                <table class="table bigTable">
                                    <thead>
                                        <tr>
                                            <td colspan="7" class=" text-left">
                                                <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                                <div class="dropdown">
                                                    <button class="btn btn-default" id="homeTotalCompareButton" data-toggle="dropdown">
                                                        近10场
                                                        <i class="icon-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="homeTotalCompareButton">
                                                        <ul>
                                                            <li onclick="homeTotalCompare(2)">5</li>
                                                            <li onclick="homeTotalCompare(3)">10</li>
                                                            <li onclick="homeTotalCompare(4)">20</li>
                                                            <li onclick="homeTotalCompare(1)">总</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gray">
                                            <td colspan="7" class="">全场</td>
                                        </tr>
                                        <tr class="gray">
                                            <td>&nbsp;</td>
                                            <td>赛</td>
                                            <td>赢盘</td>
                                            <td>走水</td>
                                            <td>输盘</td>
                                            <td>赢盘率</td>
                                            <td class="">详情</td>
                                        </tr>
                                        <?php $n=1; if(is_array($totalCompare[0])) foreach($totalCompare[0] AS $key => $item) { ?>
                                        <tr class="homeTotalCompare1" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[4])) foreach($totalCompare[4] AS $key => $item) { ?>
                                        <tr class="homeTotalCompare2" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[8])) foreach($totalCompare[8] AS $key => $item) { ?>
                                        <tr class="homeTotalCompare3">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[12])) foreach($totalCompare[12] AS $key => $item) { ?>
                                        <tr class="homeTotalCompare4" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                    <tbody>
                                        <tr class="gray">
                                            <td colspan="7" class="">半场</td>
                                        </tr>
                                        <tr class="gray">
                                            <td>&nbsp;</td>
                                            <td>赛</td>
                                            <td>赢盘</td>
                                            <td>走水</td>
                                            <td>输盘</td>
                                            <td>赢盘率</td>
                                            <td class="">详情</td>
                                        </tr>
                                        <?php $n=1; if(is_array($totalCompare[1])) foreach($totalCompare[1] AS $key => $item) { ?>
                                        <tr class="homeTotalCompare1" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[5])) foreach($totalCompare[5] AS $key => $item) { ?>
                                        <tr class="homeTotalCompare2" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[9])) foreach($totalCompare[9] AS $key => $item) { ?>
                                        <tr class="homeTotalCompare3">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[13])) foreach($totalCompare[13] AS $key => $item) { ?>
                                        <tr class="homeTotalCompare4" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>
                                            <?php } ?>
                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                    
                                </table>
                                <table class="table" style="border-top: none">
                                    <thead>
                                        <tr>
                                            <td colspan="9" class="">
                                                <b class="team-label">【相同历史盘口】</b>
                                                <div class="dropdown">
                                                    <button class="btn btn-default" id="homeSameTotalButton" data-toggle="dropdown">
                                                        近10场
                                                        <i class="icon-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="homeSameTotalButton">
                                                        <ul>
                                                            <li onclick="homeSameTotal(1)">5</li>
                                                            <li onclick="homeSameTotal(2)">10</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--<label for="season_after4" class="checkbox-inline">-->
                                                    <!--<input type="checkbox" id="season_after4">-->
                                                    <!--<i class="table-checkbox"></i>-->
                                                    <!--季后赛1-->
                                                <!--</label>-->
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>赛事</th>
                                            <th>时间</th>
                                            <th class="noBorder">主队</th>
                                            <th class="noBorder">比分</th>
                                            <th>客队</th>
                                            <th>分差</th>
                                            <th>胜负</th>
                                            <th>盘口</th>
                                            <th class="">盘路</th>
                                        </tr>
                                        <?php $n=1; if(is_array($totalSameData['home'])) foreach($totalSameData['home'] AS $key => $item) { ?>
                                        <tr>
                                            <td><?php echo $item['sclassname_cn'];?></td>
                                            <td><?php echo date('y-m-d', $item['date']);?></td>
                                            <td class="noBorder"><span class="orange"><?php echo $item['homename_cn'];?></span></td>
                                            <td  class="noBorder"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></td>
                                            <td><?php echo $item['guestname_cn'];?></td>
                                            <td><?php echo $item['total_points'];?></td>
                                            <td><span class="green"><?php echo $item['result'];?></span></td>
                                            <td><?php echo $item['totalscore'];?></td>
                                            <td class=""><span class="green"><?php echo $item['total_result'];?></span></td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 pdL0">
                                <table class="table bigTable">
                                    <thead>
                                        <tr>
                                            <td colspan="7" class="text-left">
                                                <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                                <div class="dropdown">
                                                    <button class="btn btn-default" id="guestTotalCompareButton" data-toggle="dropdown">
                                                        近10场
                                                        <i class="icon-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="guestTotalCompareButton">
                                                        <ul>
                                                            <li onclick="guestTotalCompare(2)">5</li>
                                                            <li onclick="guestTotalCompare(3)">10</li>
                                                            <li onclick="guestTotalCompare(4)">20</li>
                                                            <li onclick="guestTotalCompare(1)">总</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gray">
                                            <td colspan="7">全场</td>
                                        </tr>
                                        <tr class="gray">
                                            <td>&nbsp;</td>
                                            <td>赛</td>
                                            <td>赢盘</td>
                                            <td>走水</td>
                                            <td>输盘</td>
                                            <td>赢盘率</td>
                                            <td>详情</td>
                                        </tr>
                                        <?php $n=1; if(is_array($totalCompare[2])) foreach($totalCompare[2] AS $key => $item) { ?>
                                        <tr class="guestTotalCompare1" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>

                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <?php } ?>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                                <!--<?php echo $item['5'];?>-->
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[6])) foreach($totalCompare[6] AS $key => $item) { ?>
                                        <tr class="guestTotalCompare2" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>

                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <?php } ?>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                                <!--<?php echo $item['5'];?>-->
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[10])) foreach($totalCompare[10] AS $key => $item) { ?>
                                        <tr class="guestTotalCompare3">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>

                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <?php } ?>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                                <!--<?php echo $item['5'];?>-->
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[14])) foreach($totalCompare[14] AS $key => $item) { ?>
                                        <tr class="guestTotalCompare4" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>

                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <?php } ?>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                                <!--<?php echo $item['5'];?>-->
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                    <tbody>
                                        <tr class="gray">
                                            <td colspan="7">半场</td>
                                        </tr>
                                        <tr class="gray">
                                            <td>&nbsp;</td>
                                            <td>赛</td>
                                            <td>赢盘</td>
                                            <td>走水</td>
                                            <td>输盘</td>
                                            <td>赢盘率</td>
                                            <td>详情</td>
                                        </tr>
                                        <?php $n=1; if(is_array($totalCompare[3])) foreach($totalCompare[3] AS $key => $item) { ?>
                                        <tr class="guestTotalCompare1" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>

                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <?php } ?>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                                <!--<?php echo $item['5'];?>-->
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[7])) foreach($totalCompare[7] AS $key => $item) { ?>
                                        <tr class="guestTotalCompare2" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>

                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <?php } ?>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                                <!--<?php echo $item['5'];?>-->
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[11])) foreach($totalCompare[11] AS $key => $item) { ?>
                                        <tr class="guestTotalCompare3">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>

                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <?php } ?>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                                <!--<?php echo $item['5'];?>-->
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n=1; if(is_array($totalCompare[15])) foreach($totalCompare[15] AS $key => $item) { ?>
                                        <tr class="guestTotalCompare4" style="display: none">
                                            <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } elseif ($key==3) { ?>近6场<?php } ?></td>

                                            <td><?php echo $item['0'];?></td>

                                            <td <?php if($key==3) { ?>colspan="3"<?php } ?>><?php echo $item['1'];?></td>

                                            <?php if($key!=3) { ?>
                                            <td><span class="red"><?php echo $item['2'];?></span></td>
                                            <td><span class="red"><?php echo $item['3'];?></span></td>
                                            <?php } ?>
                                            <td><span class="red"><?php echo $item['4'];?></span></td>

                                            <td class="">
                                                <a href="##" class="greenA">查看</a>
                                                <!--<?php echo $item['5'];?>-->
                                            </td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                </table>
                                 <table class="table" style="border-top: none">
                                    <thead>
                                        <tr>
                                            <td colspan="9" class="">
                                                <b class="team-label">【相同历史盘口】</b>
                                                <div class="dropdown">
                                                    <button class="btn btn-default" id="guestSameTotalButton" data-toggle="dropdown">
                                                        近10场
                                                        <i class="icon-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="guestSameTotalButton">
                                                        <ul>
                                                            <li onclick="guestSameTotal(1)">5</li>
                                                            <li onclick="guestSameTotal(2)">10</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <label for="season_after5" class="checkbox-inline">
                                                    <input type="checkbox" id="season_after5">
                                                    <i class="table-checkbox"></i>
                                                    季后赛
                                                </label>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>赛事</th>
                                            <th>时间</th>
                                            <th class="noBorder">主队</th>
                                            <th class="noBorder">比分</th>
                                            <th>客队</th>
                                            <th>分差</th>
                                            <th>胜负</th>
                                            <th>盘口</th>
                                            <th>盘路</th>
                                        </tr>
                                        <?php $n=1; if(is_array($totalSameData['guest'])) foreach($totalSameData['guest'] AS $key => $item) { ?>
                                        <tr>
                                            <td><?php echo $item['sclassname_cn'];?></td>
                                            <td><?php echo date('y-m-d', $item['date']);?></td>
                                            <td class="noBorder"><span class="orange"><?php echo $item['homename_cn'];?></span></td>
                                            <td  class="noBorder"><?php echo $item['homescore'];?>-<?php echo $item['guestscore'];?></td>
                                            <td><?php echo $item['guestname_cn'];?></td>
                                            <td><?php echo $item['total_points'];?></td>
                                            <td><span class="green"><?php echo $item['result'];?></span></td>
                                            <td><?php echo $item['totalscore'];?></td>
                                            <td class=""><span class="green"><?php echo $item['total_result'];?></span></td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>

            <!-- 平均得分/失分对比 -->
            <div class="score-item bt_scoreitem">
                <div class="score-item-hd">
                    <span class="score-item-title">平均得分/失分对比</span>
                </div>

                <div class="score-item-bd pdB20">
                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="8" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="homeAvgCompareButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="homeAvgCompareButton">
                                                    <ul>
                                                        <li onclick="homeAvgCompare(2)">5</li>
                                                        <li onclick="homeAvgCompare(3)">10</li>
                                                        <li onclick="homeAvgCompare(4)">20</li>
                                                        <li onclick="homeAvgCompare(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td rowspan="2"></td>
                                        <td rowspan="2">场次</td>
                                        <td>第一节</td>
                                        <td>第二节</td>
                                        <td>第三节</td>
                                        <td>第四节</td>
                                        <td>加时</td>
                                        <td class="">全场</td>
                                    </tr>
                                    <tr class="gray">
                                        <td>得失</td>
                                        <td>得失</td>
                                        <td>得失</td>
                                        <td>得失</td>
                                        <td>得失</td>
                                        <td class="">得失</td>
                                    </tr>
                                    <?php $n=1; if(is_array($getLossScore[0])) foreach($getLossScore[0] AS $key => $item) { ?>
                                    <tr class="homeAvgCompare1" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['1'];?></span>
                                            <span class="col-inline"><?php echo $item['2'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['3'];?></span>
                                            <span class="col-inline"><?php echo $item['4'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['5'];?></span>
                                            <span class="col-inline"><?php echo $item['6'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['7'];?></span>
                                            <span class="col-inline"><?php echo $item['8'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['9'];?></span>
                                            <span class="col-inline"><?php echo $item['10'];?></span>
                                        </td>
                                        <td class="">
                                            <span class="col-inline"><?php echo $item['11'];?></span>
                                            <span class="col-inline"><?php echo $item['12'];?></span>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($getLossScore[4])) foreach($getLossScore[4] AS $key => $item) { ?>
                                    <tr class="homeAvgCompare2" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['1'];?></span>
                                            <span class="col-inline"><?php echo $item['2'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['3'];?></span>
                                            <span class="col-inline"><?php echo $item['4'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['5'];?></span>
                                            <span class="col-inline"><?php echo $item['6'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['7'];?></span>
                                            <span class="col-inline"><?php echo $item['8'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['9'];?></span>
                                            <span class="col-inline"><?php echo $item['10'];?></span>
                                        </td>
                                        <td class="">
                                            <span class="col-inline"><?php echo $item['11'];?></span>
                                            <span class="col-inline"><?php echo $item['12'];?></span>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($getLossScore[8])) foreach($getLossScore[8] AS $key => $item) { ?>
                                    <tr class="homeAvgCompare3">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['1'];?></span>
                                            <span class="col-inline"><?php echo $item['2'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['3'];?></span>
                                            <span class="col-inline"><?php echo $item['4'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['5'];?></span>
                                            <span class="col-inline"><?php echo $item['6'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['7'];?></span>
                                            <span class="col-inline"><?php echo $item['8'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['9'];?></span>
                                            <span class="col-inline"><?php echo $item['10'];?></span>
                                        </td>
                                        <td class="">
                                            <span class="col-inline"><?php echo $item['11'];?></span>
                                            <span class="col-inline"><?php echo $item['12'];?></span>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($getLossScore[12])) foreach($getLossScore[12] AS $key => $item) { ?>
                                    <tr class="homeAvgCompare4" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['1'];?></span>
                                            <span class="col-inline"><?php echo $item['2'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['3'];?></span>
                                            <span class="col-inline"><?php echo $item['4'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['5'];?></span>
                                            <span class="col-inline"><?php echo $item['6'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['7'];?></span>
                                            <span class="col-inline"><?php echo $item['8'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['9'];?></span>
                                            <span class="col-inline"><?php echo $item['10'];?></span>
                                        </td>
                                        <td class="">
                                            <span class="col-inline"><?php echo $item['11'];?></span>
                                            <span class="col-inline"><?php echo $item['12'];?></span>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="8" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="guestAvgCompareButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="guestAvgCompareButton">
                                                    <ul>
                                                        <li onclick="guestAvgCompare(2)">5</li>
                                                        <li onclick="guestAvgCompare(3)">10</li>
                                                        <li onclick="guestAvgCompare(4)">20</li>
                                                        <li onclick="guestAvgCompare(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td rowspan="2"></td>
                                        <td rowspan="2">场次</td>
                                        <td>第一节</td>
                                        <td>第二节</td>
                                        <td>第三节</td>
                                        <td>第四节</td>
                                        <td>加时</td>
                                        <td>全场</td>
                                    </tr>
                                    <tr class="gray">
                                        <td>得失</td>
                                        <td>得失</td>
                                        <td>得失</td>
                                        <td>得失</td>
                                        <td>得失</td>
                                        <td>得失</td>
                                    </tr>
                                    <?php $n=1; if(is_array($getLossScore[1])) foreach($getLossScore[1] AS $key => $item) { ?>
                                    <tr class="guestAvgCompare1" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['1'];?></span>
                                            <span class="col-inline"><?php echo $item['2'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['3'];?></span>
                                            <span class="col-inline"><?php echo $item['4'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['5'];?></span>
                                            <span class="col-inline"><?php echo $item['6'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['7'];?></span>
                                            <span class="col-inline"><?php echo $item['8'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['9'];?></span>
                                            <span class="col-inline"><?php echo $item['10'];?></span>
                                        </td>
                                        <td class="">
                                            <span class="col-inline"><?php echo $item['11'];?></span>
                                            <span class="col-inline"><?php echo $item['12'];?></span>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($getLossScore[5])) foreach($getLossScore[5] AS $key => $item) { ?>
                                    <tr class="guestAvgCompare2" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['1'];?></span>
                                            <span class="col-inline"><?php echo $item['2'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['3'];?></span>
                                            <span class="col-inline"><?php echo $item['4'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['5'];?></span>
                                            <span class="col-inline"><?php echo $item['6'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['7'];?></span>
                                            <span class="col-inline"><?php echo $item['8'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['9'];?></span>
                                            <span class="col-inline"><?php echo $item['10'];?></span>
                                        </td>
                                        <td class="">
                                            <span class="col-inline"><?php echo $item['11'];?></span>
                                            <span class="col-inline"><?php echo $item['12'];?></span>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($getLossScore[9])) foreach($getLossScore[9] AS $key => $item) { ?>
                                    <tr class="guestAvgCompare3">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['1'];?></span>
                                            <span class="col-inline"><?php echo $item['2'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['3'];?></span>
                                            <span class="col-inline"><?php echo $item['4'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['5'];?></span>
                                            <span class="col-inline"><?php echo $item['6'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['7'];?></span>
                                            <span class="col-inline"><?php echo $item['8'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['9'];?></span>
                                            <span class="col-inline"><?php echo $item['10'];?></span>
                                        </td>
                                        <td class="">
                                            <span class="col-inline"><?php echo $item['11'];?></span>
                                            <span class="col-inline"><?php echo $item['12'];?></span>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($getLossScore[13])) foreach($getLossScore[13] AS $key => $item) { ?>
                                    <tr class="guestAvgCompare4" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['1'];?></span>
                                            <span class="col-inline"><?php echo $item['2'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['3'];?></span>
                                            <span class="col-inline"><?php echo $item['4'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['5'];?></span>
                                            <span class="col-inline"><?php echo $item['6'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['7'];?></span>
                                            <span class="col-inline"><?php echo $item['8'];?></span>
                                        </td>
                                        <td>
                                            <span class="col-inline"><?php echo $item['9'];?></span>
                                            <span class="col-inline"><?php echo $item['10'];?></span>
                                        </td>
                                        <td class="">
                                            <span class="col-inline"><?php echo $item['11'];?></span>
                                            <span class="col-inline"><?php echo $item['12'];?></span>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 球队入球分数/单双统计 -->
            <div class="score-item bt_scoreitem">
                <div class="score-item-hd">
                    <span class="score-item-title">球队入球分数/单双统计</span>
                </div>

                <div class="score-item-bd pdB20">
                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="11" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="teamScoreButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="teamScoreButton">
                                                    <ul>
                                                        <li onclick="homeTeamScore(2)">5</li>
                                                        <li onclick="homeTeamScore(3)">10</li>
                                                        <li onclick="homeTeamScore(4)">20</li>
                                                        <li onclick="homeTeamScore(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td></td>
                                        <td>赛</td>
                                        <td>70-</td>
                                        <td>71-80</td>
                                        <td>81-90</td>
                                        <td>91-100</td>
                                        <td>100-110</td>
                                        <td>111-120</td>
                                        <td>120+</td>
                                        <td>单</td>
                                        <td class="">双</td>
                                    </tr>
                                    <?php $n=1; if(is_array($teamScore[0])) foreach($teamScore[0] AS $key => $item) { ?>
                                    <tr class="homeTeamScore1" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($teamScore[4])) foreach($teamScore[4] AS $key => $item) { ?>
                                    <tr class="homeTeamScore2" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($teamScore[8])) foreach($teamScore[8] AS $key => $item) { ?>
                                    <tr class="homeTeamScore3">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($teamScore[12])) foreach($teamScore[12] AS $key => $item) { ?>
                                    <tr class="homeTeamScore4" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="11" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="guestTeamScoreButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="guestTeamScoreButton">
                                                    <ul>
                                                        <li onclick="guestTeamScore(2)">5</li>
                                                        <li onclick="guestTeamScore(3)">10</li>
                                                        <li onclick="guestTeamScore(4)">20</li>
                                                        <li onclick="guestTeamScore(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td></td>
                                        <td>赛</td>
                                        <td>70-</td>
                                        <td>71-80</td>
                                        <td>81-90</td>
                                        <td>91-100</td>
                                        <td>100-110</td>
                                        <td>111-120</td>
                                        <td>120+</td>
                                        <td>单</td>
                                        <td class="">双</td>
                                    </tr>
                                    <?php $n=1; if(is_array($teamScore[1])) foreach($teamScore[1] AS $key => $item) { ?>
                                    <tr class="guestTeamScore1" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($teamScore[5])) foreach($teamScore[5] AS $key => $item) { ?>
                                    <tr class="guestTeamScore2" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($teamScore[9])) foreach($teamScore[9] AS $key => $item) { ?>
                                    <tr class="guestTeamScore3">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($teamScore[13])) foreach($teamScore[13] AS $key => $item) { ?>
                                    <tr class="guestTeamScore4" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 总分统计 -->
            <div class="score-item bt_scoreitem">
                <div class="score-item-hd">
                    <span class="score-item-title">总分统计</span>
                </div>

                <div class="score-item-bd pdB20">
                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="11" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="homeTotalScoreButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="homeTotalScoreButton">
                                                    <ul>
                                                        <li onclick="homeTotalScore(2)">5</li>
                                                        <li onclick="homeTotalScore(3)">10</li>
                                                        <li onclick="homeTotalScore(4)">20</li>
                                                        <li onclick="homeTotalScore(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td></td>
                                        <td>赛</td>
                                        <td>160-</td>
                                        <td>160-170</td>
                                        <td>170-180</td>
                                        <td>180-190</td>
                                        <td>190-200</td>
                                        <td>200-210</td>
                                        <td>210-220</td>
                                        <td>220-230</td>
                                        <td class="">230+</td>
                                    </tr>
                                    <?php $n=1; if(is_array($totalScore[0])) foreach($totalScore[0] AS $key => $item) { ?>
                                    <tr class="homeTotalScore1" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td class=""><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($totalScore[4])) foreach($totalScore[4] AS $key => $item) { ?>
                                    <tr class="homeTotalScore2" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td class=""><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($totalScore[8])) foreach($totalScore[8] AS $key => $item) { ?>
                                    <tr class="homeTotalScore3">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td class=""><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($totalScore[12])) foreach($totalScore[12] AS $key => $item) { ?>
                                    <tr class="homeTotalScore4" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td class=""><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="11" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="guestTotalScoreButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="guestTotalScoreButton">
                                                    <ul>
                                                        <li onclick="guestTotalScore(2)">5</li>
                                                        <li onclick="guestTotalScore(3)">10</li>
                                                        <li onclick="guestTotalScore(4)">20</li>
                                                        <li onclick="guestTotalScore(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td></td>
                                        <td>赛</td>
                                        <td>160-</td>
                                        <td>160-170</td>
                                        <td>170-180</td>
                                        <td>180-190</td>
                                        <td>190-200</td>
                                        <td>200-210</td>
                                        <td>210-220</td>
                                        <td>220-230</td>
                                        <td class="">230+</td>
                                    </tr>
                                    <?php $n=1; if(is_array($totalScore[1])) foreach($totalScore[1] AS $key => $item) { ?>
                                    <tr class="guestTotalScore1" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td class=""><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($totalScore[5])) foreach($totalScore[5] AS $key => $item) { ?>
                                    <tr class="guestTotalScore2" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td class=""><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($totalScore[9])) foreach($totalScore[9] AS $key => $item) { ?>
                                    <tr class="guestTotalScore3">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td class=""><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($totalScore[13])) foreach($totalScore[13] AS $key => $item) { ?>
                                    <tr class="guestTotalScore4" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td><?php echo $item['6'];?></td>
                                        <td><?php echo $item['7'];?></td>
                                        <td><?php echo $item['8'];?></td>
                                        <td class=""><?php echo $item['9'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 全半场 -->
            <div class="score-item bt_scoreitem">
                <div class="score-item-hd">
                    <span class="score-item-title">全半场</span>
                </div>

                <div class="score-item-bd pdB20">
                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="8" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="homeHalfTotalButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="homeHalfTotalButton">
                                                    <ul>
                                                        <li onclick="homeHalfTotal(2)">5</li>
                                                        <li onclick="homeHalfTotal(3)">10</li>
                                                        <li onclick="homeHalfTotal(4)">20</li>
                                                        <li onclick="homeHalfTotal(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td>半场</td>
                                        <td rowspan="2">赛</td>
                                        <td>胜</td>
                                        <td>胜</td>
                                        <td>和</td>
                                        <td>和</td>
                                        <td>负</td>
                                        <td class="">负</td>
                                    </tr>
                                    <tr class="gray">
                                        <td>全场</td>
                                        <td>胜</td>
                                        <td>胜</td>
                                        <td>和</td>
                                        <td>和</td>
                                        <td>负</td>
                                        <td class="">负</td>
                                    </tr>
                                    <?php $n=1; if(is_array($halfTotal[0])) foreach($halfTotal[0] AS $key => $item) { ?>
                                    <tr class="homeHalfTotal1" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td class=""><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($halfTotal[4])) foreach($halfTotal[4] AS $key => $item) { ?>
                                    <tr class="homeHalfTotal2" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td class=""><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($halfTotal[8])) foreach($halfTotal[8] AS $key => $item) { ?>
                                    <tr class="homeHalfTotal3">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td class=""><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($halfTotal[12])) foreach($halfTotal[12] AS $key => $item) { ?>
                                    <tr class="homeHalfTotal4" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td class=""><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                             <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="8" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="guestHalfTotalButton" data-toggle="dropdown">
                                                    近10场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="guestHalfTotalButton">
                                                    <ul>
                                                        <li onclick="guestHalfTotal(2)">5</li>
                                                        <li onclick="guestHalfTotal(3)">10</li>
                                                        <li onclick="guestHalfTotal(4)">20</li>
                                                        <li onclick="guestHalfTotal(1)">总</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td>半场</td>
                                        <td rowspan="2">赛</td>
                                        <td>胜</td>
                                        <td>胜</td>
                                        <td>和</td>
                                        <td>和</td>
                                        <td>负</td>
                                        <td class="">负</td>
                                    </tr>
                                    <tr class="gray">
                                        <td>全场</td>
                                        <td>胜</td>
                                        <td>胜</td>
                                        <td>和</td>
                                        <td>和</td>
                                        <td>负</td>
                                        <td class="">负</td>
                                    </tr>
                                    <?php $n=1; if(is_array($halfTotal[1])) foreach($halfTotal[1] AS $key => $item) { ?>
                                    <tr class="guestHalfTotal1" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td class=""><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($halfTotal[5])) foreach($halfTotal[5] AS $key => $item) { ?>
                                    <tr class="guestHalfTotal2" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td class=""><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($halfTotal[9])) foreach($halfTotal[9] AS $key => $item) { ?>
                                    <tr class="guestHalfTotal3">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td class=""><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($halfTotal[13])) foreach($halfTotal[13] AS $key => $item) { ?>
                                    <tr class="guestHalfTotal4" style="display: none">
                                        <td><?php if($key==0) { ?>总<?php } elseif ($key==1) { ?>主<?php } elseif ($key==2) { ?>客<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td><?php echo $item['5'];?></td>
                                        <td class=""><?php echo $item['6'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 技术统计 -->
            <div class="score-item bt_scoreitem">
                <div class="score-item-hd">
                    <span class="score-item-title">技术统计</span>
                </div>

                <div class="score-item-bd pdB20">
                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="7" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td></td>
                                        <td>投篮命中率</td>
                                        <td>三分命中率</td>
                                        <td>平均篮板</td>
                                        <td>平均助攻</td>
                                        <td>平均抢断</td>
                                        <td class="">平均失误</td>
                                    </tr>
                                    <?php $n=1; if(is_array($technic['home'])) foreach($technic['home'] AS $key => $item) { ?>
                                    <tr>
                                        <td><?php if($key==1) { ?>季前赛<?php } elseif ($key==2) { ?>常规赛<?php } elseif ($key==3) { ?>近10场<?php } ?></td>
                                        <td><?php echo $item['0'];?></td>
                                        <td><?php echo $item['1'];?></td>
                                        <td><?php echo $item['2'];?></td>
                                        <td><?php echo $item['3'];?></td>
                                        <td><?php echo $item['4'];?></td>
                                        <td class=""><?php echo $item['5'];?></td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                                <table class="table bigTable">
                                    <thead>
                                        <tr>
                                            <td colspan="7" class=" text-left">
                                                <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gray">
                                            <td></td>
                                            <td>投篮命中率</td>
                                            <td>三分命中率</td>
                                            <td>平均篮板</td>
                                            <td>平均助攻</td>
                                            <td>平均抢断</td>
                                            <td class="">平均失误</td>
                                        </tr>
                                        <?php $n=1; if(is_array($technic['guest'])) foreach($technic['guest'] AS $key => $item) { ?>
                                        <tr>
                                            <td><?php if($key==1) { ?>季前赛<?php } elseif ($key==2) { ?>常规赛<?php } elseif ($key==3) { ?>近10场<?php } ?></td>
                                            <td><?php echo $item['0'];?></td>
                                            <td><?php echo $item['1'];?></td>
                                            <td><?php echo $item['2'];?></td>
                                            <td><?php echo $item['3'];?></td>
                                            <td><?php echo $item['4'];?></td>
                                            <td class=""><?php echo $item['5'];?></td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 赛程分析 -->
            <div class="score-item bt_scoreitem">
                <div class="score-item-hd">
                    <span class="score-item-title">赛程分析</span>
                </div>

                <div class="score-item-bd pdB20">
                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="6" class="noBorder text-left">
                                            <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="homeAnalyzeButton" data-toggle="dropdown">
                                                    前后6场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="homeAnalyzeButton">
                                                    <ul>
                                                        <li onclick="homeAnalyze(1)">前后6场</li>
                                                        <li onclick="homeAnalyze(2)">未来6场</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td>赛事</td>
                                        <td>时间</td>
                                        <td>主队</td>
                                        <td>比分</td>
                                        <td>客队</td>
                                        <td class="">与本场相隔</td>
                                    </tr>
                                    <?php $n=1; if(is_array($beforeThreeSchedule['home'])) foreach($beforeThreeSchedule['home'] AS $key => $item) { ?>
                                    <tr class="homeAnalyze1">
                                        <td><?php echo $item['sclassname_cn'];?></td>
                                        <td><?php echo date('Y-m-d', $item['date']);?></td>
                                        <td class="<?php if($item['hometeamid'] == $hometeamid) { ?>orange<?php } ?>"><?php echo $item['homename_cn'];?></td>
                                        <td>
                                            <?php if($item['homescore'] != 0 || $item['guestscore'] != 0) { ?>
                                            <span class="red"><?php echo $item['homescore'];?></span>-
                                            <span class="green"><?php echo $item['guestscore'];?></span>
                                            <?php } else { ?> VS
                                            <?php } ?>
                                        </td>
                                        <td class="<?php if($item['hometeamid'] != $hometeamid) { ?>orange<?php } ?>"><?php echo $item['guestname_cn'];?></td>
                                        <td class=""><?php echo $item['days'];?>天</td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($afterSixSchedule['home'])) foreach($afterSixSchedule['home'] AS $key => $item) { ?>
                                    <tr class="homeAnalyze2" style="display: none">
                                        <td><?php echo $item['sclassname_cn'];?></td>
                                        <td><?php echo date('Y-m-d', $item['date']);?></td>
                                        <td class="<?php if($item['hometeamid'] == $hometeamid) { ?>orange<?php } ?>"><?php echo $item['homename_cn'];?></td>
                                        <td>
                                            <?php if($item['homescore'] != 0 || $item['guestscore'] != 0) { ?>
                                            <span class="red"><?php echo $item['homescore'];?></span>-
                                            <span class="green"><?php echo $item['guestscore'];?></span>
                                            <?php } else { ?> VS
                                            <?php } ?>
                                        </td>
                                        <td class="<?php if($item['hometeamid'] != $hometeamid) { ?>orange<?php } ?>"><?php echo $item['guestname_cn'];?></td>
                                        <td class=""><?php echo $item['days'];?>天</td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                                <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="6" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                            <div class="dropdown">
                                                <button class="btn btn-default" id="guestAnalyzeButton" data-toggle="dropdown">
                                                    前后6场
                                                    <i class="icon-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="guestAnalyzeButton">
                                                    <ul>
                                                        <li onclick="guestAnalyze(1)">前后6场</li>
                                                        <li onclick="guestAnalyze(2)">未来6场</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td>赛事</td>
                                        <td>时间</td>
                                        <td>主队</td>
                                        <td>比分</td>
                                        <td>客队</td>
                                        <td class="">与本场相隔</td>
                                    </tr>
                                    <?php $n=1; if(is_array($beforeThreeSchedule['guest'])) foreach($beforeThreeSchedule['guest'] AS $key => $item) { ?>
                                    <tr class="guestAnalyze1">
                                        <td><?php echo $item['sclassname_cn'];?></td>
                                        <td><?php echo date('Y-m-d', $item['date']);?></td>
                                        <td class="<?php if($item['hometeamid'] == $guestteamid) { ?>orange<?php } ?>"><?php echo $item['homename_cn'];?></td>
                                        <td>
                                            <?php if($item['homescore'] != 0 || $item['guestscore'] != 0) { ?>
                                            <span class="red"><?php echo $item['homescore'];?></span>-
                                            <span class="green"><?php echo $item['guestscore'];?></span>
                                            <?php } else { ?> VS
                                            <?php } ?>
                                        </td>
                                        <td class="<?php if($item['hometeamid'] != $guestteamid) { ?>orange<?php } ?>"><?php echo $item['guestname_cn'];?></td>
                                        <td class=""><?php echo $item['days'];?>天</td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                    <?php $n=1; if(is_array($afterSixSchedule['guest'])) foreach($afterSixSchedule['guest'] AS $key => $item) { ?>
                                    <tr class="guestAnalyze2" style="display: none">
                                        <td><?php echo $item['sclassname_cn'];?></td>
                                        <td><?php echo date('Y-m-d', $item['date']);?></td>
                                        <td class="<?php if($item['hometeamid'] == $guestteamid) { ?>orange<?php } ?>"><?php echo $item['homename_cn'];?></td>
                                        <td>
                                            <?php if($item['homescore'] != 0 || $item['guestscore'] != 0) { ?>
                                            <span class="red"><?php echo $item['homescore'];?></span>-
                                            <span class="green"><?php echo $item['guestscore'];?></span>
                                            <?php } else { ?> VS
                                            <?php } ?>
                                        </td>
                                        <td class="<?php if($item['hometeamid'] != $guestteamid) { ?>orange<?php } ?>"><?php echo $item['guestname_cn'];?></td>
                                        <td class=""><?php echo $item['days'];?>天</td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 预计阵容 -->
            <div class="score-item bt_scoreitem">
                <div class="score-item-hd">
                    <span class="score-item-title">预计阵容</span>
                </div>

                <div class="score-item-bd pdB20">
                    <div class="row">
                        <div class="col-md-6 pdR0">
                            <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="2" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['homename_cn'];?></b>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td>正选</td>
                                        <td class="">后备</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php $n=1; if(is_array($lineup['homelineup'])) foreach($lineup['homelineup'] AS $key => $item) { ?>
                                            <div class="table-line">
                                                <?php echo $item['0'];?>
                                                <?php echo $item['1'];?>
                                                <?php echo $item['2'];?>
                                            </div>
                                            <?php $n++;}unset($n); ?>
                                        </td>
                                        <td class="">
                                            <?php $n=1; if(is_array($lineup['homebackup'])) foreach($lineup['homebackup'] AS $key => $item) { ?>
                                            <div class="table-line">
                                                <?php echo $item['0'];?>
                                                <?php echo $item['1'];?>
                                                <?php echo $item['2'];?>
                                            </div>
                                            <?php $n++;}unset($n); ?>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 pdL0">
                           <table class="table bigTable">
                                <thead>
                                    <tr>
                                        <td colspan="2" class=" text-left">
                                            <b class="team-label"><?php echo $scheduleData['guestname_cn'];?></b>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gray">
                                        <td>正选</td>
                                        <td>后备</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php $n=1; if(is_array($lineup['guestlineup'])) foreach($lineup['guestlineup'] AS $key => $item) { ?>
                                            <div class="table-line">
                                                <?php echo $item['0'];?>
                                                <?php echo $item['1'];?>
                                                <?php echo $item['2'];?>
                                            </div>
                                            <?php $n++;}unset($n); ?>
                                        </td>
                                        <td class="">
                                            <?php $n=1; if(is_array($lineup['guestbackup'])) foreach($lineup['guestbackup'] AS $key => $item) { ?>
                                            <div class="table-line">
                                                <?php echo $item['0'];?>
                                                <?php echo $item['1'];?>
                                                <?php echo $item['2'];?>
                                            </div>
                                            <?php $n++;}unset($n); ?>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

             <!-- 丙队伤停情况 -->
            <div class="score-item" id="jiaowang">
                <div class="score-item-hd">
                    <span class="score-item-title">两队伤停情况</span>
                </div>

                <div class="score-item-bd pdB20">
                    <table class="table bigTable">
                        <tr class="gray">
                            <th>球队</th>
                            <th>球员</th>
                            <th>位置</th>
                            <th>原因</th>
                            <th>日期</th>
                            <th>备注</th>
                        </tr>
                        <?php $n=1; if(is_array($lineup['injury'])) foreach($lineup['injury'] AS $key => $item) { ?>
                        <tr>
                            <td><?php echo $item['0'];?></td>
                            <td><?php echo $item['1'];?></td>
                            <td><?php echo $item['2'];?></td>
                            <td><?php echo $item['3'];?></td>
                            <td><?php echo $item['4'];?></td>
                            <td><?php echo $item['5'];?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>

            </div>

            <!-- 心水推介 -->
            <div class="score-item" id="jiaowang">
                <div class="score-item-hd">
                    <span class="score-item-title">心水推介</span>
                </div>

                <div class="score-item-bd">
                    <table class="table bigTable">
                        <tr>
                            <td><?php echo $scheduleData['homename_cn'];?></td>
                            <td>
                                近况走势-
                                <?php echo $lineup['homenear6'];?>
                            </td>
                            <td>
                                盘路输赢-
                                <?php echo $lineup['homeodds'];?>
                            </td>
                            <td>
                                上下盘路-
                                <?php echo $lineup['homeou'];?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $scheduleData['guestname_cn'];?></td>
                            <td>
                                近况走势-
                                <?php echo $lineup['guestnear6'];?>
                            </td>
                            <td>
                                盘路输赢-
                                <?php echo $lineup['guestodds'];?>
                            </td>
                            <td>
                                上下盘路-
                                <?php echo $lineup['guestou'];?>
                            </td>
                        </tr>
                        <tr class="gray">
                            <td colspan="2">
                                近信心指数-
                                <span class="orange"><?php echo $lineup['confidence'];?></span>
                            </td>
                            <td colspan="2">
                                对赛成绩-<?php echo $lineup['vs'];?>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="score-item-fd">
                    <p class="hint">
                        <?php echo $lineup['note'];?>
                    </p>
                </div>
            </div>

            <!-- 分析推荐 -->
            <div class="score-item" id="jiaowang">
                <div class="score-item-hd">
                    <b class="score-item-title">分析推荐</b>
                </div>

                <div class="score-item-bd pdB20">
                    <table class="table bigTable">
                        <tr>
                            <td>
                                火箭
                                VS
                                太阳:
                                火箭主场向日成功
                            </td>
                            <td>
                                火箭
                                VS
                                太阳:
                                火箭主场向日成功
                            </td>
                        </tr>
                        <tr>
                            <td>
                                火箭
                                VS
                                太阳:
                                火箭主场向日成功
                            </td>
                            <td>
                                火箭
                                VS
                                太阳:
                                火箭主场向日成功
                            </td>
                        </tr>
                        <tr>
                            <td>
                                火箭
                                VS
                                太阳:
                                火箭主场向日成功
                            </td>
                            <td>
                                火箭
                                VS
                                太阳:
                                火箭主场向日成功
                            </td>
                        </tr>
                    </table>
            </div>
    


        </div>
    </div>
</section>
<!-- main body -->
<script>
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>
<?php $js = ['bt_schedule_analyse.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js'];?>
<?php include template('content', 'footer'); ?>