<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('bt_live_schedule.css');?>
<?php $nav_id = 3;?>
<?php include template('content', 'header_score'); ?>

<div class="select-wrap">
    <div class="container">
        <ul class="row select-nav">
            <li class="item active">即时</li>
            <li class="item"><a href="<?php echo APP_PATH;?>lqwanchang/">完场</a></li>
            <li class="item"><a href="<?php echo APP_PATH;?>lqsaicheng/">下日</a></li>
            <li id="selected" class="item">保留选中</li>
            <li id="del" class="item">删除选中</li>
            <li id="all" class="item">显示全部</li>
            <li id="stime" class="item active">按时间</li>
            <li id="sevent" class="item">按赛事</li>
            <li class="item spe" style="width: 150px;text-align: center;">共<span id="sum"><?php echo $total;?></span>场 隐藏<span id="hidden" class="orange">0</span>场</li>
            <li id="sCom" class="item" style="background-color: transparent;padding: 0;">
                <div class="dropdown" style="display: inline-block">
                    <button id="company-list" class="btn btn-control dropdown-toggle" data-toggle="dropdown" style="background-color: #fff;width: 90px;">
                        选择公司
                        <i class="icon-angle-down"></i>
                    </button>
                    <ul id="company" data-companyid="<?php echo $companyId;?>" class="dropdown-menu" role="menu" aria-labelledby="company-list">
                        <li><a href="javascript:;" data-companyid="1" class="odds-company">Bet365</a></li>
                        <li><a href="javascript:;" data-companyid="2" class="odds-company">皇冠</a></li>
                        <li><a href="javascript:;" data-companyid="3" class="odds-company">澳门</a></li>
                        <li><a href="javascript:;" data-companyid="4" class="odds-company">易胜博</a></li>
                        <li><a href="javascript:;" data-companyid="5" class="odds-company">韦德</a></li>
                    </ul>
                </div>
            </li>
            <li id="event" class="item" style="background-color: transparent;padding: 0">
                <div class="dropdown" style="display: inline-block;">
                    <button class="btn btn-control" data-toggle="modal" data-target="#game-modal" style="background-color: #fff;width: 90px;">
                        选择赛事
                        <i class="icon-angle-down"></i>
                    </button>
                </div>
            </li>
            <li id="set" class="item" style="position: relative;width: 78px;padding: 0;background: none;">
                <button id="option-list" class="btn btn-setting" data-toggle="dropdown">
                    设置
                    <i class="icon-cogs"></i>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="option-list">
                    <li>
                        <a href="javascript:;">
                            <label for="audio-btn" class="cpi-btn">
                                <input type="checkbox" id="audio-btn" checked>&nbsp;进球声
                            </label>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div id="sorttime" class="data-wrap clearfix">
    <!--进行的比赛-->
    <div id="progress" class="event">
        <?php if(count($return['in_progress'])) { ?>
        <div class="title"><i class="ball"></i>正在进行的比赛</div>
        <?php $n=1;if(is_array($return['in_progress'])) foreach($return['in_progress'] AS $r) { ?>
        <div data-select="false" data-competition="<?php echo $r['sclassid'];?>" class="data-item clearfix" data-inprogress="<?php echo $r['scheduleid'];?>">

            <div class="time-wrap">
                <span class="time-start"><?php echo $r['date'];?></span>
            </div>
            <div class="table-wrap">
                <table width="100%">
                    <tr>
                        <td width="196" align="left" class="pdl-10"><span class="orange" style="color: <?php echo $r['sclasscolor'];?>"><?php echo $r['sclassname_cn'];?></span> <span class="red fr pdr status"><?php echo $r['status'];?> <?php echo $r['remaintime'];?></span></td>
                        <?php if($r['sclasspart']!=='2') { ?>
                        <td width="40" class="grey2">1</td>
                        <td width="40" class="grey2">2</td>
                        <td width="40" class="grey2">3</td>
                        <td width="40" class="grey2">4</td>
                        <?php } else { ?>
                        <td width="80" class="grey2">上半场</td>
                        <td width="80" class="grey2">下半场</td>
                        <?php } ?>
                        <td width="50" class="grey2">上下</td>
                        <td width="40" class="grey2">全程</td>
                        <td width="50" class="grey2">分差</td>
                        <td width="50" class="grey2">总分</td>
                        <td width="50" class="grey2">欧赔</td>
                        <td width="100" class="grey2">让分盘</td>
                        <td width="120" class="grey2">大小分</td>

                        <td width="120px"><i class="ft18 start-pos grey icon-star-empty"></i><i class="checkbox"></i><input style="visibility: hidden;" type="checkbox"></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><img src="<?php echo $r['home_logo'];?>" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><?php echo str_cut($r['homename_cn'], 30, '...');?></a></div></td>
                        <td class="homeone"><?php echo  empty($r['homeone']) ? '-' : $r['homeone'] ?></td>
                        <?php if($r['sclasspart']!=='2') { ?><td class="hometwo" ><?php echo  empty($r['hometwo']) ? '-' : $r['hometwo'] ?></td><?php } ?>
                        <td class="homethree"><?php echo  empty($r['homethree']) ? '-' : $r['homethree'] ?></td>
                        <?php if($r['sclasspart']!=='2') { ?><td class="homefour"><?php echo  empty($r['homefour']) ? '-' : $r['homefour'] ?></td><?php } ?>
                        <td class="grey2"><span class="homeFirstHalf"><?php echo  empty($r['homeFirstHalf']) ? '-' : $r['homeFirstHalf'] ?></span>/<span class="homeSecondHalf"><?php echo  empty($r['homeSecondHalf']) ? '-' : $r['homeSecondHalf'] ?></span></td>
                        <td class="trans"><span class="red homescore" data-homescore="<?php echo $r['homescore'];?>"><?php echo  empty($r['homescore']) ? '-' : $r['homescore'] ?></span></td>
                        <td class="grey2">总:<span class="wholeDiff"> <?php echo  empty($r['wholeDiff']) ? '-' : $r['wholeDiff'] ?></span></td>
                        <td class="grey2">总: <span class="wholeSum"><?php echo  empty($r['wholeSum']) ? '-' : $r['wholeSum'] ?></span></td>
                        <td><span id="homewin<?php echo $r['scheduleid'];?>" data-homewin="<?php echo $r['homewin'];?>"><?php echo $r['homewin'];?></span></td>
                        <td><span class="orange letgoal" id="letgoal1<?php echo $r['scheduleid'];?>" data-letgoal="<?php echo abs($r[letgoal]);?>"><?php if($r['letgoal'] >= 0) { ?><?php echo $r['letgoal'];?><?php } ?></span> <span id="homeodds<?php echo $r['scheduleid'];?>" class="pos" data-homeodds="<?php echo $r['homeodds'];?>"><?php echo $r['homeodds'];?></span></td>
                        <td><span class="orange">小</span><span class="orange" id="totalscore1<?php echo $r['scheduleid'];?>" data-totalscore="<?php echo $r['totalscore'];?>"><?php echo $r['totalscore'];?></span><span id="lowodds<?php echo $r['scheduleid'];?>" data-lowodds="<?php echo $r['lowodds'];?>" style="margin-left: 1px;"> <?php echo $r['lowodds'];?></span></td>
                        <td rowspan="2">
                            <div class="height35"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" target="_blank">分析</a><br></div>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/asia/" target="_blank">亚</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/euro/" target="_blank">欧</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/ou/" target="_blank">大</a></span></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><img src="<?php echo $r['guest_logo'];?>" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><?php echo str_cut($r['guestname_cn'], 30, '...');?></a></div></td>
                        <td class="guestone"><?php echo  empty($r['guestone']) ? '-' : $r['guestone'] ?></td>
                        <?php if($r['sclasspart']!=='2') { ?><td class="guesttwo"><?php echo  empty($r['guesttwo']) ? '-' : $r['guesttwo'] ?></td><?php } ?>
                        <td class="guestthree"><?php echo  empty($r['guestthree']) ? '-' : $r['guestthree'] ?></td>
                        <?php if($r['sclasspart']!=='2') { ?><td class="guestfour"><?php echo  empty($r['guestfour']) ? '-' : $r['guestfour'] ?></td><?php } ?>
                        <td class="grey2"><span class="guestFirstHalf"><?php echo  empty($r['guestFirstHalf']) ? '-' : $r['guestFirstHalf'] ?></span>/<span class="guestSecondHalf"><?php echo  empty($r['guestSecondHalf']) ? '-' : $r['guestSecondHalf'] ?></span></td>
                        <td class="trans"><span class="red guestscore" data-guestscore="<?php echo $r['guestscore'];?>"><?php echo  empty($r['guestscore']) ? '-' : $r['guestscore'] ?></span></td>
                        <td class="grey2">半: <span class="halfDiff"><?php echo  empty($r['halfDiff']) ? '-' : $r['halfDiff'] ?></span></td>
                        <td class="grey2">半: <span class="halfSum"><?php echo  empty($r['halfSum']) ? '-' : $r['halfSum'] ?></span></td>
                        <td><span id="guestwin<?php echo $r['scheduleid'];?>" data-guestwin="<?php echo $r['guestwin'];?>"><?php echo $r['guestwin'];?></span></td>
                        <td><span class="orange letgoal" id="letgoal2<?php echo $r['scheduleid'];?>" data-letgoal="<?php echo abs($r[letgoal]);?>"><?php if($r['letgoal'] < 0) { ?><?php echo abs($r['letgoal']);?><?php } ?></span><span id="guestodds<?php echo $r['scheduleid'];?>" class="pos" data-guestodds="<?php echo $r['guestodds'];?>"><?php echo $r['guestodds'];?></span></td>
                        <td><span class="orange">大<span id="totalscore2<?php echo $r['scheduleid'];?>" data-totalscore="<?php echo $r['totalscore'];?>"><?php echo $r['totalscore'];?></span></span> <span id="highodds<?php echo $r['scheduleid'];?>" data-highodds="<?php echo $r['highodds'];?>"><?php echo $r['highodds'];?></span></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php $n++;}unset($n); ?>
        <?php } ?>
    </div>
    <!--未进行比赛-->
    <div class="event">
        <?php if(count($return['not_started'])) { ?>
        <div class="title"><i class="clock"></i>还未开始的比赛</div>
        <?php $n=1;if(is_array($return['not_started'])) foreach($return['not_started'] AS $r) { ?>
        <div data-select="false" data-competition="<?php echo $r['sclassid'];?>" class="data-item clearfix" data-notstarted="<?php echo $r['scheduleid'];?>">
            <div class="time-wrap">
                <span class="time"><?php echo $r['date'];?></span>
            </div>
            <div class="table-wrap" style="border: 1px solid #91ddff;">
                <table width="100%">
                    <tr>
                        <td width="196" align="left" class="pdl-10"><span class="orange" style="color:<?php echo $r['sclasscolor'];?>"><?php echo $r['sclassname_cn'];?></span> <span class="fr pdr red status">未开始</span></td>
                        <?php if($r['sclasspart'] == 4) { ?>
                        <td width="40" class="grey2">1</td>
                        <td width="40" class="grey2">2</td>
                        <td width="40" class="grey2">3</td>
                        <td width="40" class="grey2">4</td>
                        <?php } else { ?>
                        <td width="80" class="grey2">上半场</td>
                        <td width="80" class="grey2">下半场</td>
                        <?php } ?>
                        <td width="50" class="grey2">上下</td>
                        <td width="40" class="grey2">全程</td>
                        <td width="50" class="grey2">分差</td>
                        <td width="50" class="grey2">总分</td>
                        <td width="50" class="grey2">欧赔</td>
                        <td width="100" class="grey2">让分盘</td>
                        <td width="120" class="grey2">大小分</td>
                        <td width="120px"><i class="ft18 start-pos grey icon-star-empty"></i><i class="checkbox"></i><input style="visibility: hidden;" type="checkbox"></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><img src="<?php echo $r['home_logo'];?>" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><?php echo str_cut($r['homename_cn'], 30, '...');?></a></div></td>
                        <td class="homeone">-</td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="hometwo">-</td><?php } ?>
                        <td class="homethree">-</td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="homefour">-</td><?php } ?>
                        <td class="grey2"><span class="homeFirstHalf">-</span>/<span class="homeSecondHalf">-</span></td>
                        <td class="trans"><span class="red homescore" data-homescore="">-</span></td>
                        <td class="grey2">总:<span class="wholeDiff">-</span></td>
                        <td class="grey2">总: <span class="wholeSum">-</span></td>
                        <td><span id="homewin<?php echo $r['scheduleid'];?>" data-homewin="<?php echo $r['homewin_f'];?>"><?php echo $r['homewin_f'];?></span></td>
                        <td><span class="orange" id="letgoal1<?php echo $r['scheduleid'];?>" data-letgoal="<?php echo abs($r[letgoal_f]);?>"><?php if($r['letgoal_f'] >= 0) { ?><?php echo $r['letgoal_f'];?><?php } ?></span> <span id="homeodds<?php echo $r['scheduleid'];?>" class="pos" data-homeodds="<?php echo $r['homeodds_f'];?>"><?php echo $r['homeodds_f'];?></span></td>
                        <td><span class="orange">小</span><span class="orange" id="totalscore1<?php echo $r['scheduleid'];?>" data-totalscore="<?php echo $r['totalscore_f'];?>"><?php echo $r['totalscore_f'];?></span><span id="lowodds<?php echo $r['scheduleid'];?>" data-lowodds="<?php echo $r['lowodds_f'];?>" style="margin-left: 1px;"> <?php echo $r['lowodds_f'];?></span></td>
                        <td rowspan="2">
                            <div class="height35"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" target="_blank">分析</a><br></div>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/asia/" target="_blank">亚</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/euro/" target="_blank">欧</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/ou/" target="_blank">大</a></span></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><img src="<?php echo $r['guest_logo'];?>" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><?php echo str_cut($r['guestname_cn'], 30, '...');?></a></div></td>
                        <td class="guestone">-</td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="guesttwo">-</td><?php } ?>
                        <td class="guestthree">-</td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="guestfour">-</td><?php } ?>
                        <td class="grey2"><span class="guestFirstHalf">-</span>/<span class="guestSecondHalf">-</span></td>
                        <td class="trans"><span class="red guestscore" data-guestscore="">-</span></td>
                        <td class="grey2">半: <span class="halfDiff">-</span></td>
                        <td class="grey2">半: <span class="halfSum">-</span></td>
                        <td><span id="guestwin<?php echo $r['scheduleid'];?>" data-guestwin="<?php echo $r['guestwin_f'];?>"><?php echo $r['guestwin_f'];?></span></td>
                        <td><span class="orange" id="letgoal2<?php echo $r['scheduleid'];?>" data-letgoal="<?php echo abs($r[letgoal_f]);?>"><?php if($r['letgoal_f'] < 0) { ?><?php echo abs($r['letgoal_f']);?><?php } ?></span><span id="guestodds<?php echo $r['scheduleid'];?>" class="pos" data-guestodds="<?php echo $r['guestodds_f'];?>"><?php echo $r['guestodds_f'];?></span></td>
                        <td><span class="orange">大<span id="totalscore2<?php echo $r['scheduleid'];?>" data-totalscore="<?php echo $r['totalscore_f'];?>"><?php echo $r['totalscore_f'];?></span></span> <span id="highodds<?php echo $r['scheduleid'];?>" data-highodds="<?php echo $r['highodds_f'];?>"><?php echo $r['highodds_f'];?></span></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php $n++;}unset($n); ?>
        <?php } ?>
    </div>
    <!--已结束比赛-->
    <div id="over" class="event">
        <?php if(count($return['finished'])) { ?>
        <div class="title"><span class="match-tip end">已结束的比赛</span></div>
        <?php $n=1;if(is_array($return['finished'])) foreach($return['finished'] AS $r) { ?>
        <div data-select="false" data-competition="<?php echo $r['sclassid'];?>" class="data-item clearfix" data-notstarted="<?php echo $r['scheduleid'];?>">
            <div class="time-wrap">
                <span class="time"><?php echo $r['date'];?></span>
            </div>
            <div class="table-wrap" style="border: 1px solid #91ddff;">
                <table width="100%">
                    <tr>
                        <td width="196" align="left" class="pdl-10"><span class="orange" style="color:<?php echo $r['sclasscolor'];?>"><?php echo $r['sclassname_cn'];?></span> <span class="fr pdr red status"><?php echo $r['status'];?></span></td>
                        <?php if($r['sclasspart']!=='2') { ?>
                        <td width="40" class="grey2">1</td>
                        <td width="40" class="grey2">2</td>
                        <td width="40" class="grey2">3</td>
                        <td width="40" class="grey2">4</td>
                        <?php } else { ?>
                        <td width="80" class="grey2">上半场</td>
                        <td width="80" class="grey2">下半场</td>
                        <?php } ?>
                        <td width="50" class="grey2">上下</td>
                        <td width="40" class="grey2">全程</td>
                        <td width="50" class="grey2">分差</td>
                        <td width="50" class="grey2">总分</td>
                        <td width="50" class="grey2">欧赔</td>
                        <td width="100" class="grey2">让分盘</td>
                        <td width="120" class="grey2">大小分</td>
                        <td width="120px"><i class="ft18 start-pos grey icon-star-empty"></i><i class="checkbox"></i><input style="visibility: hidden;" type="checkbox"></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><img src="<?php echo $r['home_logo'];?>" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><?php echo str_cut($r['homename_cn'], 30, '...');?></a></div></td>
                        <td class="homeone"><?php echo  empty($r['homeone']) ? '-' : $r['homeone'] ?></td>
                        <?php if($r['sclasspart']!=='2') { ?><td class="hometwo"><?php echo  empty($r['hometwo']) ? '-' : $r['hometwo'] ?></td><?php } ?>
                        <td class="homethree"><?php echo  empty($r['homethree']) ? '-' : $r['homethree'] ?></td>
                        <?php if($r['sclasspart']!=='2') { ?><td class="homefour"><?php echo  empty($r['homefour']) ? '-' : $r['homefour'] ?></td><?php } ?>
                        <td class="grey2"><span class="homeFirstHalf"><?php echo  empty($r['homeFirstHalf']) ? '-' : $r['homeFirstHalf'] ?></span>/<span class="homeSecondHalf"><?php echo  empty($r['homeSecondHalf']) ? '-' : $r['homeSecondHalf'] ?></span></td>
                        <td><span class="red homescore"><?php echo  empty($r['homescore']) ? '-' : $r['homescore'] ?></span></td>
                        <td class="grey2">总:<span class="wholeDiff"> <?php echo  empty($r['wholeDiff']) ? '-' : $r['wholeDiff'] ?></span></td>
                        <td class="grey2">总: <span class="wholeSum"><?php echo  empty($r['wholeSum']) ? '-' : $r['wholeSum'] ?></span></td>
                        <td><span class="homewin"><?php echo $r['homewin'];?></span></td>
                        <td><span class="orange letgoal"><?php if($r['letgoal'] >= 0) { ?><?php echo $r['letgoal'];?><?php } ?></span> <span class="homeodds pos"><?php echo $r['homeodds'];?></span></td>
                        <td><?php if($r['totalscore']) { ?><span class="orange">小</span><?php } ?><span class="orange totalscore"><?php echo $r['totalscore'];?></span><span class="lowodds" style="margin-left: 1px;"> <?php echo $r['lowodds'];?></span></td>
                        <td rowspan="2">
                            <div class="height35"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" target="_blank">分析</a><br></div>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/asia/" target="_blank">亚</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/euro/" target="_blank">欧</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/ou/" target="_blank">大</a></span></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><img src="<?php echo $r['guest_logo'];?>" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><?php echo str_cut($r['guestname_cn'], 30, '...');?></a></div></td>
                        <td class="guestone"><?php echo  empty($r['guestone']) ? '-' : $r['guestone'] ?></td>
                        <?php if($r['sclasspart']!=='2') { ?><td class="guesttwo"><?php echo  empty($r['guesttwo']) ? '-' : $r['guesttwo'] ?></td><?php } ?>
                        <td class="guestthree"><?php echo  empty($r['guestthree']) ? '-' : $r['guestthree'] ?></td>
                        <?php if($r['sclasspart']!=='2') { ?><td class="guestfour"><?php echo  empty($r['guestfour']) ? '-' : $r['guestfour'] ?></td><?php } ?>
                        <td class="grey2"><span class="guestFirstHalf"><?php echo  empty($r['guestFirstHalf']) ? '-' : $r['guestFirstHalf'] ?></span>/<span class="guestSecondHalf"><?php echo  empty($r['guestSecondHalf']) ? '-' : $r['guestSecondHalf'] ?></span></td>
                        <td><span class="red guestscore"><?php echo  empty($r['guestscore']) ? '-' : $r['guestscore'] ?></span></td>
                        <td class="grey2">半: <span class="halfDiff"><?php echo  empty($r['halfDiff']) ? '-' : $r['halfDiff'] ?></span></td>
                        <td class="grey2">半: <span class="halfSum"><?php echo  empty($r['halfSum']) ? '-' : $r['halfSum'] ?></span></td>
                        <td><span class="guestwin"><?php echo $r['guestwin'];?></span></td>
                        <td><span class="orange letgoal"><?php if($r['letgoal'] < 0) { ?><?php echo abs($r['letgoal']);?><?php } ?></span><span class="guestodds pos"><?php echo $r['guestodds'];?></span></td>
                        <td><?php if($r['totalscore']) { ?><span class="orange">大<span class="totalscore"><?php echo $r['totalscore'];?></span></span><?php } ?> <span class="highodds"><?php echo $r['highodds'];?></span></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php $n++;}unset($n); ?>
        <?php } ?>
    </div>
