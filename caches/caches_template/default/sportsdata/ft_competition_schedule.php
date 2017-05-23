<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('database_info.css')?>
<?php $nav_id = 6?>
<?php include template('content', 'header_score'); ?>
<nav>
    <div class="container">
        <div class="row">
            <div class="matchNav">
                <ul class="clearfix">
                    <li><a <?php if(! in_array($id, [92,85,34,39,152,149,1,5])) { ?>class="active"<?php } ?> href="javascript:;">热门联赛</a></li>
                    <li><a <?php if($id == 92) { ?>class="active"<?php } ?> href="<?php echo APP_PATH;?>competition/92/schedule/">英超</a></li>
                    <li><a <?php if($id == 85) { ?>class="active"<?php } ?> href="<?php echo APP_PATH;?>competition/85/schedule/">西甲</a></li>
                    <li><a <?php if($id == 34) { ?>class="active"<?php } ?> href="<?php echo APP_PATH;?>competition/34/schedule/">意甲</a></li>
                    <li><a <?php if($id == 39) { ?>class="active"<?php } ?> href="<?php echo APP_PATH;?>competition/39/schedule/">德甲</a></li>
                    <li><a <?php if($id == 152) { ?>class="active"<?php } ?> href="<?php echo APP_PATH;?>competition/152/schedule/">中超</a></li>
                    <li><a <?php if($id == 149) { ?>class="active"<?php } ?> href="<?php echo APP_PATH;?>competition/149/schedule/">世足</a></li>
                    <li><a <?php if($id == 1) { ?>class="active"<?php } ?> href="<?php echo APP_PATH;?>sclass/1/schedule/">NBA</a></li>
                    <li><a <?php if($id == 5) { ?>class="active"<?php } ?> href="<?php echo APP_PATH;?>sclass/5/schedule/">CBA</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<section>
    <div class="container">
        <?php include template('sportsdata', 'ft_competition_crumbs'); ?>
        <div class="row">
            <div class="page-head clearfix">
                <h1 class="m-title fl">
                    <img src="<?php echo PHOTO_PATH;?>competition/<?php echo $competitionid;?>.jpg" width="59" height="59" alt="" class="fl competition-photo">
                    <?php echo $info['name'];?>
                </h1>

                <!--<div class="m-control-item fl">-->
                    <!--<div class="m-control-title">赛季</div>-->
                    <!--<div>-->
                        <!--<div class="dropdown">-->
                            <!--<button class="btn btn-default" id="jw_dropA" data-toggle="dropdown" aria-expanded="true">-->
                                <!--<i class="icon-calendar"></i>-->
                                <!--2016-2017-->
                                <!--<i class="icon-angle-down"></i>-->
                            <!--</button>-->
                            <!--<div class="dropdown-menu" aria-labelledby="jw_dropA">-->
                                <!--<ul>-->
                                    <!--<li>123</li>-->
                                    <!--<li>123</li>-->
                                    <!--<li>123</li>-->
                                <!--</ul>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="m-control-item fl">
                    <div class="m-control-title">选择球队</div>
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-default" id="team-btn" data-toggle="dropdown" aria-expanded="true">
                                <span id="team"><?php if($_GET['teamid']) { ?><?php echo $team_info[$_GET['teamid']]['name'];?><?php } else { ?>请选择球队<?php } ?></span>
                                <i class="icon-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="team-btn">
                                <input type="hidden" name="teamid" id="teamid" value="<?php echo $_GET['teamid'];?>">
                                <ul data-action="filter" data-target="#teamid" data-show="#team" data-type="all">
                                    <?php $n=1;if(is_array($team_ids)) foreach($team_ids AS $data) { ?>
                                    <li class="text-center" data-value="<?php echo $data;?>"><?php echo $team_info[$data]['name'];?></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-control-item fl">
                    <div class="m-control-title">选择两支球队的本季对阵</div>
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-default" id="home-btn" data-toggle="dropdown" aria-expanded="true">
                                <span id="hometeam"><?php if($_GET['hometeamid']) { ?><?php echo $team_info[$_GET['hometeamid']]['name'];?><?php } else { ?>请选择球队<?php } ?></span>
                                <i class="icon-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="home-btn">
                                <input type="hidden" name="hometeamid" id="hometeamid" value="<?php echo $_GET['hometeamid'];?>">
                                <ul data-action="filter" data-target="#hometeamid" data-show="#hometeam" data-type="home">
                                    <?php $n=1;if(is_array($team_ids)) foreach($team_ids AS $data) { ?>
                                    <li class="text-center" data-value="<?php echo $data;?>"><?php echo $team_info[$data]['name'];?></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                        </div>
                        <span class="vs">VS</span>
                        <div class="dropdown">
                            <button class="btn btn-default" id="away-btn" data-toggle="dropdown" aria-expanded="true">
                                <span id="awayteam"><?php if($_GET['awayteamid']) { ?><?php echo $team_info[$_GET['awayteamid']]['name'];?><?php } else { ?>请选择球队<?php } ?></span>
                                <i class="icon-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="away-btn">
                                <input type="hidden" name="awayteamid" id="awayteamid" value="<?php echo $_GET['awayteamid'];?>">
                                <ul data-action="filter" data-target="#awayteamid" data-show="#awayteam" data-type="away">
                                    <?php $n=1;if(is_array($team_ids)) foreach($team_ids AS $data) { ?>
                                    <li class="text-center" data-value="<?php echo $data;?>"><?php echo $team_info[$data]['name'];?></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-sm-9 pdL0 pdR0">

                <div id="iframe_page">

                    <div class="page-item">
                        <div class="database-title mrgB10">
                            赛程赛果
                        </div>
                        <div class="table-item table-min">
                            <div class="table-title">
                                全季赛程
                                <label for="player" class="checkbox-inline fr">
                                    <input type="checkbox" id="player">
                                    <i class="table-checkbox"></i>
                                    显示备注
                                </label>
                            </div>
                            <table class="table table-head">
                                <?php $n=1;if(is_array($competition_category)) foreach($competition_category AS $data) { ?>
                                <tr>
                                    <?php $n=1; if(is_array($data)) foreach($data AS $name => $category) { ?>
                                    <td <?php if($name==$_GET[$category]) { ?>class="avtive"<?php } ?>>
                                        <a href="javascript:;" data-action="link" data-base="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/schedule/<?php echo $category;?>/<?php echo $name;?>/" class="center-block"><?php echo $name;?></a>
                                    </td>
                                    <?php $n++;}unset($n); ?>
                                </tr>
                                <?php $n++;}unset($n); ?>
                            </table>
                        </div>
                        <div class="table-item ">
                            <table class="table" id="data-table">
                                <thead>
                                    <tr>
                                        <th>联赛</th>
                                        <th>时间</th>
                                        <th>主队</th>
                                        <th>比分</th>
                                        <th>客队</th>
                                        <th>半场</th>
                                        <th>胜负</th>
                                        <th>数据中心</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=1;if(is_array($list)) foreach($list AS $data) { ?>
                                    <tr data-home="<?php echo $data['hometeamid'];?>" data-away="<?php echo $data['awayteamid'];?>">
                                        <td><?php echo $data['competitionshortname'];?></td>
                                        <td><?php echo date("Y-m-d H:i", $data['date']);?></td>
                                        <td>
                                            <a href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                                <?php echo $data['homeshortname'];?>
                                            </a>
                                        </td>
                                        <td>
                                            <span <?php if($data['homescore'] > $data['awayscore']) { ?>class="red"<?php } ?>><?php echo $data['homescore'];?></span>
                                            -
                                            <span <?php if($data['homescore'] < $data['awayscore']) { ?>class="red"<?php } ?>><?php echo $data['awayscore'];?></span>
                                        </td>
                                        <td>
                                            <a href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/" target="_blank">
                                                <?php echo $data['awayshortname'];?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if($data['half']) { ?>
                                            <?php list($half['home'], $half['away']) = explode('-', $data['half'])?>
                                            <span <?php if($half['home'] > $half['away']) { ?>class="red"<?php } ?>><?php echo $half['home'];?></span>
                                            -
                                            <span <?php if($half['home'] < $half['away']) { ?>class="red"<?php } ?>><?php echo $half['away'];?></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <span class="<?php echo $data['result'];?>"><?php echo L($data['result']);?></span>
                                        </td>
                                        <td>
                                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/" target="_blank">析</a>
                                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsasia/" target="_blank">亚</a>
                                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsou/" target="_blank">大</a>
                                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddseuro/" target="_blank">欧</a>
                                        </td>
                                    </tr>
                                    <?php $n++;}unset($n); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="hint">
                            以上资料仅供参考  更新于<?php echo $update_time;?>
                        </div>
                    </div>

                    <div class="page-item">
                        <div class="database-title">
                            赛制
                        </div>
                        <div class="text-content">
                            <p><?php echo $info['system'];?></p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-3 pdR0">

                <div class="sideNav">
                    <div class="database-title">
                        <em class="icon-list mrgR"></em>
                        联赛数据中心
                    </div>
                    <ul class="sideNav-menu">
                        <li class="active"><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/schedule/">赛程结果</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/standings/">积分表</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/oddsway/">盘路统计</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/hsscores/">上 / 下半场入球较多</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/overunder/">上，下盘全场入球</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/hfstat/">半全场统计</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/oddeven/">入球总数及单双数</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/teamscores/">球队总入球数</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/frequentresults/">最常见赛果</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/getmiss/">攻守统计</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/shooter/">神射手榜</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/goaltime/">进球时间分布</a></li>
                        <li ><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/fgetmiss/">最先入球 / 失球</a></li>
                        <li><a href="<?php echo APP_PATH;?>competition/<?php echo $competitionid;?>/correctscore/">波胆分布</a></li>
                    </ul>
                </div>
                
                <div class="sideRank">
                    <div class="database-title">
                        <?php echo $info['shortname'];?>积分榜
                        <a href="" class="more fr">更多</a>
                    </div>
                    <div id="table_siderank" style="overflow: hidden;">
                        <table class="table table-siderank">
                        <tr>
                            <th>排名</th>
                            <th>球队</th>
                            <th>赛</th>
                            <th>胜</th>
                            <th>平</th>
                            <th>负</th>
                            <th>积分</th>
                        </tr>
                        <?php $n=1; if(is_array($standings)) foreach($standings AS $rank => $data) { ?>
                            <?php $n=1;if(is_array($data)) foreach($data AS $value) { ?>
                            <tr>
                                <td><?php echo $rank;?></td>
                                <td>
                                    <a href="<?php echo APP_PATH;?>/team/<?php echo $value['teamid'];?>/" target="_blank">
                                        <?php if($value['teamshortname']) { ?><?php echo $value['teamshortname'];?><?php } else { ?><?php echo $value['teamname'];?><?php } ?>
                                    </a>
                                </td>
                                <td><?php echo $value['total'];?></td>
                                <td><?php echo $value['win'];?></td>
                                <td><?php echo $value['draw'];?></td>
                                <td><?php echo $value['lose'];?></td>
                                <td><?php echo $value['score'];?></td>
                            </tr>
                            <?php $n++;}unset($n); ?>
                        <?php $n++;}unset($n); ?>
                    </table>
                    </div>
                    <div class="side-footer-link">
                        <a href="javascript:;" id="toggle_btn">
                            展开全部
                            <em class="icon-chevron-down"></em>
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<script>
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>
<?php $js = array('ft_competition_schedule.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js', 'ft_database.new.js')?>
<?php include template('content', 'footer'); ?>