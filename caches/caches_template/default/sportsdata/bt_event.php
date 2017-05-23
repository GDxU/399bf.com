<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = ['bt_event.css'];?>
<?php $nav_id = 6;?>
<?php include template('content', 'header_score'); ?>
<nav>
    <div class="container">
        <div class="row">
            <div class="main-nav">
                <ul class="clearfix">
                    <li><a href="<?php echo APP_PATH;?>zqevent/" class="football">足球数据库</a></li>
                    <li class="active"><a href="<?php echo APP_PATH;?>lqevent/" class="basketball">篮球数据库</a></li>
                </ul>
            </div>
            <div class="matchNavBar">
                <ul class="clearfix">
                    <?php $n=1; if(is_array($area)) foreach($area AS $zoneid => $r) { ?>
                    <li class="zone-item" data-zoneid="<?php echo $zoneid;?>"><a class="<?php if($zoneid == 'euro') { ?>active<?php } ?>" href="javascript:;" ><?php echo $r['name'];?></a></li>
                    <?php $n++;}unset($n); ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<section>
    <div class="container">
        <div class="row">
            <div class="col-left ">
                <div class="main">
                    <?php $n=1; if(is_array($stat)) foreach($stat AS $zoneid => $item) { ?>
                    <!-- 国家 -->
                    <div class="guojia-m zone-<?php echo $zoneid;?>" <?php if($zoneid != 'euro') { ?>style="display:none;"<?php } ?>>
                        <h1 class="title pdT10">
                            <span class="icon-title icon-jiangbei">
                            </span>
                            国家赛事

                        </h1>
                        <div class="m-box">
                            <ul class="clearfix">
                                <?php $n=1; if(is_array($item['country'])) foreach($item['country'] AS $name => $item2) { ?>
                                <li class="m-item">
                                    <div class="m-item-img"><img src="" alt="" height="50" class="bt-competition-photo"></div>
                                    <div class="m-item-title"><?php echo $name;?><i class="icon-angle-down fr"></i></div>
                                    <div class="m-dropdown">
                                        <ul>
                                            <?php $n=1;if(is_array($item2)) foreach($item2 AS $r) { ?>
                                            <li><a target="_blank" href="<?php echo APP_PATH;?>sclass/<?php echo $r['sclassid'];?>/schedule/"><?php echo $r['name'];?></a></li>
                                            <?php $n++;}unset($n); ?>
                                        </ul>
                                    </div>
                                </li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                        </div>
                    </div>
                    <!-- 国际 -->
                    <div class="guojia-m zone-<?php echo $zoneid;?>" <?php if($zoneid != 'euro') { ?>style="display:none;"<?php } ?>>
                        <h1 class="title pdT10">
                            <span class="icon-title icon-jiangbei">
                            </span>
                            洲际赛事
                        </h1>
                        <div class="m-box">
                            <ul class="clearfix">
                                <?php $n=1;if(is_array($item['zone'])) foreach($item['zone'] AS $r) { ?>
                                <li class="m-item">
                                    <a target="_blank" href="<?php echo APP_PATH;?>sclass/<?php echo $r['sclassid'];?>/schedule/">
                                        <div class="m-item-img"><img src="" alt="" height="50" class="bt-competition-photo"></div>
                                        <div class="m-item-title"><?php echo $r['name'];?></div>
                                    </a>
                                </li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                        </div>
                    </div>
                    <?php $n++;}unset($n); ?>


                </div>
            </div>
            <div class="col-right pdL15">
                <div class="side">
                    <h1 class="title pdT10">
                        <span class="icon-title icon-jiangbei">
                        </span>
                        赛事推荐
                        <a class="more" href="<?php echo APP_PATH;?>lqscore/" target="_blank">更多</a>
                    </h1>

                    <div class="m-list" id="match_list">
                        <ul>
                            <?php $n=1;if(is_array($hot_event)) foreach($hot_event AS $r) { ?>
                            <li class="list-item clearfix">
                                <div class="inner-col">
                                    <div class="team-img">
                                        <a href="<?php echo $r['home_url'];?>" target="_blank">
                                            <img src="<?php echo $r['home_logo'];?>" alt="" title="<?php echo $r['homename_cn'];?>" class="bt-team-photo">
                                        </a>
                                    </div>
                                    <p>
                                        <a href="<?php echo $r['home_url'];?>" title="<?php echo $r['homename_cn'];?>" target="_blank"><?php echo $r['homename'];?></a>
                                    </p>
                                </div>
                                <div class="inner-col">
                                    <a target="_blank" href="<?php echo $r['url'];?>">
                                    <div class="live-score"><?php echo $r['homescore'];?>:<?php echo $r['guestscore'];?></div>
                                    <p><?php echo date('m月d日 H:i', $r['date']);?></p>
                                    </a>
                                </div>
                                <div class="inner-col">
                                    <div class="team-img">
                                        <a href="<?php echo $r['guest_url'];?>" target="_blank">
                                            <img src="<?php echo $r['guest_logo'];?>" alt="" title="<?php echo $r['guestname_cn'];?>" class="bt-team-photo">
                                        </a>
                                    </div>
                                    <p>
                                        <a href="<?php echo $r['guest_url'];?>" target="_blank" title="<?php echo $r['guestname_cn'];?>"><?php echo $r['guestname'];?></a>
                                    </p>
                                </div>
                            </li>
                            <?php $n++;}unset($n); ?>
                       </ul>
                    </div>
                </div>
                <div class="side side_bt">
                    <h1 class="title pdT10">
                        <span class="icon-title bg-pic">
                        </span>
                        精彩图片
                        <a class="more" href="<?php echo APP_PATH;?>tuku/" target="_blank">更多</a>
                    </h1>
                    <div class="pd height422">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b1b235baf36a19ee2e20f5b41aebb4f0&action=lists&catid=7&num=18&order=id+DESC&cache=3600&thumb=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('catid'=>'7','order'=>'id DESC','thumb'=>'1',)).'b1b235baf36a19ee2e20f5b41aebb4f0');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'7','order'=>'id DESC','thumb'=>'1','limit'=>'18',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
                        <?php $data = array_chunk($data, 6)?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $list) { ?>
                        <ul class="list-pic-container clearfix">
                            <?php $n=1;if(is_array($list)) foreach($list AS $r) { ?>
                            <li class="list-pic">
                                <div class="list-img-wrap">
                                    <a href="<?php echo $r['url'];?>" target="_blank">
                                        <img src="<?php echo get_thumb($r[thumb],350);?>" title="<?php echo $r['title'];?>">
                                    </a>
                                </div>
                                <div class="pic-des">
                                    <?php echo str_cut($r[title], 28, '...');?>
                                </div>
                            </li>
                            <?php $n++;}unset($n); ?>
                        </ul>
                        <?php $n++;}unset($n); ?>
                    </div>
                    <?php if(count($data) > 1) { ?>
                    <div class="tab-btn clearfix">
                        <ul class="fr">
                            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                            <li class="list-btn <?php if($n==1) { ?>active<?php } ?>"></li>
                            <?php $n++;}unset($n); ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>
<?php $js = ['bt_event.js','article_tab.js','imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js'];?>
<?php include template('content', 'footer'); ?>