</div>
<div id="sortevent" class="data-wrap clearfix" style="display: none">
    <div id="progress_match" class="event">
        <?php $n=1; if(is_array($return['match'])) foreach($return['match'] AS $key => $data) { ?>
        <div id="sclassid_<?php echo $key;?>">
        <div class="title"><?php echo $sclassidData[$key]['name_s'];?></div>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <div data-select="false" data-competition="<?php echo $r['sclassid'];?>" class="data-item clearfix" data-sclassid="<?php echo $key;?>" data-<?php echo $r['flag'];?>="<?php echo $r['scheduleid'];?>">
            <div class="time-wrap">
                <span class="time-start"><?php echo $r['date'];?></span>
            </div>
            <div class="table-wrap">
                <table width="100%">
                    <tr>
                        <td width="196" align="left" class="pdl-10"><span class="orange" style="color:<?php echo $r['sclasscolor'];?>"><?php echo $r['sclassname_cn'];?></span> <span class="red fr pdr status"><?php echo $r['status'];?> <?php echo $r['remaintime'];?></span></td>
                        <?php if($r['sclasspart'] == 4) { ?>
                        <td width="40" class="grey2">1</td>
                        <td width="40" class="grey2">2</td>
                        <td width="40" class="grey2">3</td>
                        <td width="40" class="grey2">4</td>
                        <?php } else { ?>
                        <td width="80" class="grey2">上半场</td>
                        <td width="80" class="grey2">下半场</td>
                        <?php } ?>
                        <td width="50" class="grey2">上下</td>
                        <td width="40" class="grey2">全程</td>
                        <td width="50" class="grey2">分差</td>
                        <td width="50" class="grey2">总分</td>
                        <td width="50" class="grey2">欧赔</td>
                        <td width="100" class="grey2">让分盘</td>
                        <td width="120" class="grey2">大小分</td>

                        <td width="120px"><i class="ft18 start-pos grey icon-star-empty"></i><i class="checkbox"></i><input style="visibility: hidden;" type="checkbox"></td>
                    </tr>
                    <?php if($status !== '未开赛') { ?>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><img src="<?php echo $r['home_logo'];?>" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><?php echo str_cut($r['homename_cn'], 30, '...');?></a></div></td>
                        <td class="homeone"><?php echo  empty($r['homeone']) ? '-' : $r['homeone'] ?></td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="hometwo"><?php echo  empty($r['hometwo']) ? '-' : $r['hometwo'] ?></td><?php } ?>
                        <td class="homethree"><?php echo  empty($r['homethree']) ? '-' : $r['homethree'] ?></td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="homefour"><?php echo  empty($r['homefour']) ? '-' : $r['homefour'] ?></td><?php } ?>
                        <td class="grey2"><span class="homeFirstHalf"><?php echo  empty($r['homeFirstHalf']) ? '-' : $r['homeFirstHalf'] ?></span>/<span class="homeSecondHalf"><?php echo  empty($r['homeSecondHalf']) ? '-' : $r['homeSecondHalf'] ?></span></td>
                        <td><span class="red homescore"><?php echo  empty($r['homescore']) ? '-' : $r['homescore'] ?></span></td>
                        <td class="grey2">总:<span class="wholeDiff"> <?php echo  empty($r['wholeDiff']) ? '-' : $r['wholeDiff'] ?></span></td>
                        <td class="grey2">总: <span class="wholeSum"><?php echo  empty($r['wholeSum']) ? '-' : $r['wholeSum'] ?></span></td>
                        <td><span id="homewin3<?php echo $r['scheduleid'];?>" data-homewin="<?php echo $r['homewin'];?>"><?php echo $r['homewin'];?></span></td>
                        <td><span class="orange" id="letgoal3<?php echo $r['scheduleid'];?>" data-letgoal="<?php echo abs($r[letgoal]);?>"><?php if($r['letgoal'] >= 0) { ?><?php echo $r['letgoal'];?><?php } ?></span> <span id="homeodds3<?php echo $r['scheduleid'];?>" class="pos" data-homeodds="<?php echo $r['homeodds'];?>"><?php echo $r['homeodds'];?></span></td>
                        <td><?php if($r['totalscore']) { ?><span class="orange">小</span><?php } ?><span class="orange" id="totalscore3<?php echo $r['scheduleid'];?>" data-totalscore="<?php echo $r['totalscore'];?>"><?php echo $r['totalscore'];?></span><span id="lowodds3<?php echo $r['scheduleid'];?>" data-lowodds="<?php echo $r['lowodds'];?>" style="margin-left: 1px;"> <?php echo $r['lowodds'];?></span></td>
                        <td rowspan="2">
                            <div class="height35"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" target="_blank">分析</a></div>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/asia/" target="_blank">亚</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/euro/" target="_blank">欧</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/ou/" target="_blank">大</a></span></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><img src="<?php echo $r['guest_logo'];?>" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><?php echo str_cut($r['guestname_cn'], 30, '...');?></a></div></td>
                        <td class="guestone"><?php echo  empty($r['guestone']) ? '-' : $r['guestone'] ?></td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="guesttwo"><?php echo  empty($r['guesttwo']) ? '-' : $r['guesttwo'] ?></td><?php } ?>
                        <td class="guestthree"><?php echo  empty($r['guestthree']) ? '-' : $r['guestthree'] ?></td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="guestfour"><?php echo  empty($r['guestfour']) ? '-' : $r['guestfour'] ?></td><?php } ?>
                        <td class="grey2"><span class="guestFirstHalf"><?php echo  empty($r['guestFirstHalf']) ? '-' : $r['guestFirstHalf'] ?></span>/<span class="guestSecondHalf"><?php echo  empty($r['guestSecondHalf']) ? '-' : $r['guestSecondHalf'] ?></span></td>
                        <td><span class="red guestscore"><?php echo  empty($r['guestscore']) ? '-' : $r['guestscore'] ?></span></td>
                        <td class="grey2">半: <span class="halfDiff"><?php echo  empty($r['halfDiff']) ? '-' : $r['halfDiff'] ?></span></td>
                        <td class="grey2">半: <span class="halfSum"><?php echo  empty($r['halfSum']) ? '-' : $r['halfSum'] ?></span></td>
                        <td><span id="guestwin3<?php echo $r['scheduleid'];?>" data-guestwin="<?php echo $r['guestwin'];?>"><?php echo $r['guestwin'];?></span></td>
                        <td><span class="orange" id="letgoal4<?php echo $r['scheduleid'];?>" data-letgoal="<?php echo abs($r[letgoal]);?>"><?php if($r['letgoal'] < 0) { ?><?php echo abs($r['letgoal']);?><?php } ?></span><span id="guestodds3<?php echo $r['scheduleid'];?>" class="pos" data-guestodds="<?php echo $r['guestodds'];?>"><?php echo $r['guestodds'];?></span></td>
                        <td><?php if($r['totalscore']) { ?><span class="orange">大a<span id="totalscore4<?php echo $r['scheduleid'];?>" data-totalscore="<?php echo $r['totalscore'];?>"><?php echo $r['totalscore'];?></span></span><?php } ?> <span id="highodds3<?php echo $r['scheduleid'];?>" data-highodds="<?php echo $r['highodds'];?>"><?php echo $r['highodds'];?></span></td>
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><img src="" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['hometeamid'];?>/"><?php echo str_cut($r['homename_cn'], 30, '...');?></a></div></td>
                        <td class="homeone">-</td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="hometwo">-</td><?php } ?>
                        <td class="homethree">-</td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="homefour">-</td><?php } ?>
                        <td class="grey2"><span class="homeFirstHalf">-</span>/<span class="homeSecondHalf">-</span></td>
                        <td><span class="red homescore">-</span></td>
                        <td class="grey2">总:<span class="wholeDiff">-</span></td>
                        <td class="grey2">总: <span class="wholeSum">-</span></td>
                        <td><span id="homewin3<?php echo $r['scheduleid'];?>" data-homewin="<?php echo $r['homewin_f'];?>"><?php echo $r['homewin_f'];?></span></td>
                        <td><span class="orange" id="letgoal3<?php echo $r['scheduleid'];?>" data-letgoal="<?php echo abs($r[letgoal_f]);?>"><?php if($r['letgoal_f'] >= 0) { ?><?php echo $r['letgoal_f'];?><?php } ?></span> <span id="homeodds3<?php echo $r['scheduleid'];?>" class="pos" data-homeodds="<?php echo $r['homeodds_f'];?>"><?php echo $r['homeodds_f'];?></span></td>
                        <td><?php if($r[totalscore_f]) { ?><span class="orange">小A</span><?php } ?><span class="orange" id="totalscore3<?php echo $r['scheduleid'];?>" data-totalscore="<?php echo $r['totalscore_f'];?>"><?php echo $r['totalscore_f'];?></span><span id="lowodds3<?php echo $r['scheduleid'];?>" data-lowodds="<?php echo $r['lowodds_f'];?>" style="margin-left: 1px;"> <?php echo $r['lowodds_f'];?></span></td>
                        <td rowspan="2">
                            <div class="height35"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" target="_blank">分析</a></div>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/asia/" target="_blank">亚</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/euro/" target="_blank">欧</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/ou/" target="_blank">大</a></span></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10"><div class="imgCon"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><img src="" alt="" width="60%" class="team-photo"></a></div><div class="teamname"><a target="_blank" href="<?php echo APP_PATH;?>lq/team/<?php echo $r['guestteamid'];?>/"><?php echo str_cut($r['guestname_cn'], 30, '...');?></a></div></td>
                        <td class="guestone">-</td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="guesttwo">-</td><?php } ?>
                        <td class="guestthree">-</td>
                        <?php if($r['sclasspart'] == 4) { ?><td class="guestfour">-</td><?php } ?>
                        <td class="grey2"><span class="guestFirstHalf">-</span>/<span class="guestSecondHalf">-</span></td>
                        <td><span class="red guestscore">-</span></td>
                        <td class="grey2">半: <span class="halfDiff">-</span></td>
                        <td class="grey2">半: <span class="halfSum">-</span></td>
                        <td><span id="guestwin3<?php echo $r['scheduleid'];?>" data-guestwin="<?php echo $r['guestwin_f'];?>"><?php echo $r['guestwin_f'];?></span></td>
                        <td><span class="orange" id="letgoal4<?php echo $r['scheduleid'];?>" data-letgoal="<?php echo abs($r[letgoal_f]);?>"><?php if($r['letgoal_f'] < 0) { ?><?php echo abs($r['letgoal_f']);?><?php } ?></span><span id="guestodds3<?php echo $r['scheduleid'];?>" class="pos" data-guestodds="<?php echo $r['guestodds_f'];?>"><?php echo $r['guestodds_f'];?></span></td>
                        <td><span class="orange">大a<span id="totalscore4<?php echo $r['scheduleid'];?>" data-totalscore="<?php echo $r['totalscore_f'];?>"><?php echo $r['totalscore_f'];?></span></span> <span id="highodds3<?php echo $r['scheduleid'];?>" data-highodds="<?php echo $r['highodds_f'];?>"><?php echo $r['highodds_f'];?></span></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <?php $n++;}unset($n); ?>
        </div>
        <?php $n++;}unset($n); ?>
    </div>
    <!--</div>-->
