<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('ft_game_analyse.css')?>
<?php include template('content', 'header_score'); ?>

<!-- nav -->
<?php include template('sportsdata', 'ft_game_info'); ?>
<!-- nav end -->

<!-- main body -->
<section class="main pdB20" id="table-content" name="body">
    <div class="container">
        <div class="row">
            <!-- 交往战绩 -->
            <div class="score-item" id="meet">
                <div class="score-item-hd">
                    <span class="score-item-title">交往战绩</span>

                    <div class="dropdown">
                        <button class="btn btn-default" data-action="table-recover" data-target="meet-table">
                            全部赛事
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" id="meet-size" data-toggle="dropdown">
                            场次
                            <i class="icon-angle-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="meet-size">
                            <ul data-action="size-filter" data-target="meet-table">
                                <?php $n=1;if(is_array($size_list)) foreach($size_list AS $size) { ?>
                                <li data-value="<?php echo $size;?>"><?php echo $size;?></li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" id="meet-competition-list" data-toggle="dropdown">
                            赛事
                            <i class="icon-angle-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="meet-competition-list">
                            <ul data-action="competition-filter" data-target="meet-table">
                                <?php $n=1; if(is_array($meeting_competition_id)) foreach($meeting_competition_id AS $id => $name) { ?>
                                <li data-value="<?php echo $id;?>"><?php echo $name;?></li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="score-item-bd">
                    <table class="table" id="meet-table" data-action="stats">
                        <thead>
                            <tr>
                                <th>赛事</th>
                                <th class="border">日期</th>
                                <th>球队</th>
                                <th>比分</th>
                                <th>球队</th>
                                <th class="border">半场</th>
                                <th>让球</th>
                                <th>盘路</th>
                                <th>全场大小(2.5)</th>
                                <th>半场大小(0.75)</th>
                                <th>单双</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($meeting)) foreach($meeting AS $data) { ?>
                            <tr data-competition="<?php echo $data['competitionid'];?>" data-size="<?php echo $data['full_size'];?>" data-is-home="<?php echo $data['is_home'];?>"
                                data-main-home-score="<?php echo $data['main_home_score'];?>" data-main-away-score="<?php echo $data['main_away_score'];?>" data-home-score="<?php echo $data['homescore'];?>"
                                data-away-score="<?php echo $data['awayscore'];?>" data-plate="<?php echo $data['plate']['0'];?>" data-single-double="<?php echo $data['single_double'];?>">
                                <td>
                                    <a href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/" target="_blank">
                                        <?php echo $data['competition_name'];?>
                                    </a>
                                </td>
                                <td class="border"><?php echo $data['date'];?></td>
                                <td>
                                    <a href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                        <?php echo $data['homename'];?>
                                    </a>
                                </td>
                                <td class="score"><?php echo $data['homescore'];?>-<?php echo $data['awayscore'];?></td>
                                <td>
                                    <a href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/" target="_blank">
                                        <?php echo $data['awayname'];?>
                                    </a>
                                </td>
                                <td class="border"><?php echo $data['half'];?></td>
                                <td class="letBall"><?php echo $data['handicap'];?></td>
                                <td class="plate <?php echo $data['plate']['0'];?>"><?php echo L($data['plate'][0]);?><?php echo L($data['plate'][1]);?></td>
                                <td class="size <?php echo $data['full_size'];?>"><?php echo L($data['full_size']);?></td>
                                <td class="size <?php echo $data['half_size'];?>"><?php echo L($data['half_size']);?></td>
                                <td class="single-double <?php echo $data['single_double'];?>"><?php echo L($data['single_double']);?></td>
                            </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                </div>

                <div class="score-item-fd" stats-target="meet-table">
                    <p class="hint">
                        近<span data-stats="count"></span>场交锋，
                        <span data-stats="main">主队<span data-stats="win"></span>胜<span data-stats="draw"></span>平<span data-stats="lose"></span>负</span>，
                        <span data-stats="as_home">其中主场<span data-stats="win"></span>胜<span data-stats="draw"></span>平<span data-stats="lose"></span>负；</span>
                        近<span data-stats="count"></span>场开盘，
                        <span data-stats="plate"><span data-stats="win"></span>赢<span data-stats="waste"></span>走<span data-stats="lose"></span>输;</span>
                        <span data-stats="size">其中，<span data-stats="big"></span>场为大球，<span data-stats="little"></span>场为小球</span>
                    </p>
                </div>
            </div>

            <!-- 历史战绩 -->
            <div class="score-item" id="lishi">
                <h1 class="score-item-title">历史战绩</h1>

                <?php $n=1; if(is_array($team_history)) foreach($team_history AS $type => $list) { ?>
                <?php $team_name = $type . 'shortname'?>
                <div class="score-item-hd">
                    <b class="team-label"><?php echo $gameinfo[$team_name];?></b>
                    <div class="dropdown">
                        <button class="btn btn-default" data-action="table-recover" data-target="history-<?php echo $type;?>-table">
                            全部赛事
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" id="history-<?php echo $type;?>-size" data-toggle="dropdown">
                            场次
                            <i class="icon-angle-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="history-<?php echo $type;?>-size">
                            <ul data-action="size-filter" data-target="history-<?php echo $type;?>-table">
                                <?php $n=1;if(is_array($size_list)) foreach($size_list AS $size) { ?>
                                <li data-value="<?php echo $size;?>"><?php echo $size;?></li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" id="history-<?php echo $type;?>-competition-list" data-toggle="dropdown">
                            赛事
                            <i class="icon-angle-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="history-<?php echo $type;?>-competition-list">
                            <ul data-action="competition-filter" data-target="history-<?php echo $type;?>-table">
                                <?php $n=1; if(is_array($competition_list[$type])) foreach($competition_list[$type] AS $id => $name) { ?>
                                <li data-value="<?php echo $id;?>"><?php echo $name;?></li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="score-item-bd">
                    <table class="table" id="history-<?php echo $type;?>-table" data-action="stats">
                        <thead>
                        <tr>
                            <th>赛事</th>
                            <th class="border">日期</th>
                            <th>主队</th>
                            <th>比分</th>
                            <th class="border">客队</th>
                            <th>赛果</th>
                            <th>让球</th>
                            <th>盘路</th>
                            <th>全场大小(0.75)</th>
                            <th>单双</th>
                            <th>半场</th>
                            <th>半场大小(0.75)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($team_history[$type])) foreach($team_history[$type] AS $data) { ?>
                        <tr data-competition="<?php echo $data['competitionid'];?>" data-size="<?php echo $data['full_size'];?>" data-is-home="<?php echo $data['is_home'];?>"
                            data-main-home-score="<?php echo $data['main_home_score'];?>" data-main-away-score="<?php echo $data['main_away_score'];?>" data-home-score="<?php echo $data['homescore'];?>"
                            data-away-score="<?php echo $data['awayscore'];?>" data-plate="<?php echo $data['plate']['0'];?>" data-single-double="<?php echo $data['single_double'];?>"
                            data-half-size="<?php echo $data['half_size'];?>" data-neutral="<?php echo $data['neutral'];?>">
                            <td>
                                <a href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/" target="_blank">
                                    <?php echo $data['competition_name'];?>
                                </a>
                            </td>
                            <td class="border"><?php echo $data['date'];?></td>
                            <td>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                    <?php echo $data['homename'];?>
                                </a>
                            </td>
                            <td class="score"><?php echo $data['homescore'];?>-<?php echo $data['awayscore'];?></td>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/" target="_blank">
                                    <?php echo $data['awayname'];?>
                                </a>
                            </td>
                            <td class="result <?php echo $data['result'];?>"><?php echo L($data['result']);?></td>
                            <td class="letBall"><?php echo L($data['handicap']);?></td>
                            <td class="plate <?php echo $data['plate']['0'];?>"><?php echo L($data['plate'][0]);?><?php echo L($data['plate'][1]);?></td>
                            <td class="size <?php echo $data['full_size'];?>"><?php echo L($data['full_size']);?></td>
                            <td class="single-double <?php echo $data['single_double'];?>"><?php echo L($data['single_double']);?></td>
                            <td><?php echo $data['half'];?></td>
                            <td class="size <?php echo $data['half_size'];?>"><?php echo L($data['half_size']);?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                    <div class="info" stats-target="history-<?php echo $type;?>-table">
                        <p class="hint">
                            <span data-stats="count"></span>场交锋：
                            <span data-stats="result">
                                <span data-stats="win"></span>胜(<span data-stats="win_rate"></span>)、
                                <span data-stats="draw"></span>平(<span data-stats="draw_rate"></span>)、
                                <span data-stats="lose"></span>负(<span data-stats="lose_rate"></span>)。
                            </span>
                        </p>
                        <p class="hint">
                            <span data-stats="count"></span>场开盘：
                            <span data-stats="plate">
                                <span data-stats="win"></span>赢盘(<span data-stats="win_rate"></span>)、
                                <span data-stats="waste"></span>走水(<span data-stats="waste_rate"></span>)、
                                <span data-stats="lose"></span>输盘(<span data-stats="lose_rate"></span>)。
                            </span>
                        </p>
                        <p class="hint">
                        <span data-stats="count"></span>场交锋：
                            <span data-stats="size">
                                <span data-stats="big"></span>场大，
                                <span data-stats="little"></span>场小，
                            </span>
                            <span data-stats="single_double">
                                <span data-stats="single"></span>场单，
                                <span data-stats="double"></span>场双，
                            </span>
                            <span data-stats="half_size">
                                <span data-stats="big"></span>场半场大，
                                <span data-stats="little"></span>场半场小。
                            </span>
                        </p>
                    </div>
                </div>
                <?php $n++;}unset($n); ?>

                <div class="score-item-hd">
                    <b class="team-label">统计对比</b>
                </div>

                <div class="score-item-bd pdB20">
                    <table class="table">
                        <tr>
                            <th class="border">球队</th>
                            <th>总胜</th>
                            <th>总平</th>
                            <th>总负</th>
                            <th>主胜</th>
                            <th>主平</th>
                            <th>主负</th>
                            <th>中胜</th>
                            <th>中平</th>
                            <th>中负</th>
                            <th>客胜</th>
                            <th>客平</th>
                            <th>客负</th> 
                        </tr>
                        <tr>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $gameinfo['hometeamid'];?>/" target="_blank">
                                    <?php echo $gameinfo['homeshortname'];?>
                                </a>
                            </td>
                            <td><?php echo $history_stats['home']['win_rate'];?></td>
                            <td><?php echo $history_stats['home']['equal_rate'];?></td>
                            <td><?php echo $history_stats['home']['lose_rate'];?></td>
                            <td><?php echo $history_stats['home']['home_win_rate'];?></td>
                            <td><?php echo $history_stats['home']['home_equal_rate'];?></td>
                            <td><?php echo $history_stats['home']['home_lose_rate'];?></td>
                            <td><?php echo $history_stats['home']['neutral_win_rate'];?></td>
                            <td><?php echo $history_stats['home']['neutral_equal_rate'];?></td>
                            <td><?php echo $history_stats['home']['neutral_lose_rate'];?></td>
                            <td><?php echo $history_stats['home']['away_win_rate'];?></td>
                            <td><?php echo $history_stats['home']['away_equal_rate'];?></td>
                            <td><?php echo $history_stats['home']['away_lose_rate'];?></td>
                        </tr>
                        <tr>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $gameinfo['awayteamid'];?>/" target="_blank">
                                    <?php echo $gameinfo['awayshortname'];?>
                                </a>
                            </td>
                            <td><?php echo $history_stats['away']['win_rate'];?></td>
                            <td><?php echo $history_stats['away']['equal_rate'];?></td>
                            <td><?php echo $history_stats['away']['lose_rate'];?></td>
                            <td><?php echo $history_stats['away']['home_win_rate'];?></td>
                            <td><?php echo $history_stats['away']['home_equal_rate'];?></td>
                            <td><?php echo $history_stats['away']['home_lose_rate'];?></td>
                            <td><?php echo $history_stats['away']['neutral_win_rate'];?></td>
                            <td><?php echo $history_stats['away']['neutral_equal_rate'];?></td>
                            <td><?php echo $history_stats['away']['neutral_lose_rate'];?></td>
                            <td><?php echo $history_stats['away']['away_win_rate'];?></td>
                            <td><?php echo $history_stats['away']['away_equal_rate'];?></td>
                            <td><?php echo $history_stats['away']['away_lose_rate'];?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- 进球数统计 -->
            <div class="score-item" id="jinqiu">
                <h1 class="score-item-title">进球数统计</h1>

                <div class="score-item-hd">
                    <b class="team-label"><?php echo $gameinfo['homeshortname'];?></b>
                </div>

                <div class="score-item-bd">
                    <table class="table bigTable">
                        <thead>
                            <tr>
                                <th class="border">&nbsp;</th>
                                <th>净胜2+</th>
                                <th>净胜1</th>
                                <th>平</th>
                                <th>净负1</th>
                                <th class="border">净负2+</th>
                                <th>进球数0</th>
                                <th>进球数1</th>
                                <th>进球数2</th>
                                <th>进球数3+</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1?>
                            <?php $n=1; if(is_array($team_stats['home']['goal'])) foreach($team_stats['home']['goal'] AS $name => $list) { ?>
                            <tr <?php if($index % 2) { ?>class="gray"<?php } ?>>
                                <td rowspan="2" class="border tdIndex"><?php echo L($name, '', ROUTE_M);?></td>
                                <?php $n=1;if(is_array($list['number'])) foreach($list['number'] AS $number) { ?>
                                <td><?php echo $number;?></td>
                                <?php $n++;}unset($n); ?>
                            </tr>
                            <tr <?php if($index % 2) { ?>class="gray"<?php } ?>>
                                <?php $n=1;if(is_array($list['rate'])) foreach($list['rate'] AS $rate) { ?>
                                <td><?php echo $rate;?></td>
                                <?php $n++;}unset($n); ?>
                            </tr>
                            <?php $index++?>
                            <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                </div>

                <div class="score-item-hd">
                    <b class="team-label"><?php echo $gameinfo['awayshortname'];?></b>
                </div>

                <div class="score-item-bd">
                    <table class="table bigTable">
                        <thead>
                            <tr>
                                <th class="border">&nbsp;</th>
                                <th>净胜2+</th>
                                <th>净胜1</th>
                                <th>平</th>
                                <th>净负1</th>
                                <th class="border">净负2+</th>
                                <th>进球数0</th>
                                <th>进球数1</th>
                                <th>进球数2</th>
                                <th>进球数3+</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1?>
                            <?php $n=1; if(is_array($team_stats['away']['goal'])) foreach($team_stats['away']['goal'] AS $name => $list) { ?>
                            <tr <?php if($index % 2) { ?>class="gray"<?php } ?>>
                            <td rowspan="2" class="border tdIndex"><?php echo L($name, '', ROUTE_M);?></td>
                            <?php $n=1;if(is_array($list['number'])) foreach($list['number'] AS $number) { ?>
                            <td><?php echo $number;?></td>
                            <?php $n++;}unset($n); ?>
                            </tr>
                            <tr <?php if($index % 2) { ?>class="gray"<?php } ?>>
                            <?php $n=1;if(is_array($list['rate'])) foreach($list['rate'] AS $rate) { ?>
                            <td><?php echo $rate;?></td>
                            <?php $n++;}unset($n); ?>
                            </tr>
                            <?php $index++?>
                            <?php $n++;}unset($n); ?>
                        </tbody>   
                    </table>
                </div>

                <div class="score-item-hd">
                    <b class="team-label">进球数、单双统计(场数)对比</b>
                </div>

                <div class="score-item-bd pdB20">
                    <table class="table">
                        <tr>
                            <th class="border">球队</th>
                            <th>0-1球</th>
                            <th>2-3球</th>
                            <th>4-6球</th>
                            <th>7球或以上</th>
                            <th>单数</th>
                            <th>双数</th>
                        </tr>
                        <tr>
                            <td class="border"><?php echo $gameinfo['homeshortname'];?></td>
                            <?php $n=1;if(is_array($team_stats['home']['total_goal'])) foreach($team_stats['home']['total_goal'] AS $value) { ?>
                            <td><?php echo $value;?></td>
                            <?php $n++;}unset($n); ?>
                        </tr>
                        <tr>
                            <td class="border"><?php echo $gameinfo['awayshortname'];?></td>
                            <?php $n=1;if(is_array($team_stats['away']['total_goal'])) foreach($team_stats['away']['total_goal'] AS $value) { ?>
                            <td><?php echo $value;?></td>
                            <?php $n++;}unset($n); ?>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- 以往盘路 -->
            <div class="score-item" id="yiwangpanlu">
                <h1 class="score-item-title">以往盘路(场数)</h1>

                <div class="score-item-hd">
                    <b class="team-label"><?php echo $gameinfo['homeshortname'];?></b>
                </div>

                <div class="score-item-bd">
                    <table class="table bigTable">
                        <thead>
                            <tr>
                                <th class="border"></th>
                                <th>上盘赢</th>
                                <th>上盘赢</th>
                                <th class="border">上盘赢</th>
                                <th>下盘赢</th>
                                <th>下盘赢</th>
                                <th class="border">下盘赢</th>
                                <th>平盘赢</th>
                                <th>平盘赢</th>
                                <th>平盘赢</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1?>
                            <?php $n=1; if(is_array($team_stats['home']['odds'])) foreach($team_stats['home']['odds'] AS $name => $list) { ?>
                            <tr <?php if($index % 2) { ?>class="gray"<?php } ?>>
                                <td rowspan="2" class="border tdIndex"><?php echo L($name, '', ROUTE_M);?></td>
                                <?php $n=1;if(is_array($list['number'])) foreach($list['number'] AS $number) { ?>
                                <td><?php echo $number;?></td>
                                <?php $n++;}unset($n); ?>
                            </tr>
                            <tr <?php if($index % 2) { ?>class="gray"<?php } ?>>
                                <?php $n=1;if(is_array($list['rate'])) foreach($list['rate'] AS $rate) { ?>
                                <td><?php echo $rate;?></td>
                                <?php $n++;}unset($n); ?>
                            </tr>
                            <?php $index++?>
                            <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                </div>

                <div class="score-item-hd">
                    <b class="team-label"><?php echo $gameinfo['awayshortname'];?></b>
                </div>

                <div class="score-item-bd pdB20">
                    <table class="table bigTable">
                        <thead>
                            <tr>
                                <th class="border"></th>
                                <th>上盘赢</th>
                                <th>上盘赢</th>
                                <th class="border">上盘赢</th>
                                <th>下盘赢</th>
                                <th>下盘赢</th>
                                <th class="border">下盘赢</th>
                                <th>平盘赢</th>
                                <th>平盘赢</th>
                                <th>平盘赢</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1?>
                            <?php $n=1; if(is_array($team_stats['away']['odds'])) foreach($team_stats['away']['odds'] AS $name => $list) { ?>
                            <tr <?php if($index % 2) { ?>class="gray"<?php } ?>>
                            <td rowspan="2" class="border tdIndex"><?php echo L($name, '', ROUTE_M);?></td>
                            <?php $n=1;if(is_array($list['number'])) foreach($list['number'] AS $number) { ?>
                            <td><?php echo $number;?></td>
                            <?php $n++;}unset($n); ?>
                            </tr>
                            <tr <?php if($index % 2) { ?>class="gray"<?php } ?>>
                            <?php $n=1;if(is_array($list['rate'])) foreach($list['rate'] AS $rate) { ?>
                            <td><?php echo $rate;?></td>
                            <?php $n++;}unset($n); ?>
                            </tr>
                            <?php $index++?>
                            <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 未来赛程 -->
            <div class="score-item" id="weilai">
                <h1 class="score-item-title">未来赛程</h1>

                <div class="score-item-hd row">
                    <div class="col-md-6">
                        <b class="team-label"><?php echo $gameinfo['homeshortname'];?></b>

                        <div class="dropdown">
                            <button class="btn btn-default" id="fixture-home-size" data-toggle="dropdown">
                                场次
                                <i class="icon-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="fixture-home-size">
                                <ul data-action="size-filter" data-target="fixture-home-table">
                                    <?php $n=1;if(is_array($size_list)) foreach($size_list AS $size) { ?>
                                    <li data-value="<?php echo $size;?>"><?php echo $size;?></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <b class="team-label"><?php echo $gameinfo['awayshortname'];?></b>

                        <div class="dropdown">
                            <button class="btn btn-default" id="fixture-away-size" data-toggle="dropdown">
                                场次
                                <i class="icon-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="fixture-away-size">
                                <ul data-action="size-filter" data-target="fixture-away-table">
                                    <?php $n=1;if(is_array($size_list)) foreach($size_list AS $size) { ?>
                                    <li data-value="<?php echo $size;?>"><?php echo $size;?></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="score-item-bd row">
                    <div class="col-lg-6" style="padding-right: 0;">
                        <table class="table" id="fixture-home-table" data-action="stats">
                            <tr>
                                <th class="border">时间</th>
                                <th class="border" width="118">赛事</th>
                                <th class="" width="260">对阵</th>
                            </tr>
                            <?php $n=1;if(is_array($team_fixture['home'])) foreach($team_fixture['home'] AS $data) { ?>
                            <tr>
                                <td class="border">
                                    <time><?php echo $data['date'];?></time>
                                </td>
                                <td class="border">
                                    <a href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/" target="_blank">
                                        <?php echo $data['competition_name'];?>
                                    </a>
                                </td>
                                <td class="">
                                    <span class="pair-team">
                                        <a href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                            <?php echo $data['homename'];?>
                                        </a>
                                    </span>
                                    -
                                    <span class="pair-team">
                                        <a href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/" target="_blank">
                                            <?php echo $data['awayname'];?>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <?php $n++;}unset($n); ?>
                        </table>
                    </div>
                    <div class="col-lg-6" style="padding-left: 0;">
                        <table class="table" id="fixture-away-table" data-action="stats">
                            <tr>
                                <th class="border">时间</th>
                                <th class="border" width="118">赛事</th>
                                <th class="border" width="260">对阵</th>
                            </tr>
                            <?php $n=1;if(is_array($team_fixture['away'])) foreach($team_fixture['away'] AS $data) { ?>
                            <tr>
                                <td class="border">
                                    <time><?php echo $data['date'];?></time>
                                </td>
                                <td class="border">
                                    <a href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/" target="_blank">
                                        <?php echo $data['competition_name'];?>
                                    </a>
                                </td>
                                <td class="border">
                                    <span class="pair-team">
                                        <a href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                            <?php echo $data['homename'];?>
                                        </a>
                                    </span>
                                    -
                                    <span class="pair-team">
                                        <a href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/" target="_blank">
                                            <?php echo $data['awayname'];?>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <?php $n++;}unset($n); ?>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 出场阵容/预测阵容 -->
            <div class="score-item" id="zhenrong">
                <h1 class="score-item-title">出场阵容/阵容预测</h1>

                <div class="score-item-hd row">
                    <div class="col-md-6">
                        <b class="team-label"><?php echo $gameinfo['homeshortname'];?></b>
                    </div>

                    <div class="col-md-6">
                        <b class="team-label"><?php echo $gameinfo['awayshortname'];?></b>
                    </div>
                </div>

                <div class="score-item-bd">
                    <table class="table">
                        <tr>
                            <th class="border" colspan="3">守门员</th>
                            <th colspan="3">守门员</th>
                        </tr>
                        <tr>
                            <td class="border" colspan="3">
                                <?php $n=1;if(is_array($lineup['home'][0])) foreach($lineup['home'][0] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>player/<?php echo $r['Id'];?>/" target="_blank" class="status-<?php echo $r['Status'];?>">
                                    <?php echo $r['ShitNo'];?><?php echo $r['Name'];?>
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td colspan="3">
                                <?php $n=1;if(is_array($lineup['away'][0])) foreach($lineup['away'][0] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>player/<?php echo $r['Id'];?>/" target="_blank" class="status-<?php echo $r['Status'];?>">
                                    <?php echo $r['ShitNo'];?><?php echo $r['Name'];?>
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="border">前锋</td>
                            <td class="border">中场</td>
                            <td class="border">后卫</td>
                            <td class="border">前锋</td>
                            <td class="border">中场</td>
                            <td>后卫</td>
                        </tr>
                        <tr>
                            <td>
                                <?php $n=1;if(is_array($lineup['home'][3])) foreach($lineup['home'][3] AS $r) { ?>
                                <div class="height30">
                                    <a href="<?php echo APP_PATH;?>player/<?php echo $r['Id'];?>/" target="_blank" class="status-<?php echo $r['Status'];?>">
                                        <?php echo $r['ShitNo'];?><?php echo $r['Name'];?>
                                    </a>
                                </div>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td>
                                <?php $n=1;if(is_array($lineup['home'][2])) foreach($lineup['home'][2] AS $r) { ?>
                                <div class="height30">
                                    <a href="<?php echo APP_PATH;?>player/<?php echo $r['Id'];?>/" target="_blank" class="status-<?php echo $r['Status'];?>">
                                        <?php echo $r['ShitNo'];?><?php echo $r['Name'];?>
                                    </a>
                                </div>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td>
                                <?php $n=1;if(is_array($lineup['home'][1])) foreach($lineup['home'][1] AS $r) { ?>
                                <div class="height30">
                                    <a href="<?php echo APP_PATH;?>player/<?php echo $r['Id'];?>/" target="_blank" class="status-<?php echo $r['Status'];?>">
                                        <?php echo $r['ShitNo'];?><?php echo $r['Name'];?>
                                    </a>
                                </div>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td>
                                <?php $n=1;if(is_array($lineup['away'][3])) foreach($lineup['away'][3] AS $r) { ?>
                                <div class="height30">
                                    <a href="<?php echo APP_PATH;?>player/<?php echo $r['Id'];?>/" target="_blank" class="status-<?php echo $r['Status'];?>">
                                        <?php echo $r['ShitNo'];?><?php echo $r['Name'];?>
                                    </a>
                                </div>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td>
                                <?php $n=1;if(is_array($lineup['away'][2])) foreach($lineup['away'][2] AS $r) { ?>
                                <div class="height30">
                                    <a href="<?php echo APP_PATH;?>player/<?php echo $r['Id'];?>/" target="_blank" class="status-<?php echo $r['Status'];?>">
                                        <?php echo $r['ShitNo'];?><?php echo $r['Name'];?>
                                    </a>
                                </div>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td>
                                <?php $n=1;if(is_array($lineup['away'][1])) foreach($lineup['away'][1] AS $r) { ?>
                                <div class="height30">
                                    <a href="<?php echo APP_PATH;?>player/<?php echo $r['Id'];?>/" target="_blank" class="status-<?php echo $r['Status'];?>">
                                        <?php echo $r['ShitNo'];?><?php echo $r['Name'];?>
                                    </a>
                                </div>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">首发球员平均年龄：<?php echo $team_age[$gameinfo['hometeamid']]['playerageavg'];?></td>
                            <td colspan="3">首发球员平均年龄：<?php echo $team_age[$gameinfo['awayteamid']]['playerageavg'];?></td>
                        </tr>
                    </table>

                    <div class="hint pdB10 pdT10">
                        <span class="red">红色：首发球员</span>
                        <span class="orange">橙色：后备球员</span>
                        <span class="black">黑色：停赛球员</span>
                        <span class="gray">灰色：伤病球员</span>
                        <span class="green">绿色：其它原因缺赛球员</span>
                    </div>
                </div>
            </div>

            <!-- 盘路 -->
            <div class="score-item" id="panlu">
                <h1 class="score-item-title">盘路</h1>

                <div class="score-item-hd">
                    <b class="team-label">盘路走势</b>

                    <div class="dropdown">
                        <button class="btn btn-default" data-action="tab" data-target="plate-total">
                            总场数
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" data-action="tab" data-target="plate-home">
                            主场
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" data-action="tab" data-target="plate-away">
                            客场
                        </button>
                    </div>

                </div>

                <div class="score-item-bd tab-item active" id="plate-total">
                    <table class="table">
                        <tr>
                            <th class="border">系列</th>
                            <th class="border" width="140">球队</th>
                            <th class="border">总赛</th>
                            <th class="border">开盘</th>
                            <th class="border">上盘</th>
                            <th class="border">赢盘</th>
                            <th class="border">走水</th>
                            <th class="border">输盘</th>
                            <th class="border">净盘</th>
                            <th class="border">赢盘率</th>
                            <th>最近八场盘路情况右边为最新一场</th>

                        </tr>
                        <?php $n=1; if(is_array($oddsway_info['total'])) foreach($oddsway_info['total'] AS $key => $r) { ?>
                        <?php $key++?>
                        <tr>
                            <td class="border"><?php echo $key;?></td>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['teamid'];?>/" target="_blank">
                                    <?php echo $r['teamname'];?>
                                </a>
                            </td>
                            <td class="border"><?php echo $r['total'];?></td>
                            <td class="border"><?php echo $r['open'];?></td>
                            <td class="border"><?php echo $r['up'];?></td>
                            <td class="border"><?php echo $r['win'];?></td>
                            <td class="border"><?php echo $r['draw'];?></td>
                            <td class="border"><?php echo $r['lose'];?></td>
                            <td class="border"><?php echo $r['winlose'];?></td>
                            <td class="border"><?php echo $r['winrate'];?>%</td>
                            <td class="border">
                                <?php $n=1;if(is_array(array_reverse($recent_info[$r['teamid']]))) foreach(array_reverse($recent_info[$r['teamid']]) AS $row) { ?>
                                <span class="result <?php echo $row['0'];?>"><?php echo str_cut(L($row[0]),3,'');?></span>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>

                <div class="score-item-bd tab-item" id="plate-home">
                    <table class="table">
                        <tr>
                            <th class="border">系列</th>
                            <th class="border" width="140">球队</th>
                            <th class="border">总赛</th>
                            <th class="border">开盘</th>
                            <th class="border">上盘</th>
                            <th class="border">赢盘</th>
                            <th class="border">走水</th>
                            <th class="border">输盘</th>
                            <th class="border">净盘</th>
                            <th class="border">赢盘率</th>
                            <th>最近八场盘路情况右边为最新一场</th>

                        </tr>
                        <?php $n=1; if(is_array($oddsway_info['home'])) foreach($oddsway_info['home'] AS $key => $r) { ?>
                        <?php $key++?>
                        <tr>
                            <td class="border"><?php echo $key;?></td>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['teamid'];?>/" target="_blank">
                                    <?php echo $r['teamname'];?>
                                </a>
                            </td>
                            <td class="border"><?php echo $r['total'];?></td>
                            <td class="border"><?php echo $r['open'];?></td>
                            <td class="border"><?php echo $r['up'];?></td>
                            <td class="border"><?php echo $r['win'];?></td>
                            <td class="border"><?php echo $r['draw'];?></td>
                            <td class="border"><?php echo $r['lose'];?></td>
                            <td class="border"><?php echo $r['winlose'];?></td>
                            <td class="border"><?php echo $r['winrate'];?>%</td>
                            <td class="border">
                                <?php $n=1;if(is_array(array_reverse($recent_info[$r['teamid']]))) foreach(array_reverse($recent_info[$r['teamid']]) AS $row) { ?>
                                <span class="result <?php echo $row['0'];?>"><?php echo str_cut(L($row[0]),3,'');?></span>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>

                <div class="score-item-bd tab-item" id="plate-away">
                    <table class="table">
                        <tr>
                            <th class="border">系列</th>
                            <th class="border" width="140">球队</th>
                            <th class="border">总赛</th>
                            <th class="border">开盘</th>
                            <th class="border">上盘</th>
                            <th class="border">赢盘</th>
                            <th class="border">走水</th>
                            <th class="border">输盘</th>
                            <th class="border">净盘</th>
                            <th class="border">赢盘率</th>
                            <th>最近八场盘路情况右边为最新一场</th>

                        </tr>
                        <?php $n=1; if(is_array($oddsway_info['away'])) foreach($oddsway_info['away'] AS $key => $r) { ?>
                        <?php $key++?>
                        <tr>
                            <td class="border"><?php echo $key;?></td>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['teamid'];?>/" target="_blank">
                                    <?php echo $r['teamname'];?>
                                </a>
                            </td>
                            <td class="border"><?php echo $r['total'];?></td>
                            <td class="border"><?php echo $r['open'];?></td>
                            <td class="border"><?php echo $r['up'];?></td>
                            <td class="border"><?php echo $r['win'];?></td>
                            <td class="border"><?php echo $r['draw'];?></td>
                            <td class="border"><?php echo $r['lose'];?></td>
                            <td class="border"><?php echo $r['winlose'];?></td>
                            <td class="border"><?php echo $r['winrate'];?>%</td>
                            <td class="border">
                                <?php $n=1;if(is_array(array_reverse($recent_info[$r['teamid']]))) foreach(array_reverse($recent_info[$r['teamid']]) AS $row) { ?>
                                <span class="result <?php echo $row['0'];?>"><?php echo str_cut(L($row[0]),3,'');?></span>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>

                <div class="score-item-hd">
                    <b class="team-label">盘路数据统计</b>

                </div>
                
                <div class="score-item-bd">
                    <table class="table">
                        <tr>
                            <th width="145" class="border">主场赢盘</th>
                            <th class="border"><?php echo $oddsway_stats['home_win'];?></th>
                            <th width="45"><?php echo $oddsway_stats['home_win_rate'];?></th>
                        </tr>
                        <tr>
                            <td class="border">和局走水</td>
                            <td class="border"><?php echo $oddsway_stats['draw'];?></td>
                            <td><?php echo $oddsway_stats['draw_rate'];?></td>
                        </tr>
                        <tr>
                            <td class="border">客场赢盘</td>
                            <td class="border"><?php echo $oddsway_stats['away_win'];?></td>
                            <td><?php echo $oddsway_stats['away_win_rate'];?></td>
                        </tr>
                        <tr>
                            <td class="border">赢盘<sapn class="orange">最多</sapn>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_win['total'])) foreach($best_win['total'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php echo $best_win_rate['total'];?></td>
                        </tr>
                        <tr>
                            <td class="border">赢盘<sapn class="green">最少</sapn>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_win['total'])) foreach($weak_win['total'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php echo $weak_win_rate['total'];?></td>
                        </tr>
                        <tr>
                            <td class="border">主场赢盘<sapn class="orange">最多</sapn>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_win['home'])) foreach($best_win['home'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php echo $best_win_rate['home'];?></td>
                        </tr>
                        <tr>
                            <td class="border">主场赢盘<sapn class="green">最少</sapn>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_win['home'])) foreach($weak_win['home'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php echo $weak_win_rate['home'];?></td>
                        </tr>
                        <tr>
                            <td class="border">客场赢盘<sapn class="orange">最多</sapn>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_win['away'])) foreach($best_win['away'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php echo $best_win_rate['away'];?></td>
                        </tr>
                        <tr>
                            <td class="border">客场赢盘<sapn class="green">最少</sapn>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_win['away'])) foreach($weak_win['away'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php echo $weak_win_rate['away'];?></td>
                        </tr>
                        <tr>
                            <td class="border">走水<span class="orange">最多</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_draw)) foreach($best_draw AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php echo $max_draw_rate;?></td>
                        </tr>
                    </table>

                    <div class="hint pdB10 pdT10">
                        盘路统计最后更新：<?php echo $oddsway_last_update_time['update_time'];?>
                    </div>
                </div>
            </div>

             <!-- 积分 -->
            <div class="score-item" id="jifen">
                <h1 class="score-item-title">积分</h1>

                <div class="score-item-hd">
                    <b class="team-label">积分榜</b>

                    <div class="dropdown">
                        <button class="btn btn-default" data-action="tab" data-target="score-total">
                            总场数
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" data-action="tab" data-target="score-home">
                            主场
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" data-action="tab" data-target="score-away">
                            客场
                        </button>
                    </div>

                </div>

                <div class="score-item-bd tab-item active" id="score-total">
                    <table class="table">
                        <tr>
                            <th class="border">排名</th>
                            <th class="border" width="300">球队</th>
                            <th class="border">赛</th>
                            <th class="border">胜</th>
                            <th class="border">平</th>
                            <th class="border">负</th>
                            <th class="border">得</th>
                            <th class="border">失</th>
                            <th class="border">积分</th>
                            <th class="border">备注</th>

                        </tr>
                        <?php $n=1;if(is_array($standings_info['total'])) foreach($standings_info['total'] AS $r) { ?>
                        <tr>
                            <td class="border">
                                <?php echo $n;?>
                            </td>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['teamid'];?>/" target="_blank">
                                    <?php echo $r['teamname'];?>
                                </a>
                            </td>
                            <td class="border"><?php echo $r['total'];?></td>
                            <td class="border"><?php echo $r['win'];?></td>
                            <td class="border"><?php echo $r['draw'];?></td>
                            <td class="border"><?php echo $r['lose'];?></td>
                            <td class="border"><?php echo $r['goal'];?></td>
                            <td class="border"><?php echo $r['nongoal'];?></td>
                            <td class="border"><?php echo $r['score'];?></td>
                            <td class="border"><?php echo $r['note'];?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>

                <div class="score-item-bd tab-item" id="score-home">
                    <table class="table">
                        <tr>
                            <th class="border">排名</th>
                            <th class="border" width="300">球队</th>
                            <th class="border">赛</th>
                            <th class="border">胜</th>
                            <th class="border">平</th>
                            <th class="border">负</th>
                            <th class="border">得</th>
                            <th class="border">失</th>
                            <th class="border">积分</th>
                            <th class="border">备注</th>

                        </tr>
                        <?php $n=1;if(is_array($standings_info['home'])) foreach($standings_info['home'] AS $r) { ?>
                        <tr>
                            <td class="border">
                                <?php echo $n;?>
                            </td>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['teamid'];?>/" target="_blank">
                                    <?php echo $r['teamname'];?>
                                </a>
                            </td>
                            <td class="border"><?php echo $r['total'];?></td>
                            <td class="border"><?php echo $r['win'];?></td>
                            <td class="border"><?php echo $r['draw'];?></td>
                            <td class="border"><?php echo $r['lose'];?></td>
                            <td class="border"><?php echo $r['goal'];?></td>
                            <td class="border"><?php echo $r['nongoal'];?></td>
                            <td class="border"><?php echo $r['score'];?></td>
                            <td class="border"><?php echo $r['note'];?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>

                <div class="score-item-bd tab-item" id="score-away">
                    <table class="table">
                        <tr>
                            <th class="border">排名</th>
                            <th class="border" width="300">球队</th>
                            <th class="border">赛</th>
                            <th class="border">胜</th>
                            <th class="border">平</th>
                            <th class="border">负</th>
                            <th class="border">得</th>
                            <th class="border">失</th>
                            <th class="border">积分</th>
                            <th class="border">备注</th>

                        </tr>
                        <?php $n=1;if(is_array($standings_info['away'])) foreach($standings_info['away'] AS $r) { ?>
                        <tr>
                            <td class="border">
                                <?php echo $n;?>
                            </td>
                            <td class="border">
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['teamid'];?>/" target="_blank">
                                    <?php echo $r['teamname'];?>
                                </a>
                            </td>
                            <td class="border"><?php echo $r['total'];?></td>
                            <td class="border"><?php echo $r['win'];?></td>
                            <td class="border"><?php echo $r['draw'];?></td>
                            <td class="border"><?php echo $r['lose'];?></td>
                            <td class="border"><?php echo $r['goal'];?></td>
                            <td class="border"><?php echo $r['nongoal'];?></td>
                            <td class="border"><?php echo $r['score'];?></td>
                            <td class="border"><?php echo $r['note'];?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                    </table>
                </div>

                <div class="score-item-hd">
                    <b class="team-label">最新积分表数据统计</b>

                </div>
                
                <div class="score-item-bd">
                    <table class="table">
                        <tr>
                            <th width="145" class="border">已比赛之赛事</th>
                            <th class="border"><?php echo $has_start_game;?></th>
                            <th width=""><?php echo $has_start_game_rate;?></th>
                        </tr>
                        <tr>
                            <td class="border">未比赛之赛事</td>
                            <td class="border"><?php echo $ready_game;?></td>
                            <td><?php echo $ready_game_rate;?></td>
                        </tr>
                        <tr>
                            <td class="border">主场胜出</td>
                            <td class="border"><?php echo $standings_stats['home_win'];?></td>
                            <td><?php echo $standings_stats['home_win_rate'];?></td>
                        </tr>
                        <tr>
                            <td class="border">平局</td>
                            <td class="border"><?php echo $standings_stats['draw'];?></td>
                            <td><?php echo $standings_stats['draw_rate'];?></td>
                        </tr>
                        <tr>
                            <td class="border">客场胜出</td>
                            <td class="border"><?php echo $standings_stats['away_win'];?></td>
                            <td><?php echo $standings_stats['away_win_rate'];?></td>
                        </tr>
                        <tr>
                            <td class="border">总进球数</td>
                            <td class="border"><?php echo $standings_stats['total_goal'];?></td>
                            <td><?php if(isset($standings_stats['total_goal_per'])) { ?>平均每场<?php echo $standings_stats['total_goal_per'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">主场进球数</td>
                            <td class="border"><?php echo $standings_stats['home_goal'];?></td>
                            <td><?php if(isset($standings_stats['home_goal_per'])) { ?>平均每场<?php echo $standings_stats['home_goal_per'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">客场进球数</td>
                            <td class="border"><?php echo $standings_stats['away_goal'];?></td>
                            <td><?php if(isset($standings_stats['away_goal_per'])) { ?>平均每场<?php echo $standings_stats['away_goal_per'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">攻击力<sapn class="orange">最佳</sapn>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_attack['total'])) foreach($best_attack['total'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($max_goal['total'])) { ?><?php echo $max_goal['total'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">主场攻击力<span class="orange">最佳</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_attack['home'])) foreach($best_attack['home'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($max_goal['home'])) { ?><?php echo $max_goal['home'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">客场攻击力<span class="orange">最佳</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_attack['away'])) foreach($best_attack['away'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($max_goal['away'])) { ?><?php echo $max_goal['away'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">攻击力<span class="green">最差</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_attack['total'])) foreach($weak_attack['total'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($min_goal['total'])) { ?><?php echo $min_goal['total'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">主场攻击力<span class="green">最差</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_attack['home'])) foreach($weak_attack['home'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($min_goal['home'])) { ?><?php echo $min_goal['home'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">客场攻击力<span class="green">最差</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_attack['away'])) foreach($weak_attack['away'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($min_goal['away'])) { ?><?php echo $min_goal['away'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">防守<sapn class="orange">最佳</sapn>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_defence['total'])) foreach($best_defence['total'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($min_nongoal['total'])) { ?><?php echo $min_nongoal['total'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">主场防守<span class="orange">最佳</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_defence['home'])) foreach($best_defence['home'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($min_nongoal['home'])) { ?><?php echo $min_nongoal['home'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">客场防守<span class="orange">最佳</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($best_defence['away'])) foreach($best_defence['away'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($min_nongoal['away'])) { ?><?php echo $min_nongoal['away'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">防守<span class="green">最差</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_defence['total'])) foreach($weak_defence['total'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($max_nongoal['total'])) { ?><?php echo $max_nongoal['total'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">主场防守<span class="green">最差</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_defence['home'])) foreach($weak_defence['home'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($max_nongoal['home'])) { ?><?php echo $max_nongoal['home'];?>球<?php } ?></td>
                        </tr>
                        <tr>
                            <td class="border">客场防守<span class="green">最差</span>球队</td>
                            <td class="border">
                                <?php $n=1;if(is_array($weak_defence['away'])) foreach($weak_defence['away'] AS $r) { ?>
                                <a href="<?php echo APP_PATH;?>team/<?php echo $r['id'];?>/" target="_blank">
                                    <?php echo $r['name'];?>&nbsp;&nbsp;
                                </a>
                                <?php $n++;}unset($n); ?>
                            </td>
                            <td><?php if(isset($max_nongoal['away'])) { ?><?php echo $max_nongoal['away'];?>球<?php } ?></td>
                        </tr>
                    </table>

                    <div class="hint pdB10 pdT10">
                        盘路统计最后更新：<?php echo $standings_last_update_time['update_time'];?>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>
<!-- main body -->
<!-- js -->
<script>
    var APP_PATH = '<?php echo APP_PATH;?>';
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>

<?php $js = ['ft_game_analyse.js','ft_game_analyse_.js','imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js'];?>
<?php include template('content', 'footer'); ?>