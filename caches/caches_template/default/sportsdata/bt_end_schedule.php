<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('bt_live_schedule.css', 'date-plugin.css');?>
<?php include template('content', 'header_score'); ?>

<div class="select-wrap">
    <div class="container" >
        <ul class="row select-nav" style="padding-top: 25px;">
            <li class="item"><a href="<?php echo APP_PATH;?>lqscore/">即时</a></li>
            <li class="item active">完场</li>
            <li class="item"><a href="<?php echo APP_PATH;?>lqsaicheng/">下日</a></li>
            <li>
                <button class="btn item" data-toggle="modal" data-target="#saishi">
                    选择赛事<i class="icon-angle-down" style="margin-left: 5px;"></i>
                </button>
            </li>
            <li class="item active hot-item" data-id="0">完整</li>
            <li class="item hot-item" data-id="1">NBA</li>
            <li class="item hot-item" data-id="5">CBA</li>
            <li class="item hot-item" data-id="2">WNBA</li>
            <li class="item hot-item" data-id="7">EURO</li>
            <li class="item spe">共<?php echo $total;?>场 隐藏<span id="hidden" class="orange">0</span>场</li>
        </ul>
    </div>
    <div class="date-wrap clearfix">
        <ul>
            <?php $n=1;if(is_array($arr_date)) foreach($arr_date AS $r) { ?>
            <?php if($r[active] == 1) { ?>
            <li class="active"><?php echo $r['date_text'];?><br><?php echo $r['week_text'];?></li>
            <?php } else { ?>
            <a href="<?php echo APP_PATH;?>lqwanchang/?date=<?php echo $r['date'];?>">
                <li class="date-item"><?php echo $r['date_text'];?><br><?php echo $r['week_text'];?></li>
            </a>
            <?php } ?>
            <?php $n++;}unset($n); ?>
            <li id="calenBtn" class="date-item" style="padding-top: 15px;">
                <i class="icon-calendar"></i>
                <span style="margin: 0 5px;">日历</span>
                <i class="icon-angle-down"></i>
            </li>
        </ul>
    </div>
</div>
<!-- 日历插件 -->
<div class="container">
    <div class="row">
        <div id="date-plugn" class="date-plugn" data-date="" style="display: none">
            <input type="hidden" value="" class="dateText">
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
<div class="data-wrap clearfix">
    <div class="event">
        <div class="title"><i class="rili"></i><?php echo $date_text;?></div>
        <?php $n=1;if(is_array($end_schedule)) foreach($end_schedule AS $r) { ?>
        <div class="data-item clearfix" data-competition="<?php echo $r['sclassid'];?>" data-id="<?php echo $r['sclassid'];?>">
            <div class="time-wrap">
                <span class="time"><?php echo $r['date'];?></span>
            </div>
            <div class="table-wrap" style="border: 1px solid #f2f2f2;">
                <table width="100%">
                    <tr>
                        <td width="196" align="left" class="pdl-10"><span style="color: <?php echo $r['sclasscolor'];?>"><?php echo $r['sclassname_cn'];?></span> <span
                                class="red fr pdr"><?php echo $r['status'];?></span></td>
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
                        <td width="40" class="grey2">全场</td>
                        <td width="50" class="grey2">分差</td>
                        <td width="50" class="grey2">总分</td>
                        <td width="50" class="grey2">欧赔</td>
                        <td width="100" class="grey2">让分盘</td>
                        <td width="120" class="grey2">大小分</td>
                        <td width="120"><i class="ft18 start-pos grey icon-star-empty"></i></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10">
                            <div class="imgCon"><img src="<?php echo $r['homelogo'];?>" height="25" width="25" alt="" class="team-photo"></div>
                            <div class="teamname"><?php echo str_cut($r[homename_cn], 30, '...');?></div>
                        </td>
                        <td><?php echo $r['homeone'];?></td><?php if($r['sclasspart'] == 4) { ?><td><?php echo $r['hometwo'];?></td><?php } ?><td><?php echo $r['homethree'];?></td><?php if($r['sclasspart'] == 4) { ?><td><?php echo $r['homefour'];?></td><?php } ?><td class="grey2"><?php echo $r['homeFirstHalf'];?>/<?php echo $r['homeSecondHalf'];?></td><td><span class="red"><?php echo $r['homescore'];?></span></td><td class="grey2">半:<?php echo $r['halfDiff'];?></td><td class="grey2">半:<?php echo $r['halfSum'];?></td><td><span><?php echo $r['homewin'];?></span></td><td><span class="orange"><?php echo $r['letgoal'];?></span> <span class="pos"><?php echo $r['homeodds'];?></span></td><td><span class="orange">小<?php echo $r['totalscore'];?></span> <?php echo $r['lowodds'];?></td>
                        <td rowspan="2">
                            <div class="height35"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/analyse/" target="_blank">分析</a></div>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/asia/" target="_blank">亚</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/euro/" target="_blank">欧</a></span>
                            <span class="m5"><a href="<?php echo APP_PATH;?>schedule/<?php echo $r['scheduleid'];?>/ou/" target="_blank">大</a></span></td>
                    </tr>
                    <tr>
                        <td align="left" class="pdl-10">
                            <div class="imgCon"><img src="<?php echo $r['guestlogo'];?>" height="25" width="25" alt="" class="team-photo"></div>
                            <div class="teamname"><?php echo str_cut($r[guestname_cn], 30, '...');?></div>
                        </td>
                        <td><?php echo $r['guestone'];?></td>
                        <?php if($r['sclasspart'] == 4) { ?><td><?php echo $r['guesttwo'];?></td><?php } ?>
                        <td><?php echo $r['guestthree'];?></td>
                        <?php if($r['sclasspart'] == 4) { ?><td><?php echo $r['guestfour'];?></td><?php } ?>
                        <td class="grey2"><?php echo $r['guestFirstHalf'];?>/<?php echo $r['guestSecondHalf'];?></td>
                        <td><span class="red"><?php echo $r['guestscore'];?></span></td>
                        <td class="grey2">总:<?php echo $r['wholeDiff'];?></td>
                        <td class="grey2">总:<?php echo $r['wholeSum'];?></td>
                        <td><span><?php echo $r['guestwin'];?></span></td>
                        <td><span class="orange"><span style="color: #FFF;"><?php echo $r['letgoal'];?></span></span> <span class="pos"><?php echo $r['guestodds'];?></span></td>
                        <td><span class="orange">大<?php echo $r['totalscore'];?></span>&nbsp;<?php echo $r['highodds'];?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php $n++;}unset($n); ?>
    </div>
</div>


<!--modal-->
<!-- 赛事 弹出层 -->
<div class="modal fade" id="saishi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">赛事选择</h4>
            </div>
            <div class="modal-body row">
                <?php $n=1;if(is_array($sclass_data)) foreach($sclass_data AS $r) { ?>
                <div class="col-md-3"><label><input type="checkbox" name="competitionid[]" data-name="competition" value="<?php echo $r['sclassid'];?>">&nbsp;<?php echo $r['sclassname'];?></label></div>
                <?php $n++;}unset($n); ?>
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
</div>
<script>
    var url = '<?php echo $url;?>';
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>

<?php $js = array('date-plugin.js', 'date-plugin-init.js', 'bt_end_future.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js');?>
<?php include template('content', 'footer'); ?>