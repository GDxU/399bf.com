<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('list_pic_video.css','water.css', 'page.css')?>
<?php $nav_id = 9?>
<?php $category = get_category(7)?>
<?php include template('content', 'header_score'); ?>
<div class="pic-banner">
    <div class="select-wrap">
        <ul class="clearfix">
            <li class="nav-li"><a href="<?php echo APP_PATH;?>tuku/">图库</a></li>
            <?php $n=1; if(is_array($category['children'])) foreach($category['children'] AS $id => $data) { ?>
            <li class="nav-li <?php if(in_array($catid, $data['child_arr'])) { ?>active<?php } ?>">
                <a href="<?php echo APP_PATH;?><?php echo $data['catdir'];?>/"><?php echo $data['catname'];?></a>
            </li>
            <?php $n++;}unset($n); ?>
            <li class="nav-li"><a href="<?php echo APP_PATH;?>video/">体坛视频</a></li>
        </ul>
        <div class="tab-content">
            <?php $n=1; if(is_array($category['children'])) foreach($category['children'] AS $id => $data) { ?>
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
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f138398b28ce88c9368ac029b76046ea&action=lists&thumb=1&keywords=%24keywords&catid=%24catid&order=id+DESC&num=24&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 24;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('thumb'=>'1','keywords'=>$keywords,'catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('thumb'=>'1','keywords'=>$keywords,'catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
<div id="container" style="width: 1000px;margin: 0 auto;">
    <div id="main" role="main">
        <ul id="tiles">
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li>
                <a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>">
                    <?php if($n <= 10) { ?>
                    <img src="<?php echo $r['thumb'];?>"  alt="<?php echo $r['title'];?>" width="238">
                    <?php } else { ?>
                    <img src="<?php echo IMG_PATH;?>blank.gif" data-echo="<?php echo $r['thumb'];?>"  alt="<?php echo $r['title'];?>" width="238">
                    <?php } ?>
                    <p><i><?php echo str_cut($r['title'], 200, '...');?></i></p>
                </a>
            </li>
            <?php $n++;}unset($n); ?>

        </ul>
    </div>
</div>

<div class="page">
    <?php echo $pages;?>
</div>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php $js = array('jquery.wookmark.js','echo.min.js','list_pic_new.js')?>
<?php include template('content', 'footer'); ?>