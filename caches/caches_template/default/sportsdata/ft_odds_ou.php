<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = ['laydate-need.css', 'laydate.css','ft_odds.css'];?>
<?php $nav_id = 5;?>
<?php include template('content', 'header_score'); ?>

<div class="banner-wrap">
    <div class="shop">
        <div class="odds-title active">
            <a href="<?php echo APP_PATH;?>zqodds/">足球指数</a>
        </div>
        <div class="odds-title">
            <a href="<?php echo APP_PATH;?>lqodds/">篮球指数</a>
        </div>
        <div class="nav">
            <ul class="odds-nav">
                <li><a href="<?php echo APP_PATH;?>zqodds/">综合指数</a></li>
                <li><a href="<?php echo APP_PATH;?>zqoddseuro/">欧赔指数</a></li>
                <li><a href="<?php echo APP_PATH;?>zqoddsasia/">亚盘指数</a></li>
                <li class="active"><a href="<?php echo APP_PATH;?>zqoddsou/">大小球</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="choose">
    <div class="choose-time clearfix">
        <ul style="float: left;">
            <li class="<?php if($odds_status == 1) { ?>active<?php } ?>"><a href="<?php echo APP_PATH;?>zqoddsou/">即时指数</a></li>
            <li class="<?php if($odds_status == 2) { ?>active<?php } ?>"><a href="<?php echo APP_PATH;?>zqoddsou/?odds_status=2">已开赛</a></li>
            <li class="<?php if($odds_status == 3) { ?>active<?php } ?>"><a href="<?php echo APP_PATH;?>zqoddsou/?odds_status=3">历史</a></li>
            <li class="<?php if($odds_status == 4) { ?>active<?php } ?>"><a href="<?php echo APP_PATH;?>zqoddsou/?odds_status=4">早盘</a></li>
            <li>
                <div class="dropdown" style="display: inline-block;">
                    <button class="btn btn-control" data-toggle="modal" data-target="#game-modal" style="background-color: #fff;width: 90px;">
                        选择赛事
                        <i class="icon-angle-down"></i>
                    </button>
                </div>
            </li>
        </ul>
        <?php if(in_array($odds_status, array(3, 4)) ) { ?>
        <div id="date-wrap" class="search-date" >
            <form method="post" action="<?php echo APP_PATH;?>zqoddsou/">
                <input type="hidden" name="odds_status" value="<?php echo $odds_status;?>" />
                日期：<input id="<?php if($odds_status == 3) { ?>history<?php } else { ?>tomorrow<?php } ?>" name="date" value="<?php echo $date;?>" type="text" style="width: 145px;height: 26px;">
                <button type="submit" class="btn btn-warning btn-sm">查询</button>
            </form>
        </div>
        <?php } ?>
    </div>
    <div class="choose-company clearfix">
        <form method="post" action="<?php echo APP_PATH;?>zqoddsou/">
            <input type="hidden" name="dosubmit" value="1" />
            <input type="hidden" name="odds_status" value="<?php echo $odds_status;?>" />
            <input type="hidden" name="date" value="<?php echo $date;?>" />
            <ul style="float: left;">
                <?php $n=1;if(is_array($companies)) foreach($companies AS $c) { ?>
                <li class="<?php if($c[checked]) { ?>active<?php } ?>"><a href=""><?php echo $c['companyname'];?></a><input type="checkbox" style="display: none" name="companyid[]" value="<?php echo $c['companyid'];?>"></li>
                <?php $n++;}unset($n); ?>
            </ul>
            <a id="sure" class="sure">确定</a>

        </form>
    </div>
