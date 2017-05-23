<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><nav>
    <div class="container">
        <div class="crumbs" style="margin-top: 5px;">
            <i class="crumbs-icon"></i>当前位置：
            <a href="<?php echo APP_PATH;?>" class="orange">首页</a>&gt;
            <a href="<?php echo APP_PATH;?>zqevent/" class="orange">足球资料库</a>&gt;
            <a href="<?php echo APP_PATH;?>competition/<?php echo $gameinfo['competitionid'];?>/schedule/" class="orange"><?php echo $gameinfo['competitionshortname'];?></a>&gt;
            <?php echo $gameinfo['homeshortname'];?> vs <?php echo $gameinfo['awayshortname'];?>
        </div>
        <div class="row matchNav">

            <div class="matchNav-hd clearfix">
                <div class="col-md-4">
                    <div class="match-tip">
                        <a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $gameinfo['competitionid'];?>/schedule/">
                            <span><?php echo $gameinfo['competitionshortname'];?></span>
                        </a>
                        <time><?php echo date('Y-m-d H:i', $gameinfo['date']);?></time>
                    </div>
                    <div class="match-team">
                        <div class="team-rank">联赛排名：<?php echo $gameinfo['homerank'];?></div>
                        <div class="team-name">
                            <a target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $gameinfo['hometeamid'];?>/">
                                <?php echo $gameinfo['homeshortname'];?>
                            </a>
                        </div>
                    </div>
                    <div class="match-team-icon">
                        <a target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $gameinfo['hometeamid'];?>/">
                            <img src="<?php echo PHOTO_PATH;?>team/<?php echo $gameinfo['hometeamid'];?>.jpg" alt="<?php echo $gameinfo['homename'];?>" class="team-photo">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="match-score">
                        <div class="line-score">
                            <div class="team-score"><?php echo $gameinfo['homescore'];?>:<?php echo $gameinfo['awayscore'];?></div>
                            <div>半场<?php echo join(':',explode('-',$gameinfo['half']));?></div>
                        </div>
                        <div class="line-site">
                            <div><i class="site-icon"></i><?php echo $gameinfo['stadium'];?></div>
                            <div>
                                <i class="weather-icon <?php echo $gameinfo['weather_style'];?>"></i><?php echo $gameinfo['weather'];?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 right">
                    <div class="match-team-icon">
                        <a target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $gameinfo['awayteamid'];?>/">
                            <img src="<?php echo PHOTO_PATH;?>team/<?php echo $gameinfo['awayteamid'];?>.jpg" alt="<?php echo $gameinfo['awayname'];?>" class="team-photo">
                        </a>
                    </div>
                    <div class="match-team">
                        <div class="team-rank">联赛排名：<?php echo $gameinfo['awayrank'];?></div>
                        <div class="team-name">
                            <a target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $gameinfo['awayteamid'];?>/">
                                <?php echo $gameinfo['awayshortname'];?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="matchNavBar">
                <ul class="clearfix">
                    <li><a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/analyse/"  class="<?php if($tag_analyse) { ?>active<?php } ?>">数据统计</a></li>
                    <li><a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/oddseuro/"  class="<?php if($tag_euro) { ?>active<?php } ?>">欧洲指数</a></li>
                    <li><a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/oddsasia/"  class="<?php if($tag_asia) { ?>active<?php } ?>">亚洲盘口</a></li>
                    <li><a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/oddsou/"  class="<?php if($tag_ou) { ?>active<?php } ?>">大小指数</a></li>
                    <li><a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/stats/"  class="<?php if($tag_stat) { ?>active<?php } ?>">技术统计</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>