<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = ['bt_information.css'];?>
<?php include template('wap', 'wap_header'); ?>
<div class="content h100">
    <div class="buttons-tab">
        <a href="<?php echo WAP_PATH;?>zqbaobei/" class="<?php if($catid == 9) { ?>active<?php } ?> button" >足球宝贝</a>
        <a href="<?php echo WAP_PATH;?>lqbaobei/" class="<?php if($catid == 13) { ?>active<?php } ?> button" >篮球宝贝</a>
        <a href="<?php echo WAP_PATH;?>ttmt/" class="<?php if($catid == 32) { ?>active<?php } ?> button" >体坛美图</a>

    </div>
        <div class="tabs h100">
            <div class="tab active h100">
                <div class="h100" style="margin:5px 0;">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=69b43a58074a0ff43a2dddfd969405d0&action=lists&catid=%24catid&order=id+DESC&num=6&thumb=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','thumb'=>'1','limit'=>'6',));}?>
                    <div class="list-block media-list h100" id="main-img">
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <?php if($r['id'] != $id) { ?>
                        <div class="box oldbox">
                            <div class="pic">
                                <a href="<?php echo $r['url'];?>">
                                        <!--<img src="<?php echo $r['thumb'];?>"  alt="<?php echo $r['title'];?>">-->

                                        <img src="<?php echo IMG_PATH;?>blank.gif" data-echo="<?php echo $r['thumb'];?>" alt="<?php echo $r['title'];?>">

                                </a>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $n++;}unset($n); ?>
                    </div>
                    <div class="scroll-alert">加载中...</div>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
            </div>
        </div>
<?php include template('wap', 'footer_nav'); ?>

</div>
</div>
</div>
<script>
    var catid = <?php echo $catid;?>,
            page = 2;
</script>
<?php $js = ['waterfall.js','echo.js','list_picture.js'];?>

<?php include template('wap', 'wap_footer'); ?>