</div>
<div class="content">
    <div id="table-header" class="table-header-wrap">
        <table class="table-header">
            <tr class="bg-grey">
                <td width="20%" rowspan="2">公司</td>
                <td width="40.8%" colspan="3">即时盘</td>
                <td width="40.8%" colspan="3">初始盘</td>
                <td width="16.1%" rowspan="2"></td>
            </tr>
            <tr class="bg-grey">
                <td width="10.6%">大球</td>
                <td width="10.6%">让球</td>
                <td width="10.6%">小球</td>
                <td width="10.6%">大球</td>
                <td width="10.6%">让球</td>
                <td width="10.6%">小球</td>
            </tr>
        </table>
    </div>
    <div class="time"><i class="rili"></i><?php echo $date_text;?></div>
    <?php $n=1; if(is_array($live_games)) foreach($live_games AS $gameid => $game) { ?>
    <!--一条数据start-->
    <div class="data-container" data-competition="<?php echo $game['competitionid'];?>">
        <div class="competition-info">
            <i class="data-btn data-open"></i>
            <span class="ml30"><a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $game['competitionid'];?>/schedule/"><?php echo $game['competitionshortname'];?></a>&nbsp;&nbsp;<?php echo date('H:i', $game[date]);?></span>
            <span class="red mr40"><?php if(in_array($game[status], array(1, 3))) { ?><?php echo $game['time'];?><?php } else { ?><?php echo $arr_status[$game['status']];?><?php } ?></span>
            <span class="ml40"><span class="red mr5"><?php if(!empty($game[homerank])) { ?>［<?php echo $game['homerank'];?>］<?php } ?></span><a target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $game['hometeamid'];?>/"><?php echo $game['homeshortname'];?></a></span>
            <span class="red mr20"><?php if(isset($game[homescore])) { ?><?php echo $game['homescore'];?><?php } ?>－<?php if(isset($game[awayscore])) { ?><?php echo $game['awayscore'];?><?php } ?></span>
            <span class="mrr40"><a target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $game['awayteamid'];?>/"><?php echo $game['awayshortname'];?><span class="red ml5"><?php if(!empty($game[awayrank])) { ?>［<?php echo $game['awayrank'];?>］<?php } ?></span></span>
            <a target="_blank" href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/analyse/" class="analysis" style="margin-right: 75px;">析</a>
        </div>
        <div class="competition-data">
            <table>
                <?php $rowspan = true;?>
                <?php $n=1;if(is_array($game['odds'])) foreach($game['odds'] AS $r) { ?>
                <tr>
                    <td width="20%"><?php echo $r['companyname'];?></td>
                    <td width="10.6%"><?php if(isset($r[big])) { ?><?php echo $r['big'];?><?php } ?></td>
                    <td width="10.6%"><?php if(isset($r[total])) { ?><?php echo handicap_ou($r[total]);?><?php } ?></td>
                    <td width="10.6%"><?php if(isset($r[small])) { ?><?php echo $r['small'];?><?php } ?></td>
                    <td width="10.6%"><?php if(isset($r[fbig])) { ?><?php echo $r['fbig'];?><?php } ?></td>
                    <td width="10.6%"><?php if(isset($r[ftotal])) { ?><?php echo handicap_ou($r[ftotal]);?><?php } ?></td>
                    <td width="10.6%"><?php if(isset($r[fsmall])) { ?><?php echo $r['fsmall'];?><?php } ?></td>
                    <?php if($rowspan) { ?>
                    <td width="16.1%" rowspan="<?php echo count($game[odds]);?>" >
                        <a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/oddsasia/" target="_blank">亚</a>
                        <a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/oddsou/" target="_blank">大</a>
                        <a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/oddseuro/" target="_blank">欧</a>
                        <?php if($game[islive]) { ?><a href="<?php echo APP_PATH;?>game/<?php echo $gameid;?>/live/" target="_blank">直播</a><?php } ?>
                    </td>
                    <?php } ?>
                </tr>
                <?php $rowspan = false;?>
                <?php $n++;}unset($n); ?>
            </table>
        </div>
    </div>
    <!--一条数据end-->
    <?php $n++;}unset($n); ?>
</div>

<!--弹层-->
<div class="modal fade" id="game-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" >赛事选择</h4>
            </div>
            <div class="modal-body">
                <div class="dioLog-bd clearfix">
                    <?php $n=1; if(is_array($competitions)) foreach($competitions AS $id => $name) { ?>
                    <div class="col-sm-3">
                        <label>
                            <input type="checkbox" name="competitionid[]" data-name="competition" value="<?php echo $id;?>">
                            <?php echo $name;?>
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

<!--右侧浮动层-->
<div class="fixed-sidebar" id="fixedSidebar">
    <div class="sidebar-title">
        知识库
        <a href="javascript:;" class="btn-close fr">
            <i class="icon-remove"></i>
        </a>
    </div>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d1c1c65ee1d911d043f480e36cbcd91e&action=lists_model&num=10&modelid=1&where=%60catid%60%3D21\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists_model')) {$data = $content_tag->lists_model(array('modelid'=>'1','where'=>'`catid`=21','limit'=>'10',));}?>
    <ol class="sidebar-list">
        <?php $n=1;if(is_array($data)) foreach($data AS $value) { ?>
        <li>
            <a href="<?php echo $value['url'];?>" target="_blank" title="<?php echo $value['title'];?>"><?php echo $n;?>.<?php echo str_cut($value['title'], 70, '...');?></a>
        </li>
        <?php $n++;}unset($n); ?>
    </ol>
    <div class="sidebar-footer">
        <a href="<?php echo APP_PATH;?>ephyp/" target="_blank" class="fr more-link">更多》</a>
    </div>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>

<script>
    //指数状态
    var odds_status = <?php echo $odds_status;?>;
</script>
<?php $js = ['ft_odds.js','laydate.dev.js','date.js','fixed.js','fixedSidebar.js'];?>
<?php include template('content', 'footer'); ?>