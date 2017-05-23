<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('ft_end_game.css', 'date-plugin.css');?>
<?php $nav_id = 3?>
<?php include template('content', 'header_score'); ?>
<nav>
    <div class="container">
        <div class="row">
            <div class="bt-nav ft-end">
                <div class="inline-alink">
                    <a href="<?php echo APP_PATH;?>zqscore/" class="btn btn-alink">即时</a>
                    <a href="<?php echo APP_PATH;?>zqwanchang/" class="btn btn-alink active">完场</a>
                    <a href="<?php echo APP_PATH;?>zqsaicheng/" class="btn btn-alink">下日</a>
                </div>
                <div class="inline-btn">
                    <buttton class="btn btn-control" data-toggle="modal" data-target="#saishi">
                        选择赛事
                        <i class="icon-angle-down"></i>
                    </buttton>
                </div>

                <button class="btn active" id="reset">完整</button>
                <button class="btn" data-action="competition-filter" data-target="competition" data-id="161">亚洲杯</button>
                <button class="btn" data-action="competition-filter" data-target="competition" data-id="162">美洲杯</button>
                <button class="btn" data-action="competition-filter" data-target="competition" data-id="152">中超</button>
                <button class="btn" data-action="competition-filter" data-target="competition" data-id="92">英超</button>
                <button class="btn" data-action="competition-filter" data-target="competition" data-id="74">欧洲杯</button>
                <button class="btn" data-action="competition-filter" data-target="competition" data-id="141">亚洲预选</button>
            </div>
            <div class="date-nav" id="date-choose">
                <ul class="clearfix">
                    <?php $n=1;if(is_array($arr_date)) foreach($arr_date AS $r) { ?>
                    <li <?php if($r[date] == $date) { ?>class="active"<?php } ?> data-url="<?php echo APP_PATH;?>zqwanchang/?date=<?php echo $r['date'];?>">
                        <div class="date-line"><?php echo $r['date_text'];?></div>
                        <div class="date-line"><?php echo $r['day'];?></div>
                    </li>
                    <?php $n++;}unset($n); ?>
                    <li class="date-control" id="dateCut">
                        <i class="icon-calendar"></i>
                        日历
                        <i class="icon-angle-down"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- 日历插件 -->
<div class="container">
    <div class="row">
        <div id="date-plugn" class="date-plugn" data-date="">
                <input type="hidden" value="" id="date-hidden" class="dateText">
                <div class="date-title">
                    <button class="date-control prev">
                        <i class="icon-arrow-left"></i>
                    </button>
                    <div class="date-info">
                        <div class="num">10</div>
                        <div class="text">
                            <div class="week">星期四</div>
                            <div class="date">2016 12月</div>
                        </div>
                    </div>
                    <button class="date-control next">
                        <i class="icon-arrow-right"></i>
                    </button>
                </div>

                <div class="date-content">

                    <ul class="date-week clearfix">
                        <li>日</li>
                        <li>一</li>
                        <li>二</li>
                        <li>三</li>
                        <li>四</li>
                        <li>五</li>
                        <li>六</li>
                    </ul>

                    <ul class="date-num" id="dateNum">
                    </ul>

                </div>

        </div>
    </div>
</div>
<!-- 日历插件end -->

