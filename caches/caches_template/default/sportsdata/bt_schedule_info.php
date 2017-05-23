<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!-- nav -->
<nav>
    <div class="container">
        <div class="crumbs" style="margin-top: 5px;">
            <i class="crumbs-icon"></i>当前位置：
            <a href="<?php echo APP_PATH;?>" class="orange">首页</a>&gt;
            <a href="<?php echo APP_PATH;?>lqevent/" class="orange">篮球资料库</a>&gt;
            <a href="<?php echo APP_PATH;?>sclass/<?php echo $schedule_id;?>/schedule/" class="orange"><?php echo $schedule_info['sclassname_cn'];?></a>&gt;
            <?php echo $schedule_info['homename_cn'];?> vs <?php echo $schedule_info['guestname_cn'];?>
        </div>
        <div class="row matchNav">
            <div class="matchNav-hd clearfix">
                <div class="col-md-4">
                    <div class="match-tip">
                        <span>
                            <?php echo $schedule_info['sclassname_cn'];?>
                            <?php echo $schedule_info['sclasscategory_cn'];?>
                        </span>
                        <time><?php echo $schedule_info['sclassseason'];?></time>
                    </div>
                    <div class="match-team">
                        <div class="team-rank">联赛排名：<?php if($schedule_info['homerank']) { ?><?php echo $schedule_info['homerank'];?><?php } ?></div>
                        <div class="team-name"><a href="<?php echo APP_PATH;?>lq/team/<?php echo $schedule_info['hometeamid'];?>/" target="_blank"><?php echo $schedule_info['homename_cn'];?></a></div>
                    </div>
                    <div class="match-team-icon">
                        <a href="<?php echo APP_PATH;?>lq/team/<?php echo $schedule_info['hometeamid'];?>/" target="_blank">
                            <img src="<?php echo BT_TEAM_PATH;?><?php echo $schedule_info['hometeamid'];?>.jpg" class="bt-team-photo">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="match-score">
                        <div class="line-score">
                            <div class="team-score"><?php echo $schedule_info['homescore'];?>:<?php echo $schedule_info['guestscore'];?></div>
                            <div>半场<?php echo $schedule_info['homehalfscore'];?>:<?php echo $schedule_info['guesthalfscore'];?></div>
                        </div>
                        <div class="line-site">

                            <div>
                                <i class="site-icon"></i>
                                <?php echo $schedule_info['stadium'];?>
                            </div>
                            <div>
                                <span>状态:</span>
                                <?php echo $arr_status[$schedule_info['status']];?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 right">
                    <div class="match-team-icon">
                        <a href="<?php echo APP_PATH;?>lq/team/<?php echo $schedule_info['guestteamid'];?>/" target="_blank">
                            <img src="<?php echo BT_TEAM_PATH;?><?php echo $schedule_info['guestteamid'];?>.jpg" class="bt-team-photo">
                        </a>
                    </div>
                    <div class="match-team">
                        <div class="team-rank">联赛排名：<?php if($schedule_info['guestrank']) { ?><?php echo $schedule_info['guestrank'];?><?php } ?></div>
                        <div class="team-name"><a href="<?php echo APP_PATH;?>lq/team/<?php echo $schedule_info['guestteamid'];?>/" target="_blank"><?php echo $schedule_info['guestname_cn'];?></a></div>
                    </div>
                </div>
            </div>
            <div class="matchNavBar">
                <ul class="clearfix">
                    <li><a href="<?php echo APP_PATH;?>schedule/<?php echo $schedule_id;?>/analyse/"  id="analyse">分析</a></li>
                    <li><a href="<?php echo APP_PATH;?>schedule/<?php echo $schedule_id;?>/euro/"  id="euro">欧赔</a></li>
                    <li><a href="<?php echo APP_PATH;?>schedule/<?php echo $schedule_id;?>/asia/"  id="asia">让分</a></li>
                    <li><a href="<?php echo APP_PATH;?>schedule/<?php echo $schedule_id;?>/ou/"  id="ou">总分</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>
<!-- nav end -->