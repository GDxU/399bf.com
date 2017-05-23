<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('ft_live_game.css');?>
<?php $nav_id = 3?>
<?php include template('content', 'header_score'); ?>
<nav>
    <div class="container">
        <div class="row">
            <div class="bt-nav">
                <div class="inline-alink">
                    <a href="<?php echo APP_PATH;?>zqscore/" class="btn btn-alink active">即时</a>
                    <a href="<?php echo APP_PATH;?>zqwanchang/" class="btn btn-alink">完场</a>
                    <a href="<?php echo APP_PATH;?>zqsaicheng/" class="btn btn-alink">下日</a>
                </div>
                <div class="inline-btn" id="selectControl">
                    <button class="btn btn-control" name="save">保留选中</button>
                    <button class="btn btn-control" name="del">删除选中</button>
                    <button class="btn btn-control" name="restore">显示全部</button>
                </div>
                <div class="inline-droup">
                    <div class="dropdown" style="display: inline-block">
                        <button class="btn btn-control" data-toggle="modal" data-target="#give-modal">
                            选择盘口
                            <i class="icon-angle-down"></i>
                        </button>
                    </div>
                    <div class="dropdown" style="display: inline-block">
                        <button id="company-list" class="btn btn-control dropdown-toggle" data-toggle="dropdown">
                            选择公司
                            <i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="company-list">
                            <?php $n=1;if(is_array($companies)) foreach($companies AS $c) { ?>
                            <li>
                                <a href="javascript:;" data-id="<?php echo $c['companyid'];?>" data-action="company"><?php echo $c['companyname'];?></a>
                            </li>
                            <?php $n++;}unset($n); ?>
                        </ul>
                    </div>
                    <div class="dropdown" style="display: inline-block">
                        <button class="btn btn-control" data-toggle="modal" data-target="#game-modal">
                            选择赛事
                            <i class="icon-angle-down"></i>
                        </button>
                    </div>
                </div>
                <div class="btn-group" id="cpi-group">
                    <label for="ou" class="btn">
                        <input id="ou" type="checkbox" checked>
                        <i class="table-checkbox"></i>
                        大
                    </label>
                    <label for="euro" class="btn">
                        <input id="euro" type="checkbox">
                        <i class="table-checkbox"></i>
                        欧
                    </label>
                    <label for="asia" class="btn">
                        <input id="asia" type="checkbox" checked>
                        <i class="table-checkbox"></i>
                        亚
                    </label>
                </div>

                <div class="dropdown fr">
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
                        <li>
                            <a href="javascript:;">
                                <label for="rank-btn" class="cpi-btn">
                                    <input type="checkbox" id="rank-btn" checked>&nbsp;球队排名
                                </label>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <label for="yellow-btn" class="cpi-btn">
                                    <input type="checkbox" id="yellow-btn" checked>&nbsp;显示黄牌
                                </label>
                            </a>
                        </li>
                        <!--<li>-->
                            <!--<a href="javascript:;">-->
                                <!--<label for="showAlertRed_btn" class="cpi-btn">-->
                                    <!--<input type="checkbox" id="showAlertRed_btn" checked>&nbsp;红牌弹窗提示-->
                                <!--</label>-->
                            <!--</a>-->
                        <!--</li>-->
                        <li>
                            <a href="javascript:;">
                                <label for="alert-btn" class="cpi-btn">
                                    <input type="checkbox" id="alert-btn"  checked>&nbsp;进球弹窗提示
                                </label>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<section class="main pdB20">
    <div class="container">
        <div class="row">
            <div class="wrap" id="table-content">
                <!-- table-header  -->
                <div id="table-header" class="table-header">
                    <table class="table">
                        <tr>
                            <td width="50">
                                <button class="checkbox-all">
                                    全选
                                </button>
                            </td>
                            <td width="120">12月13日</td>
                            <td width="50">时间</td>
                            <td width="55">状态</td>
                            <td width="185">主队</td>
                            <td width="50">比分</td>
                            <td width="185">客队</td>
                            <td width="64">角/半</td>
                            <td width="80">S2</td>
                            <td width="">走</td>
                            <td width="80">数据</td>
                            <td width="68">功能</td>
                        </tr>
                    </table>
                </div>
                <!-- table-item -->
                <div class="table-item">
                    <?php if(count($data_list['start'])) { ?>
                    <table class="table" id="start-table">
                        <thead>
                            <tr>
                                <td colspan="12">
                                    <span class="match-tip going">正在进行的比赛</span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($data_list['start'])) foreach($data_list['start'] AS $data) { ?>
                            <tr data-id="tr<?php echo $n;?>" data-run-tag="<?php if($data['isrun']) { ?>true<?php } else { ?>false<?php } ?>" data-competition="<?php echo $data['competitionid'];?>" data-status-id="<?php echo $data['status'];?>" data-start-time="<?php if($data['tstarttime']) { ?><?php echo $data['tstarttime'];?><?php } else { ?><?php echo $data['date'];?><?php } ?>" data-handicap="<?php echo $data['give'];?>" data-game-id="<?php echo $data['gameid'];?>" ajax-status-tag="true" <?php if($data['give']) { ?>ajax-odds-tag="true"<?php } ?>>
                                <td width="50">
                                    <a role="button" class="table-checkbox"></a>
                                </td>
                                <td width="120" class="clearfix">
                                    <div class="pull-left">
                                        <a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/">
                                        <img src="<?php echo PHOTO_PATH;?>competition/<?php echo $data['competitionid'];?>.jpg" class="competition-photo">
                                            </a>
                                    </div>
                                    <div class="pull-right" >
                                        <a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/">
                                            <span style="color:#<?php echo $data['competitioncolor'];?>;font-weight: bold;"><?php echo $data['competitionshortname'];?>|</span></a>
                                    </div>
                                </td>
                                <td width="50"><?php echo date('H:i', $data['date']);?></td>
                                <td width="55">
                                    <?php if(in_array($data['status'], array(1, 3))) { ?>
                                    <!--<img src="<?php echo IMG_PATH;?>icon/timeicon.png" class="status-time">-->
                                        <span class="table-status add" data-key="time">
                                        <?php echo $data['time'];?>
                                        </span>
                                    <!--<img src="<?php echo IMG_PATH;?>icon/point.png" class="status-point">-->
                                    <?php } else { ?>
                                    <span class="table-status" data-key="time">
                                        <?php echo $arr_status[$data['status']];?>
                                    </span>
                                    <?php } ?>
                                </td>
                                <td width="185">
                                    <span class="home-animate"></span>
                                    <span class="num"><?php if(!empty($data['homerank'])) { ?>[<?php echo $data['homerank'];?>]<?php } ?></span>
                                    <span <?php if(!is_null($data['homeyellowcard']) && $data['homeyellowcard'] != 0) { ?>class="yellowcard"<?php } ?> data-key="homeyellowcard" data-style="yellowcard"><?php if($data['homeyellowcard']) { ?><?php echo $data['homeyellowcard'];?><?php } ?></span>
                                    <span <?php if(!is_null($data['homeredcard']) && $data['homeredcard'] != 0) { ?>class="redcard"<?php } ?> data-key="homeredcard" data-style="redcard"><?php if($data['homeredcard']) { ?><?php echo $data['homeredcard'];?><?php } ?></span>
                                    <span class="teamname">
                                        <a target="_blank" title="<?php echo $data['homeshortname'];?>" class="team-link home-link" href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/"><?php echo str_cut($data['homeshortname'], 24, '...');?></a>
                                    </span>
                                </td>
                                <td width="50" class="score">
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/stats/" target="_blank">
                                        <span class="red" data-key="homescore" data-target="home-link" data-role="home" data-animate=".home-animate"><?php echo $data['homescore'];?></span>
                                        -
                                        <span class="red" data-key="awayscore" data-target="away-link" data-role="away" data-animate=".away-animate"><?php echo $data['awayscore'];?></span>
                                    </a>
                                </td>
                                <td width="185">
                                    <span class="teamname">
                                        <a target="_blank" title="<?php echo $data['awayshortname'];?>" class="team-link away-link" href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/"><?php echo str_cut($data['awayshortname'], 24, '...');?></a>
                                    </span>
                                    <span <?php if(!is_null($data['awayredcard']) && $data['awayredcard'] != 0) { ?>class="redcard"<?php } ?> data-key="awayredcard" data-style="redcard"><?php if($data['awayredcard']) { ?><?php echo $data['awayredcard'];?><?php } ?></span>
                                    <span <?php if(!is_null($data['awayyellowcard']) && $data['awayyellowcard'] != 0) { ?>class="yellowcard"<?php } ?> data-key="awayyellowcard" data-style="yellowcard"><?php if($data['awayyellowcard']) { ?><?php echo $data['awayyellowcard'];?><?php } ?></span>
                                    <span class="num"><?php if(!empty($data['awayrank'])) { ?>[<?php echo $data['awayrank'];?>]<?php } ?></span>
                                    <span class="away-animate"></span>
                                </td>
                                <td width="64" class="corner">
                                    <div class="table-line">
                                        <span data-key="homecorner"><?php echo $data['homecorner'];?></span>-<span data-key="awaycorner"><?php echo $data['awaycorner'];?></span>
                                    </div>
                                    <div class="table-line" style="background: none">
                                        <span data-key="half" class="red">
                                        <?php if(isset($data['half'])) { ?><?php echo $data['half'];?><?php } else { ?>-<?php } ?>
                                        </span>
                                    </div>
                                </td>
                                <td width="80" class="table-cpi">
                                    <?php if($data['status'] == 0) { ?>
                                    <div class="table-line" data-name="asia" data-key="handicap" data-first="<?php echo $data['fgive'];?>"><?php if(isset($data['fgive'])) { ?><?php echo get_handicap($data['fgive']);?><?php } ?></div>
                                    <div class="table-line" data-name="ou" data-key="total" data-first="<?php echo $data['ftotal'];?>"><?php echo handicap_ou($data['ftotal']);?></div>
                                    <div class="table-line" data-name="euro" data-key="draw" data-first="<?php echo $data['fdraw'];?>"><?php echo $data['fdraw'];?></div>
                                    <?php } else { ?>
                                    <div class="table-line" data-name="asia" data-key="handicap" data-first="<?php echo $data['give'];?>"><?php if(isset($data['give'])) { ?><?php echo get_handicap($data['give']);?><?php } ?></div>
                                    <div class="table-line" data-name="ou" data-key="total" data-first="<?php echo $data['total'];?>"><?php echo handicap_ou($data['total']);?></div>
                                    <div class="table-line" data-name="euro" data-key="draw" data-first="<?php echo $data['draw'];?>"><?php echo $data['draw'];?></div>
                                    <?php } ?>
                                </td>
                                <td width="">
                                    <?php if($data[isrun] == 1) { ?>
                                    <?php if(in_array($data['status'], array(1,2,3))) { ?>
                                    <span class="runBall is_run zd2" title="正在走地"></span>
                                    <?php } else { ?>
                                    <span class="runBall is_run zd1" title="有走地赛事"></span>
                                    <?php } ?>
                                    <?php } ?>
                                </td>
                                <td width="80">
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/" class="red" target="_blank">析</a>
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsasia/" class="table-link" target="_blank">亚</a>
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsou/" class="table-link" target="_blank">大</a>
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddseuro/" class="table-link" target="_blank">欧</a>
                                </td>
                                <td width="68">
                                    <?php if($data['islive']) { ?>
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/live/" class="table-player" target="_blank" title="直播"></a>
                                    <?php } ?>
                                    <a href="##" class="table-star">
                                        <i class="icon-star-empty icon-large"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
                <!-- table-item -->
                <div class="table-item">
                    <?php if(count($data_list['ready'])) { ?>
                    <table class="table" id="ready-table">
                        <thead>
                        <tr>
                            <td colspan="12">
                                <span class="match-tip future">未开始的比赛</span>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($data_list['ready'])) foreach($data_list['ready'] AS $data) { ?>
                        <tr data-id="tr<?php echo $n;?>" data-run-tag="<?php if($data['isrun']) { ?>true<?php } else { ?>false<?php } ?>" data-competition="<?php echo $data['competitionid'];?>" data-status-id="0" data-start-time="<?php if($data['tstarttime']) { ?><?php echo $data['tstarttime'];?><?php } else { ?><?php echo $data['date'];?><?php } ?>" data-handicap="<?php echo $data['give'];?>" data-game-id="<?php echo $data['gameid'];?>" <?php if($data['give']) { ?>ajax-odds-tag="true"<?php } ?>>
                        <td width="50">
                            <a role="button" class="table-checkbox"></a>
                        </td>
                        <td width="120" class="clearfix">
                            <div class="pull-left">
                                <a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/">
                                <img src="<?php echo PHOTO_PATH;?>competition/<?php echo $data['competitionid'];?>.jpg" class="competition-photo"></a>
                            </div>
                            <div class="pull-right" >
                                <a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/">
                                    <span style="color:#<?php echo $data['competitioncolor'];?>;font-weight: bold;"><?php echo $data['competitionshortname'];?>|</span></a>
                            </div>
                        </td>
                        <td width="50"><?php echo date('H:i', $data['date']);?></td>
                        <td width="55">
                            <?php if(in_array($data['status'], array(1, 3))) { ?>
                            <img src="<?php echo IMG_PATH;?>icon/timeicon.png" class="status-time">
                                        <span class="table-status" data-key="time">
                                        <?php echo $data['time'];?>
                                        </span>
                            <img src="<?php echo IMG_PATH;?>icon/point.png" class="status-point">
                            <?php } else { ?>
                                    <span class="table-status" data-key="time">
                                        <?php echo $arr_status[$data['status']];?>
                                    </span>
                            <?php } ?>
                        </td>
                        <td width="185">
                            <span class="home-animate"></span>
                            <span class="num"><?php if(!empty($data['homerank'])) { ?>[<?php echo $data['homerank'];?>]<?php } ?></span>
                            <span <?php if(!is_null($data['homeyellowcard']) && $data['homeyellowcard'] != 0) { ?>class="yellowcard"<?php } ?> data-key="homeyellowcard" data-style="yellowcard"><?php if($data['homeyellowcard']) { ?><?php echo $data['homeyellowcard'];?><?php } ?></span>
                            <span <?php if(!is_null($data['homeredcard']) && $data['homeredcard'] != 0) { ?>class="redcard"<?php } ?> data-key="homeredcard" data-style="redcard"><?php if($data['homeredcard']) { ?><?php echo $data['homeredcard'];?><?php } ?></span>
                                <span class="teamname">
                                    <a target="_blank" title="<?php echo $data['homeshortname'];?>" class="team-link home-link" href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/"><?php echo str_cut($data['homeshortname'], 24, '...');?></a>
                                </span>
                        </td>
                        <td width="50" class="score">
                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/stats/" target="_blank">
                                <span data-key="homescore" data-target="home-link" data-role="home" data-animate=".home-animate"><?php echo $data['homescore'];?></span>
                                -
                                <span data-key="awayscore" data-target="away-link" data-role="away" data-animate=".away-animate"><?php echo $data['awayscore'];?></span>
                            </a>
                        </td>
                        <td width="185">
                                <span class="teamname">
                                    <a target="_blank" title="<?php echo $data['awayshortname'];?>" class="team-link away-link" href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/"><?php echo str_cut($data['awayshortname'], 24, '...');?></a>
                                </span>
                            <span <?php if(!is_null($data['awayredcard']) && $data['awayredcard'] != 0) { ?>class="red-card"<?php } ?> data-key="awayredcard" data-style="redcard"><?php if($data['awayredcard']) { ?><?php echo $data['awayredcard'];?><?php } ?></span>
                            <span <?php if(!is_null($data['awayyellowcard']) && $data['awayyellowcard'] != 0) { ?>class="yellow-card"<?php } ?> data-key="awayyellowcard" data-style="yellowcard"><?php if($data['awayyellowcard']) { ?><?php echo $data['awayyellowcard'];?><?php } ?></span>
                            <span class="num"><?php if(!empty($data['awayrank'])) { ?>[<?php echo $data['awayrank'];?>]<?php } ?></span>
                            <span class="away-animate"></span>
                        </td>
                        <td width="64" class="corner">
                            <div class="table-line">
                                <span data-key="homecorner"><?php echo $data['homecorner'];?></span>-<span data-key="awaycorner"><?php echo $data['awaycorner'];?></span>
                            </div>
                            <div class="table-line" style="background: none">
                                    <span data-key="half" class="red">
                                    <?php if(isset($data['half'])) { ?><?php echo $data['half'];?><?php } else { ?>-<?php } ?>
                                    </span>
                            </div>
                        </td>
                        <td width="80" class="table-cpi">
                            <?php if($data['status'] == 0) { ?>
                            <div class="table-line" data-name="asia" data-key="handicap" data-first="<?php echo $data['fgive'];?>"><?php if(isset($data['fgive'])) { ?><?php echo get_handicap($data['fgive']);?><?php } ?></div>
                            <div class="table-line" data-name="ou" data-key="total" data-first="<?php echo $data['ftotal'];?>"><?php echo handicap_ou($data['ftotal']);?></div>
                            <div class="table-line" data-name="euro" data-key="draw" data-first="<?php echo $data['fdraw'];?>"><?php echo $data['fdraw'];?></div>
                            <?php } else { ?>
                            <div class="table-line" data-name="asia" data-key="handicap" data-first="<?php echo $data['give'];?>"><?php if(isset($data['give'])) { ?><?php echo get_handicap($data['give']);?><?php } ?></div>
                            <div class="table-line" data-name="ou" data-key="total" data-first="<?php echo $data['total'];?>"><?php echo handicap_ou($data['total']);?></div>
                            <div class="table-line" data-name="euro" data-key="draw" data-first="<?php echo $data['draw'];?>"><?php echo $data['draw'];?></div>
                            <?php } ?>
                        </td>
                        <td width="">
                            <?php if($data[isrun] == 1) { ?>
                            <?php if(in_array($data['status'], array(1,2,3))) { ?>
                            <span class="runBall is_run zd2" title="正在走地"></span>
                            <?php } else { ?>
                            <span class="runBall is_run zd1" title="有走地赛事"></span>
                            <?php } ?>
                            <?php } ?>
                        </td>
                        <td width="80">
                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/" class="red" target="_blank">析</a>
                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsasia/" class="table-link" target="_blank">亚</a>
                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsou/" class="table-link" target="_blank">大</a>
                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddseuro/" class="table-link" target="_blank">欧</a>
                        </td>
                        <td width="68">
                            <?php if($data['islive']) { ?>
                            <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/live/" class="table-player" target="_blank" title="直播"></a>
                            <?php } ?>
                            <a href="##" class="table-star">
                                <i class="icon-star-empty icon-large"></i>
                            </a>
                        </td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
                <!-- table-item -->
                <div class="table-item">
                    <?php if(count($data_list['end'])) { ?>
                    <table class="table" id="end-table">
                        <thead>
                            <tr>
                                <td colspan="12">
                                    <span class="match-tip end">结束的比赛</span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($data_list['end'])) foreach($data_list['end'] AS $data) { ?>
                            <tr data-id="tr<?php echo $n;?>" data-run-tag="<?php if($data['isrun']) { ?>true<?php } else { ?>false<?php } ?>" data-competition="<?php echo $data['competitionid'];?>" data-status-id="<?php echo $data['status'];?>" data-start-time="<?php if($data['tstarttime']) { ?><?php echo $data['tstarttime'];?><?php } else { ?><?php echo $data['date'];?><?php } ?>" data-handicap="<?php echo $data['give'];?>" data-game-id="<?php echo $data['gameid'];?>" <?php if($data['give']) { ?>ajax-odds-tag="true"<?php } ?>>
                            <td width="50">
                                <a role="button" class="table-checkbox"></a>
                            </td>
                            <td width="120" class="clearfix">
                                <div class="pull-left">
                                    <a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/">
                                    <img src="<?php echo PHOTO_PATH;?>competition/<?php echo $data['competitionid'];?>.jpg" class="competition-photo"></a>
                                </div>
                                <div class="pull-right">
                                    <a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $data['competitionid'];?>/schedule/">
                                    <span style="color:#<?php echo $data['competitioncolor'];?>;font-weight: bold;"><?php echo $data['competitionshortname'];?>|</span></a>
                                </div>
                            </td>
                            <td width="50"><?php echo date('H:i', $data['date']);?></td>
                            <td width="55">
                                <?php if(in_array($data['status'], array(1, 3))) { ?>
                                    <img src="<?php echo IMG_PATH;?>icon/timeicon.png" class="status-time">
                                        <span class="table-status" data-key="time">
                                        <?php echo $data['time'];?>
                                        </span>
                                    <img src="<?php echo IMG_PATH;?>icon/point.png" class="status-point">
                                <?php } else { ?>
                                    <span class="table-status" data-key="time">
                                        <?php echo $arr_status[$data['status']];?>
                                    </span>
                                <?php } ?>
                            </td>
                            <td width="185">
                                <span class="num"><?php if(!empty($data['homerank'])) { ?>[<?php echo $data['homerank'];?>]<?php } ?></span>
                                <span <?php if(!is_null($data['homeyellowcard']) && $data['homeyellowcard'] != 0) { ?>class="yellowcard"<?php } ?> data-key="homeyellowcard" data-style="yellowcard"><?php if($data['homeyellowcard']) { ?><?php echo $data['homeyellowcard'];?><?php } ?></span>
                                <span <?php if(!is_null($data['homeredcard']) && $data['homeredcard'] != 0) { ?>class="redcard"<?php } ?> data-key="homeredcard" data-style="redcard"><?php if($data['homeredcard']) { ?><?php echo $data['homeredcard'];?><?php } ?></span>
                                <span class="teamname">
                                    <a target="_blank" title="<?php echo $data['homeshortname'];?>" class="team-link home-link" href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/"><?php echo str_cut($data['homeshortname'], 24, '...');?></a>
                                </span>
                            </td>
                            <td width="50" class="score">
                                <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/stats/" target="_blank">
                                    <span class="red" data-key="homescore" data-target="home-link" data-role="home"><?php echo $data['homescore'];?></span>
                                    -
                                    <span class="red" data-key="awayscore" data-target="away-link" data-role="away"><?php echo $data['awayscore'];?></span>
                                </a>
                            </td>
                            <td width="185">
                                <span class="teamname">
                                    <a target="_blank" title="<?php echo $data['awayshortname'];?>" class="team-link away-link" href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/"><?php echo str_cut($data['awayshortname'], 24, '...');?></a>
                                </span>
                                <span <?php if(!is_null($data['awayredcard']) && $data['awayredcard'] != 0) { ?>class="redcard"<?php } ?> data-key="awayredcard" data-style="redcard"><?php if($data['awayredcard']) { ?><?php echo $data['awayredcard'];?><?php } ?></span>
                                <span <?php if(!is_null($data['awayyellowcard']) && $data['awayyellowcard'] != 0) { ?>class="yellowcard"<?php } ?> data-key="awayyellowcard" data-style="yellowcard"><?php if($data['awayyellowcard']) { ?><?php echo $data['awayyellowcard'];?><?php } ?></span>
                                <span class="num"><?php if(!empty($data['awayrank'])) { ?>[<?php echo $data['awayrank'];?>]<?php } ?></span>
                            </td>
                            <td width="64" class="corner">
                                <div class="table-line">
                                    <span data-key="homecorner"><?php echo $data['homecorner'];?></span>-<span data-key="awaycorner"><?php echo $data['awaycorner'];?></span>
                                </div>
                                <div class="table-line" style="background: none">
                                    <span data-key="half" class="red">
                                    <?php if(isset($data['half'])) { ?><?php echo $data['half'];?><?php } else { ?>-<?php } ?>
                                    </span>
                                </div>
                            </td>
                            <td width="80" class="table-cpi">
                                <?php if($data['status'] == 0) { ?>
                                <div class="table-line" data-name="asia" data-key="handicap" data-first="<?php echo $data['fgive'];?>"><?php if(isset($data['fgive'])) { ?><?php echo get_handicap($data['fgive']);?><?php } ?></div>
                                <div class="table-line" data-name="ou" data-key="total" data-first="<?php echo $data['ftotal'];?>"><?php echo handicap_ou($data['ftotal']);?></div>
                                <div class="table-line" data-name="euro" data-key="draw" data-first="<?php echo $data['fdraw'];?>"><?php echo $data['fdraw'];?></div>
                                <?php } else { ?>
                                <div class="table-line" data-name="asia" data-key="handicap" data-first="<?php echo $data['give'];?>"><?php if(isset($data['give'])) { ?><?php echo get_handicap($data['give']);?><?php } ?></div>
                                <div class="table-line" data-name="ou" data-key="total" data-first="<?php echo $data['total'];?>"><?php echo handicap_ou($data['total']);?></div>
                                <div class="table-line" data-name="euro" data-key="draw" data-first="<?php echo $data['draw'];?>"><?php echo $data['draw'];?></div>
                                <?php } ?>
                            </td>
                            <td width="">
                                <?php if($data[isrun] == 1) { ?>
                                <?php if(in_array($data['status'], array(1,2,3))) { ?>
                                <span class="runBall is_run zd2" title="正在走地"></span>
                                <?php } else { ?>
                                <span class="runBall is_run zd1" title="有走地赛事"></span>
                                <?php } ?>
                                <?php } ?>
                            </td>
                            <td width="80">
                                <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/" class="red" target="_blank">析</a>
                                <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsasia/" class="table-link" target="_blank">亚</a>
                                <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsou/" class="table-link" target="_blank">大</a>
                                <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddseuro/" class="table-link" target="_blank">欧</a>
                            </td>
                            <td width="68">
                                <?php if($data['islive']) { ?>
                                <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/live/" class="table-player" target="_blank" title="直播"></a>
                                <?php } ?>
                                <a href="##" class="table-star">
                                    <i class="icon-star-empty icon-large"></i>
                                </a>
                            </td>
                            </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 图例说明 -->
<section>
    <div class="container">
        <div class="row">
            <div class="table-explain">
                <div class="explain-label">
                    图例说明
                </div>
                <span class="explain-item goal">入球</span>
                <span class="explain-item point">点球</span>
                <span class="explain-item own-goal">乌龙球</span>
                <span class="explain-item yellow-card">黄牌</span>
                <span class="explain-item red-card">红牌</span>
                <span class="explain-item yr-merge">两黄变红</span>
                <span class="explain-item substitute">换人</span>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="give-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">盘口选择</h4>
            </div>
            <div class="modal-body">
                <div class="dioLog-bd clearfix">
                    <?php $n=1;if(is_array($handicap_data)) foreach($handicap_data AS $r) { ?>
                    <div class="col-sm-3">
                        <label>
                            <input type="checkbox" name="handicap[]" data-name="handicap" value="<?php echo $r['give'];?>">
                            <?php echo get_handicap($r[give]);?>[<?php echo $r['count'];?>]
                        </label>
                    </div>
                    <?php $n++;}unset($n); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info checkAll" data-action="check-all" data-target="handicap">全选</button>
                <button type="button" class="btn btn-info clearCheck" data-action="check-clear" data-target="handicap">全不选</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" data-target="handicap" data-action="submit" data-dismiss="modal">确定</button>
            </div>
        </div>
    </div>
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
                    <?php $n=1;if(is_array($competition_data)) foreach($competition_data AS $r) { ?>
                    <div class="col-sm-3">
                        <label>
                            <input type="checkbox" name="competitionid[]" data-name="competition" value="<?php echo $r['competitionid'];?>">
                            <?php echo $r['competitionshortname'];?>[<?php echo $r['count'];?>]
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

<form action="<?php echo APP_PATH;?>zqscore/" method="post" id="search-form">
    <input type="hidden" id="companyid" name="companyid" value="<?php echo $companyid;?>">
    <input type="hidden" id="dosubmit" name="dosubmit" value="true">
</form>

<div class="audioBox hid" style="display: none">
    <audio id="audio">
        <source src="<?php echo JS_PATH;?>audio/1.mp3" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
</div>

<div id="alertBox">

</div>

<!-- js -->
<script>
    var APP_PATH = '<?php echo APP_PATH;?>';
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>

<?php $js = array('ft_live_game.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js','fixed.js');?>
<?php include template('content', 'footer'); ?>