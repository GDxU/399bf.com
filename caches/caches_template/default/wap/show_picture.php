<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = ['bt_information.css'];?>
<?php include template('wap', 'wap_header'); ?>

<header class="bar bar-nav border-1px">
    <a class="icon icon-left pull-left " onclick="javascript:history.back(-1);"></a>
    <h1 class="title"><a href="<?php echo url_replace($CAT['url'],WAP_PATH);?>"><?php echo $CAT['catname'];?></a></h1>
</header>

<div class="content">
    
    <div class="content-block mgt1">
        <div class="detail-title" >
            <h2><?php echo $title;?></h2>
            
        </div>
        <div class="detail-desc"><?php echo $inputtime;?>&nbsp;来自：<?php echo $copyfrom;?></div>
        <div class="detail-content" id="detail-content">
            <?php $n=1; if(is_array($pics)) foreach($pics AS $key => $r) { ?>
             <img src="<?php echo get_thumb($r['url'], 300);?>" alt="<?php echo $r['alt'];?>" data-index="<?php echo $key;?>">
            <?php $n++;}unset($n); ?>
        </div>
    </div>
     <div class="list-block media-list">
        <div class="tagMain">
            <div class="tag">标签：
                <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                <a href="<?php echo WAP_PATH;?>tag/<?php echo urlencode($keyword);?>/"><span class="tagContent"><?php echo $keyword;?></span></a>
                <?php $n++;}unset($n); ?>
            </div>
            <div class="relatedInfo">相关资讯</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3555f1527c928d27c83eaaa4c003284f&action=lists&catid=%24catid&order=id+DESC&num=4&thumb=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','thumb'=>'1','limit'=>'4',));}?>
            <ul>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <?php if($r['id'] != $id) { ?>
                <li class="border-1px">
                    <a href="<?php echo url_replace($r['url'], WAP_PATH);?>" class="item-link item-content pd ">
                        <div class="item-media">
                            <img src="<?php echo get_thumb($r['thumb'], 350);?>" alt="<?php echo $r['title'];?>">
                        </div>
                        <div class="item-inner">
                            <div class="item-title-row">
                                <div class="item-title">
                                    <?php echo $r['title'];?>
                                </div>
                            </div>
                            <div class="item-text">
                                <?php echo $r['description'];?>
                            </div>
                            <div class="list_desc">
                                <span><?php echo date('Y-m-d H:i', $r['inputtime']);?></span>
                            </div>
                        </div>
                    </a>
                </li>
                <?php } ?>
                <?php $n++;}unset($n); ?>
            </ul>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
    </div>
    <?php include template('wap', 'footer_nav'); ?>
</div>
<div class="img-mask" id="img-mask">
</div>

<?php $js = ['show_picture.js'];?>
<?php include template('wap', 'wap_footer'); ?>