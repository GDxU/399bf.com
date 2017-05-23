<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = ['bt_information.css'];?>
<?php include template('wap', 'wap_header'); ?>
<div class="content h100">
    <div class="buttons-tab">
        <?php if($nav_id == 3) { ?>
        <a href="<?php echo WAP_PATH;?>zcfx/" class="<?php if($catid == 1) { ?>active<?php } ?> button" >足彩分析</a>
        <a href="<?php echo WAP_PATH;?>zcyc/" class="<?php if($catid == 2) { ?>active<?php } ?> button" >足彩预测</a>
        <a href="<?php echo WAP_PATH;?>zctj/" class="<?php if($catid == 3) { ?>active<?php } ?> button" >足彩推荐</a>
        <?php } else { ?>
        <a href="<?php echo WAP_PATH;?>wdls/" class="<?php if($catid == 28) { ?>active<?php } ?> button" >五大联赛</a>
        <a href="<?php echo WAP_PATH;?>sjzt/" class="<?php if($catid == 30) { ?>active<?php } ?> button" >世界足坛</a>
        <a href="<?php echo WAP_PATH;?>cnzt/" class="<?php if($catid == 29) { ?>active<?php } ?> button" >中国足坛</a>
        <?php } ?>
    </div>

        <div class="tabs h100">
            <div class="tab active h100">
                <div style="margin: -25px 0;" class="h100">
                    <div class="list-block media-list h100">
                        <ul class="list-container h100 scroll-wrap">
                            <?php $n=1;if(is_array($list)) foreach($list AS $r) { ?>
                            <li>
                                <a href="<?php echo $r['url'];?>" class="item-link item-content pd">
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
                                            <span class=""><?php echo date('Y-m-d H:i', $r['inputtime']);?></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php $n++;}unset($n); ?>
                        </ul>
                        <div class="scroll-alert">正在加载...</div>
                    </div>

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
<?php $js = ['loading.js'];?>
<?php include template('wap', 'wap_footer'); ?>
