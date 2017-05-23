<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('bt_info.css')?>
<?php $nav_id = 6;?>
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
        <?php include template('sportsdata', 'bt_sclass_crumbs'); ?>
        <div class="row">
            <div class="col-sm-2 pdL0">

                <!-- 树形菜单 start -->
                <div class="navMenu treeMenu" id="treeMenu">
                    <ul>

                        <?php $n=1; if(is_array($tree)) foreach($tree AS $zone_name => $item) { ?>
                        <li class="tree-menu">

                            <div class="tree-one-title" tree-title name="one">
                                <?php echo $zone_name;?>
                                <i class="icon-angle-right fr"></i>
                            </div>


                            <div class="tree" tree-menu >

                                <!-- 二级 -->
                                <?php $n=1; if(is_array($item)) foreach($item AS $country_name => $item2) { ?>
                                <div class="tree-item">

                                    <div class="tree-two-title" tree-title name="two">
                                        <i class="icon-plus"></i>
                                        <?php echo $country_name;?>
                                    </div>
                                    <div class="tree" tree-menu>

                                        <ul>
                                            <?php $n=1;if(is_array($item2)) foreach($item2 AS $r) { ?>
                                            <li><a target="_blank" href="<?php echo APP_PATH;?>sclass/<?php echo $r['sclassid'];?>/schedule/"><?php echo $r['name'];?></a></li>
                                            <?php $n++;}unset($n); ?>
                                        </ul>

                                    </div>


                                </div>
                                <?php $n++;}unset($n); ?>

                            </div>
                        </li>
                        <?php $n++;}unset($n); ?>

                    </ul>
                </div>
                <!-- 树形菜单 end -->

                <!--<div class="side-search">-->
                    <!--<div class="search-title">资料库搜索</div>-->
                    <!--<div class="search-control">-->
                        <!--<input class="input-search" type="text" placeholder="搜索">-->
                        <!--<button type="submit" class="btn-search">-->
                            <!--<i class="icon-search"></i>-->
                        <!--</button>-->
                    <!--</div>-->
                    <!--<div class="radio-group">-->
                        <!--<label for="player" class="checkbox-inline">-->
                            <!--<input type="checkbox" id="player">-->
                            <!--<i class="table-checkbox"></i>-->
                            <!--球员-->
                        <!--</label>-->
                        <!--<label for="team" class="checkbox-inline">-->
                            <!--<input type="checkbox" id="team">-->
                            <!--<i class="table-checkbox"></i>-->
                            <!--球队-->
                        <!--</label>-->
                    <!--</div>-->
                <!--</div>-->

            </div>
            <div class="col-sm-10 pdL0 pdR0">


                <!-- iframe -->
                <div class="iframe-page" id="iframe_page">

                    <div class="iframe-head clearfix">
                        <h1 class="m-title fl">
                            <img src="<?php echo BT_SCLASS_PATH;?><?php echo $sclass_id;?>.jpg" width="59" height="59" alt="" class="fl bt-competition-photo">
                            <?php echo $sclass_info['currseason'];?><?php echo $sclass_info['name_cn'];?>
                        </h1>
                        <div class="dropdown fr">
                            <button class="btn btn-default" data-toggle="dropdown" aria-expanded="true">
                                <span id="guest-name">请选择球队</span>
                                <i class="icon-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="jw_dropA">
                                <ul data-action="filter" data-target=".schedule-table" data-show="#guest-name" data-filter="guest" data-type="team">
                                    <li data-value="false">请选择球队</li>
                                    <?php $n=1; if(is_array($team_arr)) foreach($team_arr AS $id => $name) { ?>
                                    <li data-value="<?php echo $id;?>"><?php echo $name;?></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="dropdown fr">
                            <button class="btn btn-default" data-toggle="dropdown" aria-expanded="true">
                                <span id="home-name">请选择球队</span>
                                <i class="icon-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="jw_dropA">
                                <ul data-action="filter" data-target=".schedule-table" data-show="#home-name" data-filter="home" data-type="team">
                                    <li data-value="false">请选择球队</li>
                                    <?php $n=1; if(is_array($team_arr)) foreach($team_arr AS $id => $name) { ?>
                                    <li data-value="<?php echo $id;?>"><?php echo $name;?></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="dropdown fr">
                            <button class="btn btn-default" id="jw_dropA" data-toggle="dropdown" aria-expanded="true">
                                <i class="icon-calendar"></i>
                                <?php echo $sclass_info['currseason'];?>
                                <i class="icon-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="jw_dropA">
                                <ul>
                                    <?php $n=1;if(is_array($season_arr)) foreach($season_arr AS $data) { ?>
                                    <li data-action="link" data-url="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/schedule/?season=<?php echo $data;?>"><?php echo $data;?></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="iframe-table">

                        <div class="iframe-nav">
                            <ul class="clearfix">
                                <li><a href="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/schedule/" class="active">赛程赛果</a></li>
                                <li><a href="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/standings/" >联盟排名</a></li>
                                <li><a href="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/letgoal/" >让球盘路榜</a></li>
                                <li><a href="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/totalscore/" >大小盘路榜</a></li>
                                <li><a href="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/singleDouble/" >单双统计</a></li>
                                <li><a href="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/teamTechnic/" >球队技术统计</a></li>
                                <li><a href="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/playerTechnic/">球员技术统计</a></li>
                                <li><a href="<?php echo APP_PATH;?>sclass/<?php echo $sclass_id;?>/team/" >球队资料</a></li>
                            </ul>
                        </div>


                        <div class="table-item table-min">
                            <div class="table-tab clearfix">
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php $index = 1?>
                                    <?php $n=1; if(is_array($info)) foreach($info AS $key => $value) { ?>
                                    <li role="presentation" <?php if($index == 1) { ?>class="active"<?php } ?>>
                                        <a href="#group-<?php echo $key;?>" aria-controls="home" role="tab" data-toggle="tab" class="center-block">
                                            <?php echo $group[$key];?>
                                        </a>
                                    </li>
                                    <?php $index++?>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <?php $index = 1?>
                                <?php $n=1; if(is_array($info)) foreach($info AS $key => $list) { ?>
                                <div role="tabpanel" class="tab-pane <?php if($index == 1) { ?>active<?php } ?>" id="group-<?php echo $key;?>">
                                    <?php if(isset($category_arr[$key])) { ?>
                                        <?php $n=1; if(is_array($category_arr[$key])) foreach($category_arr[$key] AS $name => $category) { ?>
                                        <?php if(count($category) > 1) { ?>
                                            <button class="btn btn-default"><?php echo $name;?></button>
                                            <?php $n=1;if(is_array($category)) foreach($category AS $data) { ?>
                                            <button class="btn btn-default" data-action="category-filter" data-target=".schedule-table" data-filter="subcategory" data-value="<?php echo $data;?>"><?php echo $data;?></button>
                                            <?php $n++;}unset($n); ?>
                                        <?php } else { ?>
                                            <button class="btn btn-default" data-action="category-filter" data-target=".schedule-table" data-filter="category" data-value="<?php echo $name;?>"><?php echo $name;?></button>
                                        <?php } ?>
                                        <?php $n++;}unset($n); ?>
                                    <?php } ?>
                                    <table class="table schedule-table">
                                        <thead>
                                        <tr>
                                            <td>类型</td>
                                            <td>时间</td>
                                            <td>主队</td>
                                            <td>比分</td>
                                            <td>客队</td>
                                            <td>让分</td>
                                            <td>总分</td>
                                            <td>资料</td>
                                            <td>半场</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $n=1; if(is_array($list)) foreach($list AS $date => $value) { ?>
                                        <tr class="colorW">
                                            <td colspan="9" class="bold"><?php echo $date;?></td>
                                        </tr>
                                        <?php $n=1; if(is_array($value)) foreach($value AS $id => $data) { ?>
                                        <tr data-home="<?php echo $data['hometeamid'];?>" data-guest="<?php echo $data['guestteamid'];?>" data-season="<?php echo $data['sclassseason'];?>"
                                            <?php if($data['category']) { ?>data-category="<?php echo $data['category'];?>"<?php } ?> <?php if($data['subcategory']) { ?>data-subcategory="<?php echo $data['subcategory'];?>"<?php } ?>>
                                            <td><?php echo $group[$key];?></td>
                                            <td><?php echo date('m-d H:i', $data['date']);?></td>
                                            <td>
                                                <a href="<?php echo APP_PATH;?>lq/team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                                    <?php echo $data['homename_cn'];?>
                                                </a>
                                            </td>
                                            <td class="bold">
                                                <span <?php if($data['homescore'] > $data['guestscore']) { ?>class="red"<?php } elseif ($data['homescore'] < $data['guestscore']) { ?>class="green"<?php } ?>><?php echo $data['homescore'];?></span>
                                                -
                                                <span <?php if($data['homescore'] < $data['guestscore']) { ?>class="red"<?php } elseif ($data['homescore'] > $data['guestscore']) { ?>class="green"<?php } ?>><?php echo $data['guestscore'];?></span>
                                            </td>
                                            <td>
                                                <a href="<?php echo APP_PATH;?>lq/team/<?php echo $data['guestteamid'];?>/" target="_blank">
                                                    <?php echo $data['guestname_cn'];?>
                                                </a>
                                            </td>
                                            <td><?php echo $data['letgoal'];?></td>
                                            <td><?php echo $data['totalscore'];?></td>
                                            <td>
                                                <span>
                                                    <a class="orange" href="<?php echo APP_PATH;?>schedule/<?php echo $data['scheduleid'];?>/analyse/" target="_blank">[析]</a>&nbsp;&nbsp;
                                                    <a class="orange" href="<?php echo APP_PATH;?>schedule/<?php echo $data['scheduleid'];?>/euro/" target="_blank">[欧]</a>
                                                </span>
                                            </td>
                                            <td><span class="green bold"><?php echo $data['half']['home'];?>-<?php echo $data['half']['guest'];?></span></td>
                                        </tr>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n++;}unset($n); ?>
                                        </tbody>
                                    </table>
                                    <div class="evaluate">
                                        <div class="title">
                                            专家点评
                                        </div>
                                        <div class="pd10">专家点评专家点评专家点评专家点评专家点评</div>
                                    </div>
                                </div>
                                <?php $index++?>
                                <?php $n++;}unset($n); ?>
                            </div>
                        </div>
                        <div class="hint">
                            页面最后更新时间:2017-01-03 11:13:14
                        </div>

                    </div>


                </div>
                <!-- iframe end -->
            </div>
        </div>
    </div>
</section>
<script>
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>
<?php $js = array('tree.js', 'bt_sclass_schedule.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js')?>
<?php include template('content', 'footer'); ?>