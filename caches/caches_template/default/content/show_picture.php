<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('list_pic_video.css', 'carousel.css','water.css')?>
<?php include template('content', 'header_score'); ?>
    <div class="crumbs">
        <i class="crumbs-icon"></i>当前位置：
        <a href="<?php echo APP_PATH;?>" class="orange">首页</a>&gt;
        <?php echo catpos($catid,'&gt;');?>
        <?php echo $title;?>
    </div>
    <div class="nav">
        <i class="icon-nav-pic"></i>
        <div class="title-wrap">
            <div class="title"><?php echo $title;?></div>
            <div class="tip">
                <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                <a href="<?php echo APP_PATH;?>tag/<?php echo urlencode($keyword);?>/" class="tip-b orange" target="_blank"><?php echo $keyword;?></a>
                <?php $n++;}unset($n); ?>
            </div>
        </div>
    </div>
    <div class="carousel">
        <!--轮播图start-->
        <div class="banner">
            <div class="carousel-index"><span id="index" class="orange">1</span>/<?php echo count($pictureurls);?></div>
            <div class="large_left_btn"></div>
            <div class="large_right_btn"></div>
            <div class="large_box">
                <div class="img-mask"></div>
                <ul>
                    <?php $n=1;if(is_array($pictureurls)) foreach($pictureurls AS $data) { ?>
                    <li style="display: none;">
                        <div class="large_img">
                            <img src="<?php echo $data['url'];?>" alt="<?php echo $title;?>">
                            <div class="text"><?php echo $data['description'];?></div>
                        </div>
                    </li>
                    <?php $n++;}unset($n); ?>
                </ul>
            </div>
            <div class="small_box">
                <span class="cbtn left_btn"><i class="icon-angle-left"></i></span>
                <div class="small_list">
                    <ul style="width: 720px; margin-left: 0;">
                        <?php $n=1;if(is_array($pictureurls)) foreach($pictureurls AS $data) { ?>
                        <li <?php if($n==1) { ?>class="on"<?php } ?>>
                            <img src="<?php echo get_thumb($data['url'], 150);?>" alt="<?php echo $data['alt'];?>">
                            <div class="bun_bg"></div>
                        </li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                </div>
                <span class="cbtn right_btn"><i class="icon-angle-right"></i></span>
            </div>
        </div>
        <!--轮播图end-->
    </div>
    <div class="content clearfix">
        <div class="content-left">
            <div class="content-title">
                    <span class="icon-title bg-new" style="margin-top:5px;"></span>
                    焦点资讯
            </div>
            <ul class="nav-tabs" id="focusInfo">
                <li class="active"><a href="#zcfx" data-toggle="tab">足彩分析</a></li>
                <li><a href="#zcyc" data-toggle="tab">足彩预测</a></li>
                <li><a href="#zctj" data-toggle="tab">足彩推荐</a></li>
                <li><a href="#xwss" data-toggle="tab">新闻赛事</a></li>
            </ul>
            <div class="tab-content">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2e8527803a26291e72ad45deb112f362&action=lists&catid=1&num=6&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'1','thumb'=>'1','order'=>'id DESC','limit'=>'6',));}?>
                <div id="zcfx" class="tab-pane fade in active">
                     <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <div class="data-news">
                        <div class="data-title">
                            <span class="hot">热</span>
                            <a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>">
                                 <?php echo $r['title'];?>
                            </a>
                        </div>
                        <div class="news-main">
                            <div class="news-thumbnail">
                                <a href="" title="" target="_blank">
                                     <img src="<?php echo get_thumb($r['thumb'], 350);?>" alt="<?php echo $r['title'];?>">
                                </a>
                            </div>
                            <div class="news-text">
                                <div class="news-abstract">
                                    <?php echo str_cut($r['description'], 185, '...');?><a target="_blank" href="" style="color: #00a0e9;">详情</a>
                                </div>
                                <div class="news-date"><i class="mr10 icon-calendar"></i><?php echo date('m月d日 H:i', $r['inputtime']);?></div>
                                <div class="news-tip">
                                    <?php $keywords = explode(' ', $r['keywords']);?>
                                    <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                                     <a target="_blank" href="<?php echo APP_PATH;?>tag/<?php echo urlencode($keyword);?>/" class="orange mr5"><?php echo $keyword;?></a>
                                    <?php $n++;}unset($n); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php $n++;}unset($n); ?>
                </div>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=abbc34358b2e646edb6644ed899260da&action=lists&catid=2&num=6&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'2','thumb'=>'1','order'=>'id DESC','limit'=>'6',));}?>
                <div id="zcyc" class="tab-pane fade ">
                     <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <div class="data-news">
                        <div class="data-title">
                            <span class="hot">热</span>
                            <a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>">
                                 <?php echo $r['title'];?>
                            </a>
                        </div>
                        <div class="news-main">
                            <div class="news-thumbnail">
                                <a href="" title="" target="_blank">
                                     <img src="<?php echo get_thumb($r['thumb'], 350);?>" alt="<?php echo $r['title'];?>">
                                </a>
                            </div>
                            <div class="news-text">
                                <div class="news-abstract">
                                    <?php echo str_cut($r['description'], 185, '...');?><a target="_blank" href="" style="color: #00a0e9;">详情</a>
                                </div>
                                <div class="news-date"><i class="mr10 icon-calendar"></i><?php echo date('m月d日 H:i', $r['inputtime']);?></div>
                                <div class="news-tip">
                                    <?php $keywords = explode(' ', $r['keywords']);?>
                                    <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                                     <a target="_blank" href="<?php echo APP_PATH;?>tag/<?php echo urlencode($keyword);?>/" class="orange mr5"><?php echo $keyword;?></a>
                                    <?php $n++;}unset($n); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php $n++;}unset($n); ?>
                </div>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=be29261b9dad6f7c7d2c99b23ee2012e&action=lists&catid=3&num=6&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'3','thumb'=>'1','order'=>'id DESC','limit'=>'6',));}?>
                <div id="zctj" class="tab-pane fade ">
                     <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <div class="data-news">
                        <div class="data-title">
                            <span class="hot">热</span>
                            <a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>">
                                 <?php echo $r['title'];?>
                            </a>
                        </div>
                        <div class="news-main">
                            <div class="news-thumbnail">
                                <a href="" title="" target="_blank">
                                     <img src="<?php echo get_thumb($r['thumb'], 350);?>" alt="<?php echo $r['title'];?>">
                                </a>
                            </div>
                            <div class="news-text">
                                <div class="news-abstract">
                                    <?php echo str_cut($r['description'], 185, '...');?><a target="_blank" href="" style="color: #00a0e9;">详情</a>
                                </div>
                                <div class="news-date"><i class="mr10 icon-calendar"></i><?php echo date('m月d日 H:i', $r['inputtime']);?></div>
                                <div class="news-tip">
                                    <?php $keywords = explode(' ', $r['keywords']);?>
                                    <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                                     <a target="_blank" href="<?php echo APP_PATH;?>tag/<?php echo urlencode($keyword);?>/" class="orange mr5"><?php echo $keyword;?></a>
                                    <?php $n++;}unset($n); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php $n++;}unset($n); ?>
                </div>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=59741e934067849d696b43dd6c036265&action=lists&catid=6&num=6&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'6','thumb'=>'1','order'=>'id DESC','limit'=>'6',));}?>
                <div id="xwss" class="tab-pane fade ">
                     <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <div class="data-news">
                        <div class="data-title">
                            <span class="hot">热</span>
                            <a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>">
                                 <?php echo $r['title'];?>
                            </a>
                        </div>
                        <div class="news-main">
                            <div class="news-thumbnail">
                                <a href="" title="" target="_blank">
                                     <img src="<?php echo get_thumb($r['thumb'], 350);?>" alt="<?php echo $r['title'];?>">
                                </a>
                            </div>
                            <div class="news-text">
                                <div class="news-abstract">
                                    <?php echo str_cut($r['description'], 185, '...');?><a target="_blank" href="" style="color: #00a0e9;">详情</a>
                                </div>
                                <div class="news-date"><i class="mr10 icon-calendar"></i><?php echo date('m月d日 H:i', $r['inputtime']);?></div>
                                <div class="news-tip">
                                    <?php $keywords = explode(' ', $r['keywords']);?>
                                    <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                                     <a target="_blank" href="<?php echo APP_PATH;?>tag/<?php echo urlencode($keyword);?>/" class="orange mr5"><?php echo $keyword;?></a>
                                    <?php $n++;}unset($n); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php $n++;}unset($n); ?>
                </div>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
        <div class="content-right">
            <div class="side side_bt">
                <h1 class="title pdT10">
                    <span class="icon-title bg-pic"></span>精彩图片
                    <a class="more" href="<?php echo APP_PATH;?>tuku/" target="_blank">更多</a>
                </h1>

                <div class="pd height422">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=1689b281f49f2342a5d4e2f9a7ceb7ef&action=lists&catid=%24catid&num=18&thumb=1&order=id+DESC&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('catid'=>$catid,'thumb'=>'1','order'=>'id DESC',)).'1689b281f49f2342a5d4e2f9a7ceb7ef');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'thumb'=>'1','order'=>'id DESC','limit'=>'18',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
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
                            <div class="pic-des"><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></div>
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
            <div class="side">
                <h1 class="title pdT10">
                        <span class="icon-title icon-jiangbei"> </span>
                    最新赛事<a class="more" href="<?php echo APP_PATH;?>zqscore/" target="_blank">更多</a>
                </h1>
                <div class="m-list" id="match_list">
                    <?php $hot_sql = get_hot_sql();?>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=f89e6ebbbd7d91a2afe30ab65f215509&sql=%24hot_sql&dbsource=sportsdt&num=4\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model(array (
  'sportsdt' => 
  array (
    'hostname' => 'localhost:3306',
    'database' => 'sportsdt.com',
    'db_tablepre' => 'ft_',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'debug' => 0,
    'pconnect' => 0,
    'autoconnect' => 0,
  ),
), 'sportsdt');$r = $get_db->sql_query("$hot_sql LIMIT 4");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <ul>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li class="list-item clearfix">
                            <div class="inner-col col-over">
                                <div class="team-img">
                                    <a href="<?php echo APP_PATH;?>team/<?php echo $r['hometeamid'];?>/" target="_blank">
                                        <img src="<?php echo PHOTO_PATH;?>team/<?php echo $r['hometeamid'];?>.jpg" alt="<?php echo $r['homeshortname'];?>" class="team-photo">
                                    </a>
                                </div>
                                <p>
                                    <a href="<?php echo APP_PATH;?>team/<?php echo $r['hometeamid'];?>/" target="_blank"><?php echo $r['homeshortname'];?>
