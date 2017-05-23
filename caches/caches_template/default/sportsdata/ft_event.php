<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('ft_event.css')?>
<?php $nav_id = 6;?>
<?php include template("content", "header_score"); ?>

<nav>
    <div class="container">
        <div class="row">
            <div class="main-nav">
                <ul class="clearfix">
                    <li class="active"><a href="<?php echo APP_PATH;?>zqevent/" class="football">足球数据库</a></li>
                    <li><a href="<?php echo APP_PATH;?>lqevent/" class="basketball">篮球数据库</a></li>
                </ul>
            </div>
            <div class="matchNavBar">
                <ul class="clearfix">
                    <li class="zone-item" data-zoneid="13"><a class="active" href="javascript:;" >欧洲赛事</a></li>
                    <li class="zone-item" data-zoneid="25"><a href="javascript:;" >亚洲赛事</a></li>
                    <li class="zone-item" data-zoneid="26"><a href="javascript:;">美洲赛事</a></li>
                    <li class="zone-item" data-zoneid="27"><a href="javascript:;" >大洋洲赛事</a></li>
                    <li class="zone-item" data-zoneid="29"><a href="javascript:;" >国际赛事</a></li>
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

                    <?php $n=1; if(is_array($eventData)) foreach($eventData AS $zoneid => $item1) { ?>
                    <!-- 国家 -->
                    <div class="guojia-m zone-<?php echo $zoneid;?>" <?php if($zoneid != 13) { ?>style="display:none"<?php } ?>>
                        <h1 class="title pdT10">
                            <span class="icon-title icon-jiangbei">
                            </span>
                            国家赛事

                        </h1>
                        <div class="m-box">
                            <ul class="clearfix">
                                <?php $n=1; if(is_array($item1[2])) foreach($item1[2] AS $key => $item) { ?>
                                <li class="m-item">
                                    <div class="m-item-img"><img src="<?php echo $item['countrylogo'];?>" alt="" height="50"></div>
                                    <div class="m-item-title">
                                        <?php echo $item['countryname'];?>
                                        <i class="icon-angle-down fr"></i>
                                    </div>
                                    <div class="m-dropdown">
                                        <ul>
                                            <?php $n=1;if(is_array($item['event'])) foreach($item['event'] AS $r) { ?>
                                            <li><a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $r['eventid'];?>/schedule/"><?php echo $r['eventname'];?></a></li>
                                            <?php $n++;}unset($n); ?>
                                        </ul>
                                    </div>
                                </li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                        </div>
                    </div>
                    <!-- 国际 -->
                    <div class="guojia-m zone-<?php echo $zoneid;?>" <?php if($zoneid != 13) { ?>style="display:none"<?php } ?>>
                        <h1 class="title pdT10">
                            <span class="icon-title icon-jiangbei">
                            </span>
                            洲际赛事
                        </h1>
                        <div class="m-box">
                            <ul class="clearfix">
                                <?php $n=1; if(is_array($item1[1])) foreach($item1[1] AS $key => $r) { ?>
                                <li class="m-item">
                                    <a target="_blank" href="<?php echo APP_PATH;?>competition/<?php echo $r['id'];?>/schedule/">
                                        <div class="m-item-img"><img src="<?php echo $r['countrylogo'];?>" alt="" height="50"></div>
                                        <div class="m-item-title">
                                            <?php echo $r['name'];?>
                                        </div>
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
                        最新赛事

                    </h1>

                    <div class="m-list" id="match_list">
                        <ul>
                            <?php $n=1;if(is_array($hot_data)) foreach($hot_data AS $data) { ?>
                            <li class="list-item clearfix">
                                <div class="inner-col col-over">
                                    <div class="team-img">
                                        <a href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                            <img src="<?php echo PHOTO_PATH;?>team/<?php echo $data['hometeamid'];?>.jpg" alt="<?php echo $data['homeshortname'];?>" class="team-photo">
                                        </a>
                                    </div>
                                    <p>
                                        <a href="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/" target="_blank">
                                            <?php echo $data['homename'];?>
                                        </a>
                                    </p>
                                </div>
                                <div class="inner-col">
                                    <a target="_blank" href="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/">
                                        <div class="live-score"><?php echo $data['homescore'];?>:<?php echo $data['awayscore'];?></div>
                                        <p><?php echo date('m月d日 H:i');?></p>
                                    </a>
                                </div>
                                <div class="inner-col col-over">
                                    <div class="team-img">
                                        <a href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/" target="_blank">
                                            <img src="<?php echo PHOTO_PATH;?>team/<?php echo $data['awayteamid'];?>.jpg" alt="<?php echo $data['awayshortname'];?>" class="team-photo">
                                        </a>
                                    </div>
                                    <p>
                                        <a href="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/" target="_blank">
                                            <?php echo $data['awayname'];?>
                                        </a>
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
<?php $js = array('article_tab.js','ft_event.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js')?>
<?php include template("content", "footer"); ?>
