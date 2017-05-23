<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('bt_schedule_analyse.css');?>
<?php include template('content', 'header_score'); ?>

<?php include template('sportsdata', 'bt_schedule_info'); ?>

<!-- main body -->
<section class="main pdB20" id="table-content">
    <div class="container">
        <div class="row">

            <div class="score-item bt_euro_scoreitem" id="scoreRank">

                <div class="score-item-hd">
                    <button class="btn btn-default" id="delChecked">删除选中</button>
                    <button class="btn btn-default" id="saveChecked">保留选中</button>
                    <div class="dropdown">
                        <button class="btn btn-default" id="jw_all" data-toggle="dropdown">
                            类型
                            <i class="icon-angle-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="jw_all">
                            <ul data-action="type-filter" data-target="detail-table">
                                <li data-value="">所有赔率</li>
                                <li data-value="first">初盘</li>
                                <li data-value="now">即时盘</li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" data-toggle="modal" data-target="#filter-modal">
                            筛选
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default" data-toggle="modal" data-target="#company-modal">
                            所有公司
                        </button>
                    </div>
                    <span>
                        共[<b data-action="total"><?php echo count($company_list);?></b>/<?php echo count($company_list);?>]间公司
                    </span>
                </div>

                <div class="score-item-bd pdB10">

                    <table id="detail-table" class="table bigTable">
                        <thead>
                            <tr class="bg_orange">
                                <th class="border" width="25">
                                    <label for="checkbox_all" class="checkbox-inline">
                                        <input type="checkbox" id="checkbox_all">
                                        <i class="table-checkbox"></i>
                                    </label>
                                </th>
                                <th class="border" width="280">公司名称</th>
                                <th width="80">主胜</th>
                                <th class="border" width="80">客胜</th>
                                <th width="80">主胜率</th>
                                <th width="80">客胜率</th>
                                <th class="border" width="80">返还率</th>
                                <th class="border" colspan="2" width="170">凯利指数</th>
                                <th>变化时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=1;if(is_array($euro_detail)) foreach($euro_detail AS $data) { ?>
                            <tr data-company="<?php echo $data['companyid'];?>" data-homewin="<?php echo $data['homewin'];?>" data-guestwin="<?php echo $data['guestwin'];?>"
                                data-homerate="<?php echo $data['probability_h'];?>" data-guestrate="<?php echo $data['probability_g'];?>" data-totalrate="<?php echo $data['probability_t'];?>"
                                data-homekelly="<?php echo $data['kelly_h'];?>" data-guestkelly="<?php echo $data['kelly_g'];?>" data-time="<?php echo $data['modifytime'];?>">
                                <td class="border">
                                    <label for="checkbox_1" class="checkbox-inline">
                                        <input type="checkbox" id="checkbox_1">
                                        <i class="table-checkbox"></i>
                                    </label>
                                </td>
                                <td class="border"><?php echo $company[$data['companyid']]['name_cn'];?></td>
                                <td>
                                    <div data-type="first" class="odds-first">
                                        <?php echo $data['homewin_f'];?>
                                    </div>
                                    <div data-type="now" <?php if($data['homewin_trend'] > 0) { ?>class="red"<?php } elseif ($data['homewin_trend'] <0) { ?>class="green"<?php } else { ?><?php } ?>>
                                        <?php echo $data['homewin'];?>
                                    </div>
                                </td>
                                <td class="border">
                                    <div data-type="first" class="odds-first">
                                        <?php echo $data['guestwin_f'];?>
                                    </div>
                                    <div data-type="now" <?php if($data['guestwin_trend'] > 0) { ?>class="red"<?php } elseif ($data['guestwin_trend'] <0) { ?>class="green"<?php } else { ?><?php } ?>>
                                        <?php echo $data['guestwin'];?>
                                    </div>
                                </td>
                                <td>
                                    <div data-type="first" class="odds-first">
                                        <?php echo $data['probability_hf'];?>
                                    </div>
                                    <div data-type="now">
                                        <?php echo $data['probability_h'];?>
                                    </div>
                                </td>
                                <td>
                                    <div data-type="first" class="odds-first">
                                        <?php echo $data['probability_gf'];?>
                                    </div>
                                    <div data-type="now">
                                        <?php echo $data['probability_g'];?>
                                    </div>
                                </td>
                                <td class="border">
                                    <div data-type="first" class="odds-first">
                                        <?php echo $data['probability_tf'];?>
                                    </div>
                                    <div data-type="now">
                                        <?php echo $data['probability_t'];?>
                                    </div>
                                </td>
                                <td><?php echo $data['kelly_h'];?></td>
                                <td class="border"><?php echo $data['kelly_g'];?></td>
                                <td><?php echo date('m-d H:i:s', $data['modifytime']);?></td>
                            </tr>
                        <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>

                    <table id="total-table" class="table bigTable">
                        <thead>
                            <tr class="bg_green">
                                <th class="border" width="305" colspan="2">&nbsp;</th>
                                <th width="80">主胜</th>
                                <th class="border" width="80">客胜</th>
                                <th width="80">主胜率</th>
                                <th width="80">客胜率</th>
                                <th class="border" width="80">返还率</th>
                                <th class="border" colspan="2" width="170">凯利指数</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border" width="218" rowspan="6">
                                    <button class="btn btn-orange" data-action="excel">导出Excel</button>
                                    <div>
                                        <label for="checkbox_setting" class="checkbox-inline">
                                            <input type="checkbox" id="checkbox_setting">头尾浮动
                                            <i class="table-checkbox"></i>
                                        </label>
                                    </div>
                                </td>
                                <td class="border bg_gray" width="87">
                                    初盘最高值
                                </td>
                                <td><span><?php echo $max_odds['homewin_f'];?></span></td>
                                <td class="border"><span><?php echo $max_odds['guestwin_f'];?></span></td>
                                <td><?php echo $max_odds['probability_hf'];?></td>
                                <td><?php echo $max_odds['probability_gf'];?></td>
                                <td class="border"><?php echo $max_odds['probability_tf'];?></td>
                                <td rowspan="2"><?php echo $max_odds['kelly_h'];?></td>
                                <td rowspan="2" class="border"><?php echo $max_odds['kelly_g'];?></td>
                            </tr>
                            <tr>
                                <td class="border bg_gray" width="87">
                                    即时最高值
                                </td>
                                <td><span <?php if($max_odds['homewin_trend'] > 0) { ?>class="red"<?php } elseif ($max_odds['homewin_trend'] < 0) { ?>class="green"<?php } else { ?><?php } ?>><?php echo $max_odds['homewin'];?></span></td>
                                <td class="border"><span <?php if($max_odds['guestwin_trend'] > 0) { ?>class="red"<?php } elseif ($max_odds['guestwin_trend'] < 0) { ?>class="green"<?php } else { ?><?php } ?>><?php echo $max_odds['guestwin'];?></span></td>
                                <td><?php echo $max_odds['probability_h'];?></td>
                                <td><?php echo $max_odds['probability_g'];?></td>
                                <td class="border"><?php echo $max_odds['probability_t'];?></td>
                            </tr>
                            <tr>
                                <td class="border bg_gray" width="87">
                                    初盘最低值
                                </td>
                                <td><span><?php echo $min_odds['homewin_f'];?></span></td>
                                <td class="border"><span><?php echo $min_odds['guestwin_f'];?></span></td>
                                <td><?php echo $min_odds['probability_hf'];?></td>
                                <td><?php echo $min_odds['probability_gf'];?></td>
                                <td class="border"><?php echo $min_odds['probability_tf'];?></td>
                                <td rowspan="2"><?php echo $min_odds['kelly_h'];?></td>
                                <td rowspan="2" class="border"><?php echo $min_odds['kelly_g'];?></td>
                            </tr>
                            <tr>
                                <td class="border bg_gray" width="87">
                                    即时最低值
                                </td>
                                <td><span <?php if($min_odds['homewin_trend'] > 0) { ?>class="red"<?php } elseif ($min_odds['homewin_trend'] < 0) { ?>class="green"<?php } else { ?><?php } ?>><?php echo $min_odds['homewin'];?></span></td>
                                <td class="border"><span <?php if($min_odds['guestwin_trend'] > 0) { ?>class="red"<?php } elseif ($min_odds['guestwin_trend'] < 0) { ?>class="green"<?php } else { ?><?php } ?>><?php echo $min_odds['guestwin'];?></span></td>
                                <td><?php echo $min_odds['probability_h'];?></td>
                                <td><?php echo $min_odds['probability_g'];?></td>
                                <td class="border"><?php echo $min_odds['probability_t'];?></td>
                            </tr>
                            <tr>
                                <td class="border bg_gray" width="87">
                                    初盘平均值
                                </td>
                                <td><span><?php echo $avg_odds['homewin_f'];?></span></td>
                                <td class="border"><span><?php echo $avg_odds['guestwin_f'];?></span></td>
                                <td><?php echo $avg_odds['probability_hf'];?></td>
                                <td><?php echo $avg_odds['probability_gf'];?></td>
                                <td class="border"><?php echo $avg_odds['probability_tf'];?></td>
                                <td rowspan="2"><?php echo $avg_odds['kelly_h'];?></td>
                                <td rowspan="2" class="border"><?php echo $avg_odds['kelly_g'];?></td>
                            </tr>
                            <tr>
                                <td class="border bg_gray" width="87">
                                    即时平均值
                                </td>
                                <td><span <?php if($avg_odds['homewin_trend'] > 0) { ?>class="red"<?php } elseif ($avg_odds['homewin_trend'] < 0) { ?>class="green"<?php } else { ?><?php } ?>><?php echo $avg_odds['homewin'];?></span></td>
                                <td class="border"><span <?php if($avg_odds['guestwin_trend'] > 0) { ?>class="red"<?php } elseif ($avg_odds['guestwin_trend'] < 0) { ?>class="green"<?php } else { ?><?php } ?>><?php echo $avg_odds['guestwin'];?></span></td>
                                <td><?php echo $avg_odds['probability_h'];?></td>
                                <td><?php echo $avg_odds['probability_g'];?></td>
                                <td class="border"><?php echo $avg_odds['probability_t'];?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="score-item-fd pdB10">
                    <b>注:</b>
                    <p>1、主、和、胜率：根据即时赔率换算出主、和、胜三项的概率，是对各项打出的可能性的度量。计算方法为：返还率除以主、和、胜项的    赔率。</p>
                    <p>2、返还率：即比赛的赔付比例，例如0.89的反还率含义就是博彩公司某场比赛的受注总量的89%用来支付投注者的奖金，剩下的11%为博彩公司的"水钱"。返还率越高说明投注者得
                         到的实惠更多。计算公式为：P = AxBxC/（AxB BxC AxC），P表示返还率，A表示胜赔，B表示平赔，C表示负赔。</p>
                    <p>3、凯利指数：反映了各项赔率存在的市场赔付风险，即市场动态与事前确立的赔付率之间的赔付差异。某项的凯利指数高于返还率，则表明该项的市场风险很大，难以打出；反之
                         则市场风险小，容易打出。计算方法为：用市场平均的概率来乘以某一家公司的赔率，即为该公司各项赔率的凯利指数。</p>
                    <p>4、使用帮助：凯利指数超过“1”时以红色加粗字体提醒；点击页头的“主、和、客、返还率”可以进行数值高低排序；点击指数可查看完整走势；变化时间显示红色时表示近30
                         分钟内数据有变化。</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- main body -->

<div class="modal fade" id="company-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" >公司选择</h4>
            </div>
            <div class="modal-body">
                <div class="dioLog-bd clearfix">
                    <?php $n=1;if(is_array($company_list)) foreach($company_list AS $data) { ?>
                    <div class="col-sm-3">
                        <label>
                            <input type="checkbox" name="company[]" data-name="company" value="<?php echo $data;?>">
                            <?php echo $company[$data]['name_cn'];?>
                        </label>
                    </div>
                    <?php $n++;}unset($n); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info checkAll" data-action="check-all" data-target="company">全选</button>
                <button type="button" class="btn btn-info clearCheck" data-action="check-clear" data-target="company">全不选</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" data-target="company" data-action="submit" data-dismiss="modal">确定</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filter-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" >高级筛选</h4>
            </div>
            <div class="modal-body">
                <div class="dioLog-bd clearfix">
                    <table class="table table-bordered" id="filter-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">主胜</th>
                                <th class="text-center">客胜</th>
                                <th class="text-center">主胜率</th>
                                <th class="text-center">客胜率</th>
                                <th class="text-center">返回率</th>
                                <th class="text-center" colspan="2">凯利指数</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-filter="min">
                                <td class="text-center">
                                    <label style="width: 90px; padding-top: 7px">最低值</label>
                                </td>
                                <td>
                                    <input type="text" name="homewin" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="guestwin" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="homerate" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="guestrate" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="totalrate" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="homekelly" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="guestkelly" class="form-control input-sm">
                                </td>
                            </tr>
                            <tr data-filter="max">
                                <td class="text-center">
                                    <label style="width: 90px; padding-top: 7px">最高值</label>
                                </td>
                                <td>
                                    <input type="text" name="homewin" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="guestwin" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="homerate" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="guestrate" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="totalrate" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="homekelly" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" name="guestkelly" class="form-control input-sm">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-action="filter" data-target="detail-table" data-dismiss="modal">筛选</button>
                <button type="button" class="btn btn-info" data-action="clear" data-target="filter-table">清除</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<script>
    var APP_PATH = '<?php echo APP_PATH;?>';
    var IMG_PATH = '<?php echo IMG_PATH;?>';
    var ID = '<?php echo $schedule_id;?>';
    //二级导航高亮
    document.getElementById('euro').setAttribute('class', 'active');
</script>

<?php $js = array('bt_schedule_euro.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js');?>
<?php include template('content', 'footer'); ?>
