<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $nav_id = 1?>
<?php $css = array('ft_live_game.css')?>
<?php include template('wap', 'wap_header'); ?>
    <div class="content">
        <!-- 二级导航 -->
        <div class="buttons-tab">
            <a href="<?php echo WAP_PATH;?>zqscore/" class="active button">即时</a>
            <a href="<?php echo WAP_PATH;?>zqwanchang/" class="button close-popup">完场</a>
            <a href="<?php echo WAP_PATH;?>zqsaicheng/" class="button close-popup">下日</a>
            <a href="<?php echo WAP_PATH;?>zqevent/" class="button close-popup">资料</a>
            <a href="<?php echo WAP_PATH;?>zqodds/" class="button close-popup">指数</a>
        </div>

        <!-- 卡片 -->
        <div class="card-box">
            <div id="start-list">
                <div class="text-center">
                    <?php if(count($data_list['start'])) { ?>
                    <span class="list-title" id="start">正在进行的比赛</span>
                    <?php } ?>
                </div>
                <div class="list-container">
                    <?php $n=1;if(is_array($data_list['start'])) foreach($data_list['start'] AS $data) { ?>
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
                                    <span <?php if($data['homeyellowcard']) { ?>class="yellow-card"<?php } ?> data-key="homeyellowcard" data-style="yellow-card"><?php if($data['homeyellowcard']) { ?><?php echo $data['homeyellowcard'];?><?php } ?></span>
                                    <span <?php if($data['homeredcard']) { ?>class="red-card"<?php } ?> data-key="homeredcard" data-style="red-card"><?php if($data['homeredcard']) { ?><?php echo $data['homeredcard'];?><?php } ?></span>
                                    <span class="team-name home-name"><?php echo $data['homeshortname'];?></span>
                                </td>
                                <td>
                                    <span class="live-score">
                                        <span data-key="homescore" data-target="home-name" data-animate=".home-animate"><?php echo $data['homescore'];?></span>
                                        -
                                        <span data-key="awayscore" data-target="away-name" data-animate=".away-animate"><?php echo $data['awayscore'];?></span>
                                    </span>
                                </td>
                                <td class="text-left">
                                    <span class="team-name away-name"><?php echo $data['awayshortname'];?></span>
                                    <span <?php if($data['awayredcard']) { ?>class="red-card"<?php } ?> data-key="awayredcard" data-style="red-card"><?php if($data['awayredcard']) { ?><?php echo $data['awayredcard'];?><?php } ?></span>
                                    <span <?php if($data['awayyellowcard']) { ?>class="yellow-card"<?php } ?> data-key="awayyellowcard" data-style="yellow-card"><?php if($data['awayyellowcard']) { ?><?php echo $data['awayyellowcard'];?><?php } ?></span>
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

            <div id="ready-list">
                <div class="text-center">
                    <?php if(count($data_list['ready'])) { ?>
                    <span class="list-title" id="ready">未开始的比赛</span>
                    <?php } ?>
                </div>
                <div class="list-container">
                    <?php $n=1;if(is_array($data_list['ready'])) foreach($data_list['ready'] AS $data) { ?>
                    <div class="card" data-status-id="0" data-start-time="<?php if($data['tstarttime']) { ?><?php echo $data['tstarttime'];?><?php } else { ?><?php echo $data['date'];?><?php } ?>" data-game-id="<?php echo $data['gameid'];?>"
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
                                    <span <?php if($data['homeyellowcard']) { ?>class="yellow-card"<?php } ?> data-key="homeyellowcard" data-style="yellow-card"><?php if($data['homeyellowcard']) { ?><?php echo $data['homeyellowcard'];?><?php } ?></span>
                                    <span <?php if($data['homeredcard']) { ?>class="red-card"<?php } ?> data-key="homeredcard" data-style="red-card"><?php if($data['homeredcard']) { ?><?php echo $data['homeredcard'];?><?php } ?></span>
                                    <span class="team-name home-name"><?php echo $data['homeshortname'];?></span>
                                </td>
                                <td>
                                    <span class="live-score">
                                        <span data-key="homescore" data-target="home-name" data-animate=".home-animate"><?php echo $data['homescore'];?></span>
                                        -
                                        <span data-key="awayscore" data-target="away-name" data-animate=".away-animate"><?php echo $data['awayscore'];?></span>
                                    </span>
                                </td>
                                <td class="text-left">
                                    <span class="team-name away-name"><?php echo $data['awayshortname'];?></span>
                                    <span <?php if($data['awayredcard']) { ?>class="red-card"<?php } ?> data-key="awayredcard" data-style="red-card"><?php if($data['awayredcard']) { ?><?php echo $data['awayredcard'];?><?php } ?></span>
                                    <span <?php if($data['awayyellowcard']) { ?>class="yellow-card"<?php } ?> data-key="awayyellowcard" data-style="yellow-card"><?php if($data['awayyellowcard']) { ?><?php echo $data['awayyellowcard'];?><?php } ?></span>
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

            <div id="end-list">
                <div class="text-center">
                    <?php if(count($data_list['end'])) { ?>
                    <span class="list-title" id="end">结束的比赛</span>
                    <?php } ?>
                </div>
                <div class="list-container">
                    <?php $n=1;if(is_array($data_list['end'])) foreach($data_list['end'] AS $data) { ?>
                    <div class="card" data-action="link" data-url="<?php echo WAP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/">
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
                                    <span <?php if($data['homeyellowcard']) { ?>class="yellow-card"<?php } ?> data-key="homeyellowcard" data-style="yellow-card"><?php if($data['homeyellowcard']) { ?><?php echo $data['homeyellowcard'];?><?php } ?></span>
                                    <span <?php if($data['homeredcard']) { ?>class="red-card"<?php } ?> data-key="homeredcard" data-style="red-card"><?php if($data['homeredcard']) { ?><?php echo $data['homeredcard'];?><?php } ?></span>
                                    <span class="team-name home-name"><?php echo $data['homeshortname'];?></span>
                                </td>
                                <td>
                                    <span class="live-score">
                                        <span data-key="homescore" data-target="home-name" data-animate=".home-animate"><?php echo $data['homescore'];?></span>
                                        -
                                        <span data-key="awayscore" data-target="away-name" data-animate=".away-animate"><?php echo $data['awayscore'];?></span>
                                    </span>
                                </td>
                                <td class="text-left">
                                    <span class="team-name away-name"><?php echo $data['awayshortname'];?></span>
                                    <span <?php if($data['awayredcard']) { ?>class="red-card"<?php } ?> data-key="awayredcard" data-style="red-card"><?php if($data['awayredcard']) { ?><?php echo $data['awayredcard'];?><?php } ?></span>
                                    <span <?php if($data['awayyellowcard']) { ?>class="yellow-card"<?php } ?> data-key="awayyellowcard" data-style="yellow-card"><?php if($data['awayyellowcard']) { ?><?php echo $data['awayyellowcard'];?><?php } ?></span>
                                    <span class="gray">
                                        <?php if(isset($data['awayrank'])) { ?>
                                        [<?php echo $data['awayrank'];?>]
                                        <?php } ?>
                                    </span>
                                    <span class="away-animate"></span>
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
        </div>
        <!-- 卡片 end -->


        <?php include template('wap', 'footer_nav'); ?>


    </div>

</div>
</div>

<?php $js = array('ft_live_game.js')?>
<?php include template('wap', 'wap_footer'); ?>