1111                                    </a>
                                </p>
                            </div>
                            <div class="inner-col">
                                <a target="_blank" href="<?php echo APP_PATH;?>game/<?php echo $r['gameid'];?>/analyse/">
                                    <div class="live-score"><?php echo $r['homescore'];?>:<?php echo $r['awayscore'];?></div>
                                    <p><?php echo date('m月d日 H:i', $r['date']);?></p>
                                </a>
                            </div>
                            <div class="inner-col col-over">
                                <div class="team-img">
                                    <a href="<?php echo APP_PATH;?>team/<?php echo $r['awayteamid'];?>/" target="_blank">
                                        <img src="<?php echo PHOTO_PATH;?>team/<?php echo $r['awayteamid'];?>.jpg" alt="<?php echo $r['awayshortname'];?>" class="team-photo">
                                    </a>
                                </div>
                                <p>
                                    <a href="<?php echo APP_PATH;?>team/<?php echo $r['awayteamid'];?>/" target="_blank">
                                        <?php echo $r['awayshortname'];?>
                                    </a>
                                </p>
                            </div>
                        </li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
            </div>

        </div>
    </div>
<script>
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>
<?php $js = array('carousel.min.js', 'show_picture.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js','jquery.wookmark.js','show_pic_layout.js','article_tab.js')?>
<?php include template('content', 'footer'); ?>