</div>

<div class="modal fade" id="game-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" >赛事选择</h4>
            </div>
            <div class="modal-body">
                <div class="dioLog-bd clearfix">
                    <?php $n=1;if(is_array($sclassidData)) foreach($sclassidData AS $r) { ?>
                    <div class="col-sm-3">
                        <label>
                            <input type="checkbox" name="competitionid[]" data-name="competition" value="<?php echo $r['sclassid'];?>">
                            <?php echo $r['name_s'];?>
                        </label>
                    </div>
                    <?php $n++;}unset($n); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info checkAll" data-action="check-all" data-target="competition">全选</button>
                <button type="button" class="btn btn-info clearCheck" data-action="check-clear" data-target="competition">全不选</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" data-target="competition" data-action="submit" data-dismiss="modal">确定</button>
            </div>
        </div>
    </div>
</div>

<div class="audioBox hid" style="display: none">
    <audio id="audio">
        <source src="<?php echo JS_PATH;?>audio/2.mp3" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
</div>

<!--选择公司-->
<form action="<?php echo APP_PATH;?>lqscore/" method="post" id="search-form">
    <input type="hidden" id="companyid" name="company_id" value="<?php echo $companyId;?>">
</form>

<script>
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>

<?php $js = array('bt_live_schedule.js', 'bt_live_ajax.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js');?>
<?php include template('content', 'footer'); ?>