<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = ['bt_immediate.css'];?>
<?php $nav_id = 2;?>
<?php include template('wap', 'wap_header'); ?>
<!-- 你的html代码 -->
<div class="content">
    <div class="buttons-tab">
        <a href="<?php echo WAP_PATH;?>lqscore/" class="active button">即时</a>
        <a href="<?php echo WAP_PATH;?>lqwanchang/" class="button close-popup">完场</a>
        <a href="<?php echo WAP_PATH;?>lqsaicheng/" class="button close-popup">下日</a>
        <a href="<?php echo WAP_PATH;?>lqevent/" class="button close-popup">资料</a>
        <a href="<?php echo WAP_PATH;?>lqodds/" class="button close-popup">指数</a>
    </div>
    <div class="content-block">
        <div class="tabs">
            <div class="tab active">
                <div id="start-list">
                    <div class="text-center">
                        <?php if(count($return['in_progress'])) { ?>
                        <span class="list-title" id="start">正在进行的比赛</span>
                        <?php } ?>
                    </div>
                    <div class="list-container">
                        <?php $n=1;if(is_array($return['in_progress'])) foreach($return['in_progress'] AS $r) { ?>
                        <div class="data-item clearfix" data-schedule-id="<?php echo $r['scheduleid'];?>">
                            <div class="data-item-top">
                                <span class="data-event-name"><?php echo $r['sclassname_cn'];?></span>
                                <span class="data-time" data-key="date"><?php echo date('H:i', $r['date']);?></span>
                                <span class="data-fields" data-key="status"><?php echo $r['status'];?></span>&nbsp;&nbsp;
                                <span class="data-fields" data-key="remaintime"><?php echo $r['remaintime'];?></span>
                            </div>
                            <div class="data-item-bottom">
                                <div class="left">
                                    <div class="team home-name"><?php echo $r['homename_cn'];?></div><div class="team guest-name"><?php echo $r['guestname_cn'];?></div>
                                </div>
                                <div class="right">
                                    <div class="team">
                                        <span class="data-num orange" data-key="home-letgoal"><?php if($r['letgoal'] >= 0 ) { ?><?php echo abs($r['letgoal']);?><?php } ?></span>
                                        <span class="data-num" data-key="homeone"><?php echo $r['homeone'];?></span>
                                        <span class="data-num" data-key="hometwo"><?php echo $r['hometwo'];?></span>
                                        <span class="data-num" data-key="homethree"><?php echo $r['homethree'];?></span>
                                        <span class="data-num" data-key="homefour"><?php echo $r['homefour'];?></span>
                                        <span class="data-num red fr" data-key="homescore" data-target="home-name"><?php echo $r['homescore'];?></span>
                                    </div>
                                    <div class="team">
                                        <span class="data-num orange" data-key="guest-letgoal"><?php if($r['letgoal'] < 0 ) { ?><?php echo abs($r['letgoal']);?><?php } ?></span>
                                        <span class="data-num" data-key="guestone"><?php echo $r['guestone'];?></span>
                                        <span class="data-num" data-key="guesttwo"><?php echo $r['guesttwo'];?></span>
                                        <span class="data-num" data-key="guestthree"><?php echo $r['guestthree'];?></span>
                                        <span class="data-num" data-key="guestfour"><?php echo $r['guestfour'];?></span>
                                        <span class="data-num red fr" data-key="guestscore" data-target="guest-name"><?php echo $r['guestscore'];?></span>
                                    </div>
                                </div>
                                <div class="link">
                                    <a href="<?php echo WAP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" class="icon_arrow" ></a>
                                </div>
                            </div>
                        </div>
                        <?php $n++;}unset($n); ?>
                    </div>
                </div>
                <div id="ready-list">
                    <div class="text-center">
                        <?php if(count($return['not_started'])) { ?>
                        <span class="list-title" id="ready">未开始的比赛</span>
                        <?php } ?>
                    </div>
                    <div class="list-container">
                        <?php $n=1;if(is_array($return['not_started'])) foreach($return['not_started'] AS $r) { ?>
                        <div class="data-item clearfix" data-schedule-id="<?php echo $r['scheduleid'];?>" data-start-time="<?php echo $r['date'];?>">
                            <div class="data-item-top">
                                <span class="data-event-name"><?php echo $r['sclassname_cn'];?></span>
                                <span class="data-time" data-key="date"><?php echo date('H:i', $r['date']);?></span>
                                <span class="data-fields" data-key="status"><?php echo $r['status'];?></span>&nbsp;&nbsp;
                                <span class="data-fields" data-key="remaintime"><?php echo $r['remaintime'];?></span>
                            </div>
                            <div class="data-item-bottom">
                                <div class="left">
                                    <div class="team home-name"><?php echo $r['homename_cn'];?></div><div class="team guest-name"><?php echo $r['guestname_cn'];?></div>
                                </div>
                                <div class="right">
                                    <div class="team">
                                        <span class="data-num orange" data-key="home-letgoal"><?php if($r['letgoal'] >= 0 ) { ?><?php echo abs($r['letgoal']);?><?php } ?></span>
                                        <span class="data-num" data-key="homeone"><?php echo $r['homeone'];?></span>
                                        <span class="data-num" data-key="hometwo"><?php echo $r['hometwo'];?></span>
                                        <span class="data-num" data-key="homethree"><?php echo $r['homethree'];?></span>
                                        <span class="data-num" data-key="homefour"><?php echo $r['homefour'];?></span>
                                        <span class="data-num red fr" data-key="homescore" data-target="home-name"><?php echo $r['homescore'];?></span>
                                    </div>
                                    <div class="team">
                                        <span class="data-num orange" data-key="guest-letgoal"><?php if($r['letgoal'] < 0 ) { ?><?php echo abs($r['letgoal']);?><?php } ?></span>
                                        <span class="data-num" data-key="guestone"><?php echo $r['guestone'];?></span>
                                        <span class="data-num" data-key="guesttwo"><?php echo $r['guesttwo'];?></span>
                                        <span class="data-num" data-key="guestthree"><?php echo $r['guestthree'];?></span>
                                        <span class="data-num" data-key="guestfour"><?php echo $r['guestfour'];?></span>
                                        <span class="data-num red fr" data-key="guestscore" data-target="guest-name"><?php echo $r['guestscore'];?></span>
                                    </div>
                                </div>
                                <div class="link">
                                    <a href="<?php echo WAP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" class="icon_arrow"></a>
                                </div>
                            </div>
                        </div>
                        <?php $n++;}unset($n); ?>
                    </div>
                </div>
                <div id="end-list">
                    <div class="text-center">
                        <?php if(count($return['finished'])) { ?>
                        <span class="list-title" id="end">结束的比赛</span>
                        <?php } ?>
                    </div>
                    <div class="list-container">
                        <?php $n=1;if(is_array($return['finished'])) foreach($return['finished'] AS $r) { ?>
                        <div class="data-item clearfix">
                            <div class="data-item-top">
                                <span class="data-event-name"><?php echo $r['sclassname_cn'];?></span>
                                <span class="data-time"><?php echo date('H:i', $r['date']);?></span>
                                <span class="data-fields"><?php echo $r['status'];?>&nbsp;&nbsp;<?php echo $r['remaintime'];?></span>
                            </div>
                            <div class="data-item-bottom">
                                <div class="left">
                                    <div class="team"><?php echo $r['homename_cn'];?></div><div class="team"><?php echo $r['guestname_cn'];?></div>
                                </div>
                                <div class="right">
                                    <div class="team">
                                        <span class="data-num orange"><?php if($r['letgoal'] >= 0 ) { ?><?php echo abs($r['letgoal']);?><?php } ?></span>
                                        <span class="data-num"><?php echo $r['homeone'];?></span>
                                        <span class="data-num"><?php echo $r['hometwo'];?></span>
                                        <span class="data-num"><?php echo $r['homethree'];?></span>
                                        <span class="data-num"><?php echo $r['homefour'];?></span>
                                        <span class="data-num red fr"><?php echo $r['homescore'];?></span>
                                    </div>
                                    <div class="team">
                                        <span class="data-num orange"><?php if($r['letgoal'] < 0 ) { ?><?php echo abs($r['letgoal']);?><?php } ?></span>
                                        <span class="data-num"><?php echo $r['guestone'];?></span>
                                        <span class="data-num"><?php echo $r['guesttwo'];?></span>
                                        <span class="data-num"><?php echo $r['guestthree'];?></span>
                                        <span class="data-num"><?php echo $r['guestfour'];?></span>
                                        <span class="data-num red fr"><?php echo $r['guestscore'];?></span>
                                    </div>
                                </div>
                                <div class="link">
                                    <a href="<?php echo WAP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" class="icon_arrow"></a>
                                </div>
                            </div>
                        </div>
                        <?php $n++;}unset($n); ?>
                    </div>
                </div>
           </div>

        </div>
    </div>

    <?php include template('wap', 'footer_nav'); ?>

</div>

</div>
</div>

<?php $js = ['bt_live_schedule.js'];?>
<?php include template('wap', 'wap_footer'); ?>