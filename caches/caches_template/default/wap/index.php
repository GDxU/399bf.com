<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = ['index.css'];?>
<?php include template('wap','wap_header'); ?>

            <div class="content">

                <!-- banner       -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=bf29c718ae2138d83495bd3714637294&action=position&posid=58&num=5&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'58','order'=>'listorder DESC','limit'=>'5',));}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <div class="swiper-slide">
                            <a href="<?php echo url_replace($r['url'], WAP_PATH);?>" class="banner-img">
                                <img src="<?php echo $r['thumb'];?>" alt="">
                            </a>
                            <div class="banner-info">
                                <div class="banner-title"><?php echo $r['title'];?></div>
                                <p><?php echo str_cut($r['description'], '120', '...');?></p>
                            </div>
                        </div>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- banner end -->

                <!-- 即时赛事 -->
                <div class="live-game">
                    <div class="inner-title live-game">
                        <span class="orange">即时赛事</span>

                        <a href="<?php echo WAP_PATH;?>zqscore/" class="more pull-right">更多</a>
                    </div>
                    <!-- 卡片 -->
                    <div class="card-box">
                        <div id="start-list">
                            <?php $n=1;if(is_array(array_slice($live_game_data,0,3))) foreach(array_slice($live_game_data,0,3) AS $data) { ?>
                            <div class="card begin" data-status="<?php echo $data['status'];?>" data-game-id="<?php echo $data['gameid'];?>" data-start-time="<?php if($data['tstarttime']) { ?><?php echo $data['tstarttime'];?><?php } else { ?><?php echo $data['date'];?><?php } ?>" ajax-status-tag="true"
                                 data-action="link" data-url="<?php echo WAP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/">
                                    <a href="<?php echo WAP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/" class="gray btn-link fixed-right">
                                        <i class="icon icon-right"></i>
                                    </a>

                                    <table class="table">
                                        <tr>
                                            <th width="40%" class="text-left">
                                                <span class="card-title pull-left"><?php echo $data['competitionshortname'];?></span>
                                                <time class="gray time"><?php echo date('H:i', $data['date']);?></time>
                                            </th>
                                            <th>
                                                <span class="red state" data-key="text"><?php echo $data['status_text'];?></span>
                                            </th>
                                            <th width="40%">&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <span class="home-animate"></span>
                                                <span class="gray">
                                                    <?php if(isset($data['homerank'])) { ?>
                                                    [<?php echo $data['homerank'];?>]
                                                    <?php } ?>
                                                </span>
                                                <span <?php if(!is_null($data['homeyellowcard']) && $data['homeyellowcard'] != 0) { ?>class="yellow-card"<?php } ?> data-key="homeyellowcard"><?php if($data['homeyellowcard']) { ?><?php echo $data['homeyellowcard'];?><?php } ?></span>
                                                <span <?php if(!is_null($data['homeredcard']) && $data['homeredcard'] != 0) { ?>class="red-card"<?php } ?> data-key="homeredcard"><?php if($data['homeredcard']) { ?><?php echo $data['homeredcard'];?><?php } ?></span>
                                                <span class="team-name home-name"><?php echo mb_substr($data['homeshortname'], 0, 6, 'utf-8');?></span>
                                            </td>
                                            <td>
                                                <span class="live-score">
                                                    <span data-key="homescore" data-target="home-name" data-animate=".home-animate"><?php echo $data['homescore'];?></span>
                                                    -
                                                    <span data-key="awayscore" data-target="away-name" data-animate=".away-animate"><?php echo $data['awayscore'];?></span>
                                                </span>
                                            </td>
                                            <td class="text-left">
                                                <span class="team-name away-name"><?php echo mb_substr($data['awayshortname'], 0, 6, 'utf-8');?></span>
                                                <span <?php if(!is_null($data['awayredcard']) && $data['awayredcard'] != 0) { ?>class="red-card"<?php } ?> data-key="awayredcard"><?php if($data['awayredcard']) { ?><?php echo $data['awayredcard'];?><?php } ?></span>
                                                <span <?php if(!is_null($data['awayyellowcard']) && $data['awayyellowcard'] != 0) { ?>class="yellow-card"<?php } ?> data-key="awayyellowcard"><?php if($data['awayyellowcard']) { ?><?php echo $data['awayyellowcard'];?><?php } ?></span>
                                                <span class="gray">
                                                    <?php if(isset($data['awayrank'])) { ?>
                                                    [<?php echo $data['awayrank'];?>]
                                                    <?php } ?>
                                                </span>
                                                <span class="away-animate">
                                                </span>

                                            </td>
                                        </tr>
                                        <?php if(isset($data['homecorner']) && isset($data['awaycorner'])) { ?>
                                        <tr class="fd gray">
                                            <td>&nbsp;</td>
                                            <td>
                                                角：<span data-key="homecorner"><?php echo $data['homecorner'];?></span> - <span data-key="awaycorner"><?php echo $data['awaycorner'];?></span>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                            </div>
                            <?php $n++;}unset($n); ?>
                        </div>
                    </div>
                    <!-- 卡片 end -->
                </div>

                <!-- news -->
                <div class="news">
                    <div class="inner-title news">
                        <a href="<?php echo WAP_PATH;?>zcfx/" class="more pull-right">更多</a>
                    </div>
                    <div class="buttons-tab tab-nav">
                        <a href="#ft_tuijian" class="tab-link button active">足彩推荐</a>
                        <a href="#ft_yuce" class="tab-link button">足彩预测</a>
                        <a href="#ft_fenxi" class="tab-link button">足彩分析</a>
                    </div>
                    <div class="tabs">
                        <div id="ft_fenxi" class="tab">
                            <ul class="news-list">
                                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=7570ba78c7d64704deaf26b5caa4bbec&action=lists&catid=1&num=5&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'1','thumb'=>'1','order'=>'id DESC','limit'=>'5',));}?>
                                <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
                                <li class="news-item">
                                    <a href="<?php echo url_replace($val['url'], WAP_PATH);?>">
                                        <img src="<?php echo get_thumb($val['thumb'], 500);?>" alt="" class="pull-left list-pic">
                                        <div class="list-detail">
                                            <div class="list-title"><?php echo $val['title'];?></div>
                                            <p class="list-info"><?php echo str_cut($val['description'], '150', '...');?></p>
                                            <div class="list-fd">
                                                <time><?php echo date('Y-m-d H:i', $val['inputtime']);?></time>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        </ul>
                    </div>
                    <div id="ft_yuce" class="tab">
                            <ul class="news-list">
                                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=db86a3d7a1b82fb20acb93e6370d07fc&action=lists&catid=2&num=5&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'2','thumb'=>'1','order'=>'id DESC','limit'=>'5',));}?>
                                <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
                                <li class="news-item">
                                    <a href="<?php echo url_replace($val['url'], WAP_PATH);?>">
                                        <img src="<?php echo get_thumb($val['thumb'], 500);?>" alt="" class="pull-left list-pic">
                                        <div class="list-detail">
                                            <div class="list-title"><?php echo $val['title'];?></div>
                                            <p class="list-info"><?php echo str_cut($val['description'], '150', '...');?></p>
                                            <div class="list-fd">
                                                <time><?php echo date('Y-m-d H:i', $val['inputtime']);?></time>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $n++;}unset($n); ?>
                                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            </ul>
                        </div>
                        <div id="ft_tuijian" class="tab active">
                            <ul class="news-list">
                                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=853320a73e8f4a47de23c00f63ef2bfd&action=lists&catid=3&num=5&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'3','thumb'=>'1','order'=>'id DESC','limit'=>'5',));}?>
                                <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
                                <li class="news-item">
                                    <a href="<?php echo url_replace($val['url'], WAP_PATH);?>">
                                        <img src="<?php echo get_thumb($val['thumb'], 500);?>" alt="" class="pull-left list-pic">
                                        <div class="list-detail">
                                            <div class="list-title"><?php echo $val['title'];?></div>
                                            <p class="list-info"><?php echo str_cut($val['description'], '150', '...');?></p>
                                            <div class="list-fd">
                                                <time><?php echo date('Y-m-d H:i', $val['inputtime']);?></time>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $n++;}unset($n); ?>
                                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php include template('wap', 'footer_nav'); ?>


            </div>

        </div>
        
    </div>




<?php $js = ['index.js'];?>


<?php include template('wap','wap_footer'); ?>