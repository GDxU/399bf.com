<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('tool.css', 'list.css', 'page.css')?>
<?php if(in_array($catid, array(6,28,29,30))) { ?>
<?php $nav_id = 8?>
<?php } else { ?>
<?php $nav_id = 7?>
<?php } ?>
<?php $category = get_category(array(1, 2, 3, 6))?>
<?php include template('content', 'header_score'); ?>


<!--<div class="toolbar-container">-->
    <!--<div class="container">-->
        <!--<div class="row">-->
            <!--<ul class="toolbar clearfix">-->
                <!--&lt;!&ndash;<li class="nav-li"><a href="<?php echo APP_PATH;?>news/">最新</a></li>&ndash;&gt;-->
                <!--<?php $n=1; if(is_array($category)) foreach($category AS $id => $data) { ?>-->
                <!--<li class="nav-li <?php if(in_array($catid, $data['child_arr'])) { ?>active<?php } ?>">-->
                    <!--<a href="<?php echo APP_PATH;?><?php echo $data['catdir'];?>/"><?php echo $data['catname'];?></a>-->
                <!--</li>-->
                <!--<?php $n++;}unset($n); ?>-->
            <!--</ul>-->

            <!--<div class="tab-content">-->
                <!--<?php $n=1; if(is_array($category)) foreach($category AS $id => $data) { ?>-->
                <!--<?php if(in_array($catid, $data['child_arr'])) { ?>-->
                    <!--<ul class="inner-nav">-->
                        <!--<?php $n=1; if(is_array($data['children'])) foreach($data['children'] AS $key => $value) { ?>-->
                        <!--<li><a href="<?php echo APP_PATH;?><?php echo $value['catdir'];?>/" <?php if($catid == $key) { ?>class="active"<?php } ?>><?php echo $value['catname'];?></a></li>-->
                        <!--<?php $n++;}unset($n); ?>-->
                    <!--</ul>-->
                <!--<?php } ?>-->
                <!--<?php $n++;}unset($n); ?>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->

<div class="pic-banner">
    <div class="select-wrap">
        <ul class="clearfix">
            <?php $n=1; if(is_array($category)) foreach($category AS $id => $data) { ?>
            <li class="nav-li <?php if(in_array($catid, $data['child_arr'])) { ?>active<?php } ?>">
                <a href="<?php echo APP_PATH;?><?php echo $data['catdir'];?>/"><?php echo $data['catname'];?></a>
            </li>
            <?php $n++;}unset($n); ?>
        </ul>
        <div class="tab-content">
            <?php $n=1; if(is_array($category)) foreach($category AS $id => $data) { ?>
            <?php if(in_array($catid, $data['child_arr'])) { ?>
            <ul class="inner-nav">
                <?php $n=1; if(is_array($data['children'])) foreach($data['children'] AS $key => $value) { ?>
                <li><a href="<?php echo APP_PATH;?><?php echo $value['catdir'];?>/" <?php if($catid == $key) { ?>class="active"<?php } ?>><?php echo $value['catname'];?></a></li>
                <?php $n++;}unset($n); ?>
            </ul>
            <?php } ?>
            <?php $n++;}unset($n); ?>
        </div>
    </div>
</div>



