<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('bt_schedule_analyse.css');?>
<?php include template('content', 'header_score'); ?>

<?php include template('sportsdata', 'bt_schedule_info'); ?>

<!-- main body -->
<section class="main pdB20" id="table-content">
    <div class="container">
        <div class="row">

            <div class="score-item bt_euro_scoreitem" id="scoreRank" style="padding: 10px">

                <div class="score-item-bd pdB10">

                    <table id="table" class="table bigTable special">
                        <thead>
                            <tr class="bg_orange">
                                <th class="border" width="140" rowspan="2">
                                    博彩公司
                                </th>
                                <th class="border" colspan="3">初盘</th>
                                <th class="border" colspan="3">即时</th>
                                <th class="border" rowspan="2">变化</th>
                                <th rowspan="2">历史资料</th>
                            </tr>
                            <tr class="bg_orange">
                                <th class="border">主队</th>
                                <th class="border">盘口</th>
                                <th class="border">客队</th>
                                <th class="border">主队</th>
                                <th class="border">盘口</th>
                                <th>客队</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($let_goal)) foreach($let_goal AS $data) { ?>
                            <tr>
                                <td class="border"><?php echo $company[$data['companyid']]['name'];?></td>
                                <td class="border"><?php echo rtrim0($data['homeodds_f']);?></td>
                                <td class="border"><?php echo rtrim0($data['letgoal_f']);?></td>
                                <td class="border"><?php echo rtrim0($data['guestodds_f']);?></td>
                                <td class="border"><span class="orange"><?php echo rtrim0($data['homeodds']);?></span></td>
                                <td class="border"><?php echo rtrim0($data['letgoal']);?></td>
                                <td class="border"><span class="orange"><?php echo rtrim0($data['guestodds']);?></span></td>
                                <td class="border"><i class="icon-img"></i></td>
                                <td>
                                    <span class="orange">主</span>
                                    <span class="orange">客</span>
                                    <span class="red">同</span>
                                </td>
                            </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>

                </div>
                <div class="score-item-bd">

                    <table id="table" class="table bigTable special">
                        <thead>
                            <tr class="bg_orange">
                                <?php $n=1;if(is_array($company)) foreach($company AS $c) { ?>
                                    <th class="border" width="143"><?php echo $c['name'];?></th>
                                <?php $n++;}unset($n); ?>
                                <th>变化时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($let_goal_detail)) foreach($let_goal_detail AS $r) { ?>
                        <tr>
                            <?php $n=1;if(is_array($company)) foreach($company AS $c) { ?>
                            <?php if($r[companyid] == $c[companyid]) { ?>
                            <td class="border <?php if($r[type] == 6) { ?>bg_greenA<?php } else { ?>bg_green<?php } ?>">
                                <div class="table-line">
                                    <b><?php echo rtrim0($r[letgoal]);?></b>
                                </div>
                                <div class="table-line">
                                    <span class="col"><?php echo rtrim0($r[homeodds]);?></span>
                                    <span class="col"><?php echo rtrim0($r[guestodds]);?></span>
                                </div>
                            </td>
                            <?php } else { ?>
                            <td class="border"></td>
                            <?php } ?>
                            <?php $n++;}unset($n); ?>
                            <td><?php echo date('Y-m-d H:i', $r[modifytime]);?></td>
                        </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>

                </div>

                <div class="score-item-fd">
                    <div class="hint">
                        说明：
                        <i class="rect-greenA"></i>表示即时盘，
                        <i class="rect-green"></i>表示走地盘
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- main body -->

<script>
    var IMG_PATH = '<?php echo IMG_PATH;?>';
    //二级导航高亮
    document.getElementById('asia').setAttribute('class', 'active');
</script>

<?php $js = array('imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js');?>
<?php include template('content', 'footer'); ?>