<section class="main pdB20">
    <div class="container">
        <div class="row">
            <div class="wrap" id="table-content">
                <!-- table-header  -->
                <div id="table-header" class="table-header">
                    <table class="table">
                        <tr>
                            <td width="168">赛事</td>
                            <td width="63">时间</td>
                            <td width="55">状态</td>
                            <td width="150" class="text-right">主队</td>
                            <td width="50">比分</td>
                            <td width="150" class="text-left">客队</td>
                            <td width="65">半场</td>
                            <td width="105">亚盘</td>
                            <td width="50">大小</td>
                            <td width="">走</td>
                            <td width="120">数据</td>
                        </tr>
                    </table>
                </div>
                <!-- table-item -->
                <div class="table-item mrgB20">
                    <table class="table" id="end-table">
                        <thead>
                            <tr>
                                <td colspan="12">
                                    <span class="match-tip week">
                                        <?php echo date('m月d日', $starttime);?>
                                        星期<?php echo $week[date('N', $starttime)]?>
                                    </span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($end_game)) foreach($end_game AS $data) { ?>
                            <tr data-competition="<?php echo $data['competitionid'];?>">
                                <td width="168">
                                    <div class="clearfix">
                                        <div class="pull-left text-center" style="width: 50%;">
                                            <img src="<?php echo PHOTO_PATH;?>competition/<?php echo $r['compeitionid'];?>.jpg" class="competition-photo">
                                        </div>
                                        <div class="pull-right text-left" style="width: 50%">
                                            <span>
                                                <?php echo $data['competitionshortname'];?>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td width="63">
                                    <?php echo date('j日 H:i', $data['date']);?>
                                </td>
                                <td width="55">
                                    <!-- <img src="<?php echo IMG_PATH;?>/icon/timeicon.png" class="status-time"> -->
                                    <span class="table-status"><?php echo $arr_status[$data['status']];?></span>
                                    <!-- <img src="<?php echo IMG_PATH;?>/icon/point.png" class="status-point"> -->
                                </td>
                                <td width="150" class="text-right">
                                    <span class="num"><?php if($data['homerank']) { ?>[<?php echo $data['homerank'];?>]<?php } ?></span>
                                    <?php if($data['homeyellowcard']) { ?>
                                    <span class="yellowcard"><?php echo $data['homeyellowcard'];?></span>
                                    <?php } ?>
                                    <?php if($data['homeredcard']) { ?>
                                    <span class="redcard"><?php echo $data['homeredcard'];?></span>
                                    <?php } ?>
                                    <a href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                        <span class="teamname">
                                            <?php echo $data['homeshortname'];?>
                                        </span>
                                    </a>
                                </td>
                                <td width="50" class="score">
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/stats/" target="_blank">
                                        <?php echo $data['homescore'];?> - <?php echo $data['awayscore'];?>
                                    </a>
                                </td>
                                <td width="150" class="text-left">
                                    <a href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/" target="_blank">
                                        <span class="teamname">
                                            <?php echo $data['awayshortname'];?>
                                        </span>
                                    </a>
                                    <?php if($data['awayredcard']) { ?>
                                    <span class="redcard"><?php echo $data['awayredcard'];?></span>
                                    <?php } ?>
                                    <?php if($data['awayyellowcard']) { ?>
                                    <span class="yellowcard"><?php echo $data['awayyellowcard'];?></span>
                                    <?php } ?>
                                    <span class="num"><?php if($data['awayrank']) { ?>[<?php echo $data['awayrank'];?>]<?php } ?></span>
                                </td>
                                <td width="65">
                                    <?php echo $data['half'];?>
                                </td>
                                <td width="105" class="table-cpi">
                                    <div class="table-line" data-name="asia">
                                        <?php if(isset($data['give'])) { ?><?php echo get_handicap($data['give']);?><?php } ?>
                                    </div>
                                </td>
                                <td width="50">
                                    <?php echo handicap_ou($data['total']);?>
                                </td>
                                <td width="">
                                    <?php if($data['isrun'] == 1) { ?>
                                    <span class="runBall zd1" title="有走地赛事"></span>
                                    <?php } ?>
                                </td>
                                <td width="120">
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/" class="table-link" target="_blank">析</a>
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsasia/" class="table-link" target="_blank">亚</a>
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddsou/" class="table-link" target="_blank">大</a>
                                    <a href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/oddseuro/" class="table-link" target="_blank">欧</a>
                                </td>
                            </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
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

<!-- 赛事 弹出层 -->
<div class="modal fade" id="saishi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        
        <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">赛事选择</h4>
                      </div>
                      <div class="modal-body row">
                          <?php $n=1;if(is_array($competition_data)) foreach($competition_data AS $data) { ?>
                            <div class="col-md-3"><label><input type="checkbox" name="competitionid[]" data-name="competition" value="<?php echo $data['competitionid'];?>"><?php echo $data['competitionshortname'];?>[<?php echo $data['count'];?>]</label></div>
                          <?php $n++;}unset($n); ?>
                      </div>
                      <div class="modal-footer">
                            <button class="btn btn-info" data-action="check-all" data-target="competition">全选</button>
                            <button class="btn btn-info" data-action="check-clear" data-target="competition">全不选</button>
                            <button class="btn btn-primary" data-dismiss="modal" data-target="competition" data-action="submit">确定</button>
                            <button class="btn btn-default" data-dismiss="modal">取消</button>
                      </div>
                </div>
          </div>
        
    </div>
</div>
<script>
    var APP_PATH = '<?php echo APP_PATH;?>';
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>

<?php $js = array('date-plugin.js', 'ft_end_game.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js','fixed.js');?>
<?php include template('content', 'footer'); ?>