<div class="main clearfix" style="margin-top: 15px">
    <div class="left">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0275d05a8718f720958d352d4b52467d&action=lists&catid=%24catid&keywords=%24keywords&num=9&thumb=1&moreinfo=1&hits=1&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 9;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'keywords'=>$keywords,'thumb'=>'1','moreinfo'=>'1','hits'=>'1','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'keywords'=>$keywords,'thumb'=>'1','moreinfo'=>'1','hits'=>'1','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <div class="article-list">
            <div class="title">
                <a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>">
                    <?php echo str_cut($r['title'], 120, '...');?>
                </a>
            </div>
           <div class="article-thumbnail">
               <a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>">
                   <img src="<?php echo get_thumb($r['thumb'], 350);?>" alt="<?php echo $r['title'];?>">
               </a>
           </div>
           <div class="article-detail">
               <div class="abstract">
                   <a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>" target="_blank">
                       <?php echo $r['description'];?>
                   </a>
               </div>
               <div class="prompt">
                   <?php echo date('Y-m-d H:i', $r['inputtime']);?>
               </div>
               <div class="article-label">
                   标签：
                   <?php $keywords = explode(' ',$r[keywords]);?>
                   <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                   <a class="orange" href="<?php echo APP_PATH;?>tag/<?php echo urlencode($keyword);?>/" target="_blank"><?php echo $keyword;?></a>
                   <?php $n++;}unset($n); ?>
               </div>
           </div>
       </div>
        <?php $n++;}unset($n); ?>
        <div class="page">
                <?php echo $pages;?>
        </div>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>
    <div class="right">
        <div class="side">
            <div class="title bg-event">
                赛事推荐<a class="more" href="<?php echo APP_PATH;?>zqscore/" target="_blank">更多</a>
            </div>
            <div class="list">
                <?php $hot_sql = get_hot_sql('', $catid);?>
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
                <ul class="clearfix">
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li class="list-item">
                        <div class="team-l">
                            <div class="img-wrap">
                                <a class="img-middle" target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $r['hometeamid'];?>/">
                                    <img src="<?php echo PHOTO_PATH;?>team/<?php echo $r['hometeamid'];?>.jpg" title="<?php echo $r['homeshortname'];?>" class="team-photo">
                                </a>
                            </div>
                            <div class="team-name">
                                <a title="<?php echo $r['homeshortname'];?>" target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $r['hometeamid'];?>/">
                                    <?php echo str_cut($r[homeshortname], 15);?>
                                </a>
                            </div>
                        </div>
                        <div class="team-m">
                            <a target="_blank" href="<?php echo APP_PATH;?>game/<?php echo $r['gameid'];?>/analyse/">
                            <div class="score clearfix">
                                <div class="score-l orange"><?php echo $r['homescore'];?></div>
                                <div class="score-m orange">：</div>
                                <div class="score-r orange"><?php echo $r['awayscore'];?></div>
                            </div>
                            <div class="time"><?php echo date('n月j日 G:i', $r[date]);?></div>
                            </a>
                            <!--<div class="match"><?php echo $CATEGORYS[$catid]['catname'];?></div>-->
                        </div>
                        <div class="team-r">
                            <div class="img-wrap">
                                <a class="img-middle" target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $r['awayteamid'];?>/">
                                    <img src="<?php echo PHOTO_PATH;?>team/<?php echo $r['awayteamid'];?>.jpg" title="<?php echo $r['awayshortname'];?>" class="team-photo">
                                </a>
                            </div>
                            <div class="team-name">
                                <a  title="<?php echo $r['awayshortname'];?>" target="_blank" href="<?php echo APP_PATH;?>team/<?php echo $r['awayteamid'];?>/">
                                    <?php echo str_cut($r[awayshortname], 15);?>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php $n++;}unset($n); ?>
                </ul>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
        <div class="side">
            <div class="title bg-news">
                相关资讯<a class="more" href="<?php echo $CATEGORYS[$relation_catid]['url'];?>" target="_blank">更多</a>
            </div>
            <div class="list">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2458dd9d6382ae8dd43f834e2d2f938f&action=lists&catid=%24relation_catid&num=10&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$relation_catid,'thumb'=>'1','order'=>'id DESC','limit'=>'10',));}?>
                <?php $data = array_chunk($data, 5);?>
                <?php $i = 1;?>
                <?php $n=1;if(is_array($data)) foreach($data AS $list) { ?>
                <ul class="tab-info-wrap clearfix" <?php if($i > 1) { ?>style="display:none;"<?php } ?>>
                    <?php $n=1;if(is_array($list)) foreach($list AS $r) { ?>
                    <li class="list-item" style="border: none;">
                        <div class="content clearfix">
                            <div class="img-container">
                                <a href="<?php echo $r['url'];?>" target="_blank">
                                    <img src="<?php echo get_thumb($r[thumb], 350);?>">
                                </a>
                            </div>
                            <div class="text">
                                <div class="title2">
                                    <a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title], 40, '...');?></a>
                                </div>
                                <?php echo str_cut($r[description], '65', '...');?>
                                <a class="orange" href="<?php echo $r['url'];?>" target="_blank">[详情]</a>
                            </div>
                        </div>
                    </li>
                    <?php $n++;}unset($n); ?>
                </ul>
                <?php ++$i;?>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                <?php if(count($data) > 1) { ?>
                <div class="tab-info-btn clearfix">
                    <ul class="fr">
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li class="info-list-btn <?php if($n==1) { ?>active<?php } ?>"></li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="side">
            <div class="title bg-pic">
                精彩图片<a class="more" href="<?php echo APP_PATH;?>tuku/" target="_blank">更多</a>
            </div>
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
<script>
    var IMG_PATH = '<?php echo IMG_PATH;?>';
</script>
<?php $js = array('article_tab.js', 'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js')?>
<?php include template('content', 'footer'); ?>