<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $css = array('banner.css', 'index.css')?>
<?php $nav_id = 1?>
<?php include template('content', 'header_score'); ?>
<!-- banner section-->
<section class="section-banner">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 pdL0 pdR0">
			
				<!--banner-->
                <div class="banner" id="banner">

                    <div class="banner-bd">

                        <a href="#" target="_blank">
                            <img src="" data-name="banner-img">
                        </a>

                        <div class="banner-title">
                            
                            <h1><a href="#" name="title" target="_blank"></a></h1>
                            <p><a href="#" name="titleInfo" target="_blank"></a> </p>
                        </div>

                        <a href="javascript:;" class="banner-btn prev">
                        	<i class="icon-chevron-left icon-3x"></i>
                        </a>
                        <a href="javascript:;" class="banner-btn next">
                        	<i class="icon-chevron-right icon-3x"></i>
                        </a>

                    </div>


                    <div class="banner-fd">
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=22a67fd5d5664bf2f0642e000a6299f5&action=position&posid=1&num=5&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','order'=>'listorder DESC','limit'=>'5',));}?>
                        <ul class="clearfix">
							<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                            <li class="active xBanner-item">
                                <img src="<?php echo get_thumb($r['thumb'], 350);?>" data-title="<?php echo $r['title'];?>" data-title-info="<?php echo str_cut($r['description'], '120', '...');?>" data-img = "<?php echo $r['thumb'];?>" data-link="<?php echo $r['url'];?>">
                            </li>
							<?php $n++;}unset($n); ?>
                        </ul>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </div>
                </div>
                <!--banner end-->

            </div>

			<div class="col-sm-4 pdR0">

				<div class="sideNew">
					<div class="title pdT10">
						<span class="icon-title icon-king"></span>
						赢盘攻略
						<a target="_blank" href="<?php echo APP_PATH;?>zcfx/" class="more">更多</a>
					</div>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=1c344412db32df29efe300eadd260532&action=lists&catid=19&num=5&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'19','order'=>'listorder DESC','limit'=>'5',));}?>
					<ul>
						<?php $first = array_shift($data)?>
						<li class="new-item">
							<h2 class="new-title nowrap">
								<a href="<?php echo APP_PATH;?>ypfxf/" target="_blank"><i class="icon-hot">亚盘分析</i></a>
								<a href="<?php echo $first['url'];?>" target="_blank" title="<?php echo $first['title'];?>">
									<?php echo str_cut($first['title'], '42', '...');?>
								</a>
							</h2>
							<ul>
							<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
								<li class="nowrap"><a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r['title'], '68', '...');?></a></li>
							<?php $n++;}unset($n); ?>
							<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
							</ul>
						</li>
					</ul>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3bc1b6b8f342ae3be7f571e2a147f380&action=lists&catid=20&num=5&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'20','order'=>'listorder DESC','limit'=>'5',));}?>
					<ul>
						<?php $first = array_shift($data)?>
						<li class="new-item">
							<h2 class="new-title nowrap">
								<a href="<?php echo APP_PATH;?>opfxjq/" target="_blank"><i class="icon-hot">欧赔分析</i></a>
								<a href="<?php echo $first['url'];?>" target="_blank" title="<?php echo $first['title'];?>">
									<?php echo str_cut($first['title'], '42', '...');?>
								</a>
							</h2>
							<ul>
								<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
								<li class="nowrap"><a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r['title'], '68', '...');?></a></li>
								<?php $n++;}unset($n); ?>
								<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
							</ul>
						</li>
					</ul>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e7b13f1a79b1673100e66c9d1e35878c&action=lists&catid=21&num=5&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'21','order'=>'listorder DESC','limit'=>'5',));}?>
					<ul>
						<?php $first = array_shift($data)?>
						<li class="new-item">
							<h2 class="new-title nowrap">
								<a href="<?php echo APP_PATH;?>ephyp/" target="_blank"><i class="icon-hot">欧赔和亚盘</i></a>
								<a href="<?php echo $first['url'];?>" target="_blank" title="<?php echo $first['title'];?>">
									<?php echo str_cut($first['title'], '42', '...');?>
								</a>
							</h2>
							<ul>
								<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
								<li class="nowrap"><a href="<?php echo $r['url'];?>" target="_blank" title="<?php echo $r['title'];?>"><?php echo str_cut($r['title'], '68', '...');?></a></li>
								<?php $n++;}unset($n); ?>
								<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
							</ul>
						</li>
					</ul>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</div>
			</div>
		</div>

	</div>
</section>

<!-- main body -->
<section>
    <div class="container">

		<!-- 预测 -->
 		<div class="row ">

 			<div class="section-item col-sm-8 pdL0 pdR0">

					<h1 class="title pdT10">
						<span class="icon-jicai icon-title">
						</span>
						即时赛事
						<a target="_blank" href="<?php echo APP_PATH;?>zqscore/" class="more">更多</a>
					</h1>

					<?php $n=1;if(is_array($live_game_data)) foreach($live_game_data AS $data) { ?>
					<div class="content" data-action="live-game-stats" data-game-id="<?php echo $data['gameid'];?>" data-minute="<?php echo $data['minute'];?>">
						<p class="hint"><?php echo $data['competitionshortname'];?> <?php echo date('m-d H:i', $data['date']);?> <?php echo $data['homeshortname'];?> VS <?php echo $data['awayshortname'];?> </p>
						<ul class="clearfix">
							<li class="jicai-item" data-action="link" data-url="<?php echo APP_PATH;?>team/<?php echo $data['hometeamid'];?>/">
								<div class="jicai-col">
									<div class="team-img">
										<img src="<?php echo PHOTO_PATH;?>team/<?php echo $data['hometeamid'];?>.jpg" alt="<?php echo $data['homeshortname'];?>" class="team-photo">
									</div>
								</div>

								<div class="jicai-col tip">
									<div data-stats="event" data-type="1" class="stats-event"></div>
									<p class="team-name"><?php echo $data['homeshortname'];?></p>
								</div>
								<div class="arrowtip"></div>
							</li>
							<li class="jicai-item live-score" data-action="link" data-url="<?php echo APP_PATH;?>game/<?php echo $data['gameid'];?>/analyse/">
								<div class="jicai-m">
									<p>比分</p>
									<span class="jicai-span" data-stats="homescore"><?php echo $data['homescore'];?></span>
									<span class="jicai-span">：</span>
									<span class="jicai-span" data-stats="awayscore"><?php echo $data['awayscore'];?></span>
								</div>
								<div class="arrowtip"></div>
							</li>
							<li class="jicai-item" data-action="link" data-url="<?php echo APP_PATH;?>team/<?php echo $data['awayteamid'];?>/">
								<div class="jicai-col">
									<div class="team-img">
										<img src="<?php echo PHOTO_PATH;?>team/<?php echo $data['awayteamid'];?>.jpg" alt="<?php echo $data['awayshortname'];?>" class="team-photo">
									</div>
								</div>
								<div class="jicai-col tip">
									<div data-stats="event" data-type="2" class="stats-event"></div>
									<p class="team-name"><?php echo $data['awayshortname'];?></p>
								</div>
								<div class="arrowtip"></div>
							</li>
						</ul>
					</div>
					<?php $n++;}unset($n); ?>


 			</div>
 			<div class=" col-sm-4 pdR0 side">
				<div class="section-item">
					<h1 class="title pdT10">
						<span class="icon-yuce icon-title">
						</span>
						每日足彩预测
						<a href="<?php echo APP_PATH;?>zcyc/" target="_blank" class="more">更多</a>
					</h1>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b262b194c1dcb6c8296e485c1f674d81&action=lists&catid=24&thumb=1&num=5&order=%60id%60+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'24','thumb'=>'1','order'=>'`id` DESC','limit'=>'5',));}?>
					<ul class="new-list">
						<?php $n=1;if(is_array($data)) foreach($data AS $value) { ?>
						<li class="new-index clearfix">
							<a href="<?php echo $value['url'];?>" class="new-pic" target="_blank" title="<?php echo $value['title'];?>">
								<img src="<?php echo get_thumb($value['thumb'], 150);?>" alt="<?php echo $value['title'];?>">
							</a>
							<div class="new-info">
								<div class="new-title">
									<a href="<?php echo $value['url'];?>" target="_blank" title="<?php echo $value['title'];?>">
										<p><?php echo str_cut($value['title'], '90', '...');?></p>
									</a>
								</div>
								<div class="new-detail">
									<p class="nowrap"><?php echo str_cut($value['description'], '48', '...');?></p>
								</div>
							</div>
						</li>
						<?php $n++;}unset($n); ?>
					</ul>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</div>
 			</div>

 		</div>

		<!--足彩单场分析-->
		<div class="row">

			<div class="section-item col-sm-8 pdL0 pdR0">
				<h1 class="title pdT10">
					<span class="icon-fenxi icon-title">
					</span>
					足彩单场分析
					<a target="_blank" href="<?php echo APP_PATH;?>zcdcfx/" class="more">更多</a>
				</h1>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=bcb95ff2e2a547556433270720f6ef06&action=lists&catid=31&num=9&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'31','thumb'=>'1','order'=>'id DESC','limit'=>'9',));}?>
				<?php $first = array_shift($data)?>
				<div class="chunk">
					<div class="new-index new-index-lg clearfix no-margin">
						<a href="<?php echo $first['url'];?>" class="new-pic" target="_blank">
							<img src="<?php echo get_thumb($first['thumb'], 350);?>" alt="<?php echo $first['title'];?>">
						</a>
						<div class="new-info">
							<div class="new-title nowrap">
								<a href="<?php echo $first['url'];?>" target="_blank" title="<?php echo $first['title'];?>"><?php echo str_cut($first['title'], '72', '...');?></a>
							</div>
							<div class="new-detail">
								<?php echo str_cut($first['description'], '180', '...');?>
								<a href="<?php echo $first['url'];?>" target="_blank">[详细]</a>
								<div class="gray"><?php echo date('Y-m-d', $first['inputtime']);?></div>
								<div class="tag">
									<span class="gray">标签:</span>
									<?php $keywords = explode(' ', $first['keywords'])?>
									<?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
									<a href="<?php echo APP_PATH;?>tag/<?php echo $keyword;?>/" class="orange" target="_blank"><?php echo $keyword;?></a>
									<?php $n++;}unset($n); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $data = array_chunk($data, 4)?>
				<div class="chunk clearfix">
					<?php $n=1;if(is_array($data)) foreach($data AS $list) { ?>
					<div class="col-sm-6">
						<div class="new-item">
							<ul>
								<?php $n=1;if(is_array($list)) foreach($list AS $value) { ?>
								<li class="nowrap"><a href="<?php echo $value['url'];?>" target="_blank" title="<?php echo $value['title'];?>"><?php echo str_cut($value['title'], '75', '...');?></a></li>
								<?php $n++;}unset($n); ?>
							</ul>
						</div>
					</div>
					<?php $n++;}unset($n); ?>
				</div>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
			<div class="col-sm-4 pdR0 side">
				<div class="section-item">
					<h1 class="title pdT10">
						<span class="icon-tuijian icon-title">
						</span>
						今日强胆推荐
						<a href="<?php echo APP_PATH;?>jrqdtj/" target="_blank" class="more">更多</a>
					</h1>
					<div class="groomChunk">
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f90548c89de7556673fc3d4352fdd0d3&action=lists&catid=27&num=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'27','order'=>'id DESC','limit'=>'1',));}?>
						<?php $n=1;if(is_array($data)) foreach($data AS $value) { ?>
						<?php $titles = explode('】', $value['title'])?>
						<div class="groomChunk-hd">
							<?php echo $titles['0'];?>】
							<div class="orange"><?php echo $titles['1'];?></div>
						</div>
						<?php $keywords = explode(' ', $value['keywords'])?>
						<div class="groomChunk-bd">
							<table class="groomChunk-img clearfix" width="100%">
								<tr>
									<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=a4e2688de617c8b0ea65dc4bf4b52f5c&sql=SELECT+%60teamid%60+FROM+%60ft_team%60+WHERE+%60name%60%3D%27%24keywords%5B0%5D%27+OR+%60shortname%60%3D%27%24keywords%5B0%5D%27&cache=3600&dbsource=sportsdt&return=home\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('sql'=>'SELECT `teamid` FROM `ft_team` WHERE `name`=\'$keywords[0]\' OR `shortname`=\'$keywords[0]\'','dbsource'=>'sportsdt',)).'a4e2688de617c8b0ea65dc4bf4b52f5c');if(!$home = tpl_cache($tag_cache_name,3600)){pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model(array (
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
), 'sportsdt');$r = $get_db->sql_query("SELECT `teamid` FROM `ft_team` WHERE `name`='$keywords[0]' OR `shortname`='$keywords[0]' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$home = $a;unset($a);if(!empty($home)){setcache($tag_cache_name, $home, 'tpl_data');}}?>
									<?php $home_id = $home[0]['teamid']?>
									<th width="35%" <?php if($home_id) { ?>data-action="link" data-url="<?php echo APP_PATH;?>team/<?php echo $home_id;?>/"<?php } ?>>
										<img src="<?php echo PHOTO_PATH;?>team/<?php echo $home_id;?>.jpg" alt="<?php echo $keywords['0'];?>" class="team-photo">
									</th>
									<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
									<th>VS</th>
									<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=d1573606be24c0473ab760c9cf100ae4&sql=SELECT+%60teamid%60+FROM+%60ft_team%60+WHERE+%60name%60%3D%27%24keywords%5B1%5D%27+OR+%60shortname%60%3D%27%24keywords%5B1%5D%27&cache=3600&dbsource=sportsdt&return=away\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('sql'=>'SELECT `teamid` FROM `ft_team` WHERE `name`=\'$keywords[1]\' OR `shortname`=\'$keywords[1]\'','dbsource'=>'sportsdt',)).'d1573606be24c0473ab760c9cf100ae4');if(!$away = tpl_cache($tag_cache_name,3600)){pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model(array (
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
), 'sportsdt');$r = $get_db->sql_query("SELECT `teamid` FROM `ft_team` WHERE `name`='$keywords[1]' OR `shortname`='$keywords[1]' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$away = $a;unset($a);if(!empty($away)){setcache($tag_cache_name, $away, 'tpl_data');}}?>
									<?php $away_id = $away[0]['teamid']?>
									<th width="35%" <?php if($away_id) { ?>data-action="link" data-url="<?php echo APP_PATH;?>team/<?php echo $away_id;?>/"<?php } ?>>
										<img src="<?php echo PHOTO_PATH;?>team/<?php echo $away_id;?>.jpg" alt="<?php echo $keywords['1'];?>" class="team-photo">
									</th>
									<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
								</tr>
								<tr>
									<td data-action="link" data-url="<?php echo APP_PATH;?>team/<?php echo $home_id;?>/"><div class="pic-name"><?php echo $keywords['0'];?></div></td>
									<td>&nbsp;</td>
									<td data-action="link" data-url="<?php echo APP_PATH;?>team/<?php echo $away_id;?>/"><div class="pic-name"><?php echo $keywords['1'];?></div></td>
								</tr>
							</table>
						</div>
						<?php $description = explode('；', $value['description'])?>
						<div class="groomChunk-fd">
							<div class="line"><?php echo $description['2'];?></div>
							<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=49aec64b8a6390a3aedf598f90ef4748&sql=SELECT+%60competitionid%60+FROM+%60ft_competition%60+WHERE+%60shortname%60%3D%27%24keywords%5B2%5D%27+OR+%60name%60%3D%27%24keywords%5B2%5D%27&cache=3600&dbsource=sportsdt&return=competition\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('sql'=>'SELECT `competitionid` FROM `ft_competition` WHERE `shortname`=\'$keywords[2]\' OR `name`=\'$keywords[2]\'','dbsource'=>'sportsdt',)).'49aec64b8a6390a3aedf598f90ef4748');if(!$competition = tpl_cache($tag_cache_name,3600)){pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model(array (
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
), 'sportsdt');$r = $get_db->sql_query("SELECT `competitionid` FROM `ft_competition` WHERE `shortname`='$keywords[2]' OR `name`='$keywords[2]' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$competition = $a;unset($a);if(!empty($competition)){setcache($tag_cache_name, $competition, 'tpl_data');}}?>
							<div class="line">联赛：<a href="<?php if($competition[0]['competitionid']) { ?><?php echo APP_PATH;?>competition/<?php echo $competition['0']['competitionid'];?>/schedule/<?php } else { ?>javascript:;<?php } ?>" class="orange" target="_blank"><?php echo $keywords['2'];?></a></div>
							<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
							<div class="line">
								<a href="<?php echo $value['url'];?>" target="_blank" title="<?php echo $value['title'];?>" class="font-blue">
									胜平负强胆推荐详情
								</a>
							</div>
						</div>
						<?php $n++;}unset($n); ?>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</div>
				</div>

			</div>

		</div>

		<!--五大联赛-->
		<div class="row">

			<div class="section-item col-sm-8 pdL0 pdR0">
				<h1 class="title pdT10">
					<span class="icon-liansai icon-title">
					</span>
					五大联赛
					<a target="_blank" href="<?php echo APP_PATH;?>wdls/" class="more">更多</a>
				</h1>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ab23ff5579d1e782d24584eee1ae2ded&action=lists&catid=28&num=9&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'28','thumb'=>'1','order'=>'id DESC','limit'=>'9',));}?>
				<?php $first = array_shift($data)?>
				<div class="chunk">
					<div class="new-index new-index-lg clearfix no-margin">
						<a href="<?php echo $first['url'];?>" class="new-pic" target="_blank">
							<img src="<?php echo get_thumb($first['thumb'], 350);?>" alt="<?php echo $first['title'];?>">
						</a>
						<div class="new-info">
							<div class="new-title nowrap">
								<a href="<?php echo $first['url'];?>" target="_blank" title="<?php echo $first['title'];?>"><?php echo str_cut($first['title'], '72', '...');?></a>
							</div>
							<div class="new-detail">
								<?php echo str_cut($first['description'], '180', '...');?>
								<a href="<?php echo $first['url'];?>" target="_blank">[详细]</a>
								<div class="gray"><?php echo date('Y-m-d', $first['inputtime']);?></div>
								<div class="tag">
									<span class="gray">标签:</span>
									<?php $keywords = explode(' ', $first['keywords'])?>
									<?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
									<a href="<?php echo APP_PATH;?>tag/<?php echo $keyword;?>/" class="orange" target="_blank"><?php echo $keyword;?></a>
									<?php $n++;}unset($n); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $data = array_chunk($data, 4)?>
				<div class="chunk clearfix">
					<?php $n=1;if(is_array($data)) foreach($data AS $list) { ?>
					<div class="col-sm-6">
						<div class="new-item">
							<ul>
								<?php $n=1;if(is_array($list)) foreach($list AS $value) { ?>
								<li class="nowrap"><a href="<?php echo $value['url'];?>" target="_blank" title="<?php echo $value['title'];?>"><?php echo str_cut($value['title'], '75', '...');?></a></li>
								<?php $n++;}unset($n); ?>
							</ul>
						</div>
					</div>
					<?php $n++;}unset($n); ?>
				</div>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
			<div class="col-sm-4 pdR0 side">
				<div class="section-item">
					<h1 class="title pdT10">
						<span class="icon-database icon-title">
						</span>
						<span style="visibility: hidden">1</span>
						<a href="<?php echo APP_PATH;?>zqevent/" target="_blank" class="more">更多</a>
					</h1>
					<div class="sideDatabase">
						<ul class="side_nav" role="tablist">
							<li role="presentation">
								<a href="#event" aria-controls="event" role="tab" data-toggle="tab">赛事资料库</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="event" class="tab-pane active sideDatabase-content" role="tabpanel">
								<ul class="clearfix">
									<?php $n=1;if(is_array($event_info)) foreach($event_info AS $value) { ?>
									<li>
										<a href="<?php echo $value['url'];?>" target="_blank" title="<?php echo $value['name'];?>">
											<img src="<?php echo $value['img'];?>" alt="<?php echo $value['name'];?>" class="<?php echo $value['class'];?>">
										</a>
									</li>
									<?php $n++;}unset($n); ?>
								</ul>
							</div>
						</div>
					</div>


				</div>
			</div>

		</div>

		<!--足坛-->
		<div class="row">

			<div class="section-item col-sm-8 pdL0 pdR0">
				<h1 class="title pdT10">
					<span class="icon-zutan icon-title">
					</span>
					<span style="visibility: hidden">1</span>
					<a target="_blank" href="<?php echo APP_PATH;?>tyzx/" class="more">更多</a>
				</h1>
				<div class="zutan">

					<ul class="side_nav" role="tablist">
						<li class="active" role="presentation">
							<a href="#world_zutan" aria-controls="ft_database" role="tab" data-toggle="tab">世界足坛</a>
						</li>
						<li role="presentation">
							<a href="#ch_zutan" aria-controls="bt_database" role="tab" data-toggle="tab">中国足坛</a>
						</li>
					</ul>
					<div class="tab-content">
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c3e2ca0fa9f9f94e2468fc9c1a316715&action=lists&catid=30&num=9&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'30','thumb'=>'1','order'=>'id DESC','limit'=>'9',));}?>
						<div id="world_zutan" class="tab-pane active zutan-content" role="tabpanel">
							<?php $first = array_shift($data)?>
							<div class="chunk">
								<div class="new-index new-index-lg clearfix no-margin">
									<a href="<?php echo $first['url'];?>" class="new-pic" target="_blank">
										<img src="<?php echo get_thumb($first['thumb'], 350);?>" alt="<?php echo $first['title'];?>">
									</a>
									<div class="new-info">
										<div class="new-title nowrap">
											<a href="<?php echo $first['url'];?>" target="_blank" title="<?php echo $first['title'];?>"><?php echo str_cut($first['title'], '72', '...');?></a>
										</div>
										<div class="new-detail">
											<?php echo str_cut($first['description'], '180', '...');?>
											<a href="<?php echo $first['url'];?>" target="_blank">[详细]</a>
											<div class="gray"><?php echo date('Y-m-d', $first['inputtime']);?></div>
											<div class="tag">
												<span class="gray">标签:</span>
												<?php $keywords = explode(' ', $first['keywords'])?>
												<?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
												<a href="<?php echo APP_PATH;?>tag/<?php echo $keyword;?>/" class="orange" target="_blank"><?php echo $keyword;?></a>
												<?php $n++;}unset($n); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $data = array_chunk($data, 4)?>
							<div class="chunk clearfix">
								<?php $n=1;if(is_array($data)) foreach($data AS $list) { ?>
								<div class="col-sm-6">
									<div class="new-item">
										<ul>
											<?php $n=1;if(is_array($list)) foreach($list AS $value) { ?>
											<li class="nowrap"><a href="<?php echo $value['url'];?>" target="_blank" title="<?php echo $value['title'];?>"><?php echo str_cut($value['title'], '75', '...');?></a></li>
											<?php $n++;}unset($n); ?>
										</ul>
									</div>
								</div>
								<?php $n++;}unset($n); ?>
							</div>
						</div>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=55aee3252f89ad63cf9446a65617afaf&action=lists&catid=29&num=9&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'29','thumb'=>'1','order'=>'id DESC','limit'=>'9',));}?>
						<div id="ch_zutan" class="tab-pane zutan-content" role="tabpanel">
							<?php $first = array_shift($data)?>
							<div class="chunk">
								<div class="new-index new-index-lg clearfix no-margin">
									<a href="<?php echo $first['url'];?>" class="new-pic" target="_blank">
										<img src="<?php echo get_thumb($first['thumb'], 350);?>" alt="<?php echo $first['title'];?>">
									</a>
									<div class="new-info">
										<div class="new-title nowrap">
											<a href="<?php echo $first['url'];?>" target="_blank" title="<?php echo $first['title'];?>"><?php echo str_cut($first['title'], '72', '...');?></a>
										</div>
										<div class="new-detail">
											<?php echo str_cut($first['description'], '180', '...');?>
											<a href="<?php echo $first['url'];?>" target="_blank">[详细]</a>
											<div class="gray"><?php echo date('Y-m-d', $first['inputtime']);?></div>
											<div class="tag">
												<span class="gray">标签:</span>
												<?php $keywords = explode(' ', $first['keywords'])?>
												<?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
												<a href="<?php echo APP_PATH;?>tag/<?php echo $keyword;?>/" class="orange" target="_blank"><?php echo $keyword;?></a>
												<?php $n++;}unset($n); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $data = array_chunk($data, 4)?>
							<div class="chunk clearfix">
								<?php $n=1;if(is_array($data)) foreach($data AS $list) { ?>
								<div class="col-sm-6">
									<div class="new-item">
										<ul>
											<?php $n=1;if(is_array($list)) foreach($list AS $value) { ?>
											<li class="nowrap"><a href="<?php echo $value['url'];?>" target="_blank" title="<?php echo $value['title'];?>"><?php echo str_cut($value['title'], '75', '...');?></a></li>
											<?php $n++;}unset($n); ?>
										</ul>
									</div>
								</div>
								<?php $n++;}unset($n); ?>
							</div>
						</div>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</div>
				</div>

			</div>
			<div class="col-sm-4 pdR0 side">
				<div class="section-item">
					<h1 class="title pdT10">
						<span class="icon-odd icon-title">
						</span>
						最新指数
						<a href="javascript:;" data-action="refresh" data-target="#live-game-odds-data" data-id="<?php echo $live_game_odds_data['gameid'];?>" style="color: #ccc;margin-left: 80px">
							<i class="icon-exchange"></i>
							换一场
						</a>
						<a href="<?php echo APP_PATH;?>zqodds/" target="_blank" class="more">更多</a>
					</h1>
					<div class="side-odd" id="live-game-odds-data">

						<div class="table-head" id="game-data">
							<span data-key="competition"><?php echo $live_game_odds_data['competitionname'];?></span>
							<span data-key="date"><?php echo date('H:i', $live_game_odds_data['date']);?></span>
							<span data-key="home"><?php echo str_cut($live_game_odds_data['homename'], 12, '');?></span>
							<span data-key="score"><?php echo $live_game_odds_data['homescore'];?>-<?php echo $live_game_odds_data['awayscore'];?></span>
							<span data-key="away"><?php echo str_cut($live_game_odds_data['awayname'], 12, '');?></span>
							<span data-key="link" class="fr"><a href="<?php echo APP_PATH;?>game/<?php echo $live_game_odds_data['gameid'];?>/analyse/" target="_blank">析</a></span>
						</div>
						<table class="table-odd" id="odds-data">
							<tr>
								<td width="50"></td>
								<td width="50"></td>
								<td width="76">S2</td>
								<td width="76">bet356</td>
								<td>10bet</td>
							</tr>
							<!--亚盘-->
							<tr>
								<td></td>
								<td>主赔</td>
								<td data-key="up" data-company="400000"><?php echo $live_game_odds_data['odds']['asia']['400000']['up'];?></td>
								<td data-key="up" data-company="3000181"><?php echo $live_game_odds_data['odds']['asia']['3000181']['up'];?></td>
								<td data-key="up" data-company="3000271"><?php echo $live_game_odds_data['odds']['asia']['3000271']['up'];?></td>
							</tr>
							<tr>
								<td>亚盘</td>
								<td>盘口</td>
								<td data-key="give" data-company="400000"><?php echo $live_game_odds_data['odds']['asia']['400000']['give'];?></td>
								<td data-key="give" data-company="3000181"><?php echo $live_game_odds_data['odds']['asia']['3000181']['give'];?></td>
								<td data-key="give" data-company="3000271"><?php echo $live_game_odds_data['odds']['asia']['3000271']['give'];?></td>
							</tr>
							<tr>
								<td></td>
								<td>客赔</td>
								<td data-key="down" data-company="400000"><?php echo $live_game_odds_data['odds']['asia']['400000']['down'];?></td>
								<td data-key="down" data-company="3000181"><?php echo $live_game_odds_data['odds']['asia']['3000181']['down'];?></td>
								<td data-key="down" data-company="3000271"><?php echo $live_game_odds_data['odds']['asia']['3000271']['down'];?></td>
							</tr>
							<!--欧赔-->
							<tr>
								<td></td>
								<td>主胜</td>
								<td data-key="homewin" data-company="400000"><?php echo $live_game_odds_data['odds']['euro']['400000']['homewin'];?></td>
								<td data-key="homewin" data-company="3000181"><?php echo $live_game_odds_data['odds']['euro']['3000181']['homewin'];?></td>
								<td data-key="homewin" data-company="3000271"><?php echo $live_game_odds_data['odds']['euro']['3000271']['homewin'];?></td>
							</tr>
							<tr>
								<td>欧赔</td>
								<td>和局</td>
								<td data-key="draw" data-company="400000"><?php echo $live_game_odds_data['odds']['euro']['400000']['draw'];?></td>
								<td data-key="draw" data-company="3000181"><?php echo $live_game_odds_data['odds']['euro']['3000181']['draw'];?></td>
								<td data-key="draw" data-company="3000271"><?php echo $live_game_odds_data['odds']['euro']['3000271']['draw'];?></td>
							</tr>
							<tr>
								<td></td>
								<td>客胜</td>
								<td data-key="awaywin" data-company="400000"><?php echo $live_game_odds_data['odds']['euro']['400000']['awaywin'];?></td>
								<td data-key="awaywin" data-company="3000181"><?php echo $live_game_odds_data['odds']['euro']['3000181']['awaywin'];?></td>
								<td data-key="awaywin" data-company="3000271"><?php echo $live_game_odds_data['odds']['euro']['3000271']['awaywin'];?></td>
							</tr>
							<!--大小-->
							<tr>
								<td></td>
								<td>大球</td>
								<td data-key="big" data-company="400000"><?php echo $live_game_odds_data['odds']['ou']['400000']['big'];?></td>
								<td data-key="big" data-company="3000181"><?php echo $live_game_odds_data['odds']['ou']['3000181']['big'];?></td>
								<td data-key="big" data-company="3000271"><?php echo $live_game_odds_data['odds']['ou']['3000271']['big'];?></td>
							</tr>
							<tr>
								<td>大小</td>
								<td>盘口</td>
								<td data-key="total" data-company="400000"><?php echo $live_game_odds_data['odds']['ou']['400000']['total'];?></td>
								<td data-key="total" data-company="3000181"><?php echo $live_game_odds_data['odds']['ou']['3000181']['total'];?></td>
								<td data-key="total" data-company="3000271"><?php echo $live_game_odds_data['odds']['ou']['3000271']['total'];?></td>
							</tr>
							<tr>
								<td></td>
								<td>小球</td>
								<td data-key="small" data-company="400000"><?php echo $live_game_odds_data['odds']['ou']['400000']['small'];?></td>
								<td data-key="small" data-company="3000181"><?php echo $live_game_odds_data['odds']['ou']['3000181']['small'];?></td>
								<td data-key="small" data-company="3000271"><?php echo $live_game_odds_data['odds']['ou']['3000271']['small'];?></td>
							</tr>
						</table>
					</div>

				</div>
			</div>

		</div>

		<!--图库-->
		<div class="row section-item">
			<h1 class="title pdT10">
				<span class="icon-xiangji icon-title">
				</span>
				图库推荐
				<a target="_blank" href="<?php echo APP_PATH;?>tuku/" class="more">更多</a>
			</h1>
			<div class="index-pic">
				<ul class="side_nav" role="tablist">
					<li class="active" role="presentation">
						<a id="football-baby" href="#ft_pic" aria-controls="ft_pic" role="tab" data-toggle="tab">足球宝贝</a>
					</li>
					<li role="presentation">
						<a id="basketball-baby" href="#bt_pic" aria-controls="bt_pic" role="tab" data-toggle="tab">篮球宝贝</a>
					</li>
					<li role="presentation">
						<a id="sports-beauty" href="#titan_pic" aria-controls="titan_pic" role="tab" data-toggle="tab">体坛美图</a>
					</li>

				</ul>

				<div class="tab-content">
					<div id="ft_pic" class="tab-pane active" role="tabpane3">
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=acaf279134f165ce040dcffe4e428ef8&action=position&posid=55&num=5&thumb=1&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'55','thumb'=>'1','order'=>'listorder DESC','limit'=>'5',));}?>
						<ul class="pic-content">
							<?php $n=1;if(is_array($data)) foreach($data AS $value) { ?>
							<li>
								<img src="<?php echo $value['thumb'];?>" alt="<?php echo $value['title'];?>">
								<a class="pic-link nowrap" target="_blank" href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>">
									<div>
										<span class="btn-piclink"><?php echo str_cut($value['title'], 30, '...');?></span>
									</div>
								</a>
							</li>
							<?php $n++;}unset($n); ?>
						</ul>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</div>
					<div id="bt_pic" class="tab-pane" role="tabpane3">
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=15f44a3aa5b9f694f3b63a1ecdb55612&action=position&posid=56&num=5&thumb=1&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'56','thumb'=>'1','order'=>'listorder DESC','limit'=>'5',));}?>
						<ul class="pic-content">
							<?php $n=1;if(is_array($data)) foreach($data AS $value) { ?>
							<li>
								<img src="<?php echo $value['thumb'];?>" alt="<?php echo $value['title'];?>">
								<a class="pic-link nowrap" target="_blank" href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>">
									<div>
										<span class="btn-piclink"><?php echo str_cut($value['title'], 30, '...');?></span>
									</div>
								</a>
							</li>
							<?php $n++;}unset($n); ?>
						</ul>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</div>
					<div id="titan_pic" class="tab-pane" role="tabpane3">
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0171a640eba771dcbb378e0035d541da&action=position&posid=57&num=5&thumb=1&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'57','thumb'=>'1','order'=>'listorder DESC','limit'=>'5',));}?>
						<ul class="pic-content">
							<?php $n=1;if(is_array($data)) foreach($data AS $value) { ?>
							<li>
								<img src="<?php echo $value['thumb'];?>" alt="<?php echo $value['title'];?>">
								<a class="pic-link nowrap" target="_blank" href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>">
									<div>
										<span class="btn-piclink"><?php echo str_cut($value['title'], 30, '...');?></span>
									</div>
								</a>
							</li>
							<?php $n++;}unset($n); ?>
						</ul>
						<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</div>
				</div>
			</div>
		</div>
		<!--彩票开奖-->
		<div class="row">

			<div class="section-item col-sm-8 pdL0 pdR0">
				<h1 class="title pdT10">
					<span class="icon-kaijiang icon-title">
					</span>
					彩票开奖
					<a rel="external nofollow" target="_blank" href="<?php echo APP_PATH;?>cp/info/" class="more">更多</a>
				</h1>
				<div class="clearfix kaijiang">
					<?php $n=1; if(is_array($lottery)) foreach($lottery AS $key => $value) { ?>
					<div class="col-sm-6 pdR0 pdL0">
						<div class="caipiao" id="<?php echo $key;?>">
									<div class="caipiao-hd">
										<b class="black"><?php echo $lottery_info[$key];?></b>
										<span class="gray"><?php echo $value['id'];?>期</span>
										<time class="gray fr"><?php echo date('Y-m-d', $value['uptime']);?></time>
									</div>
									<div class="caipiao-bd" data-action="lottery-list" data-type="<?php echo $key;?>">
										<?php $numbers = explode(',', $value['numbers'])?>
										<?php $n=1;if(is_array($numbers)) foreach($numbers AS $number) { ?>
										<sapn class="circle"><?php echo $number;?></sapn>
										<?php $n++;}unset($n); ?>
									</div>
									<div class="caipiao-fd">
										<?php $pinyin2id = ['qxc'=>1,'xglhc'=>2,'gdklsf'=>3,'bjpks'=>4,'cqssc'=>5];?>
										<a target="_blank" href="<?php echo APP_PATH;?>cp/info/?id=<?php echo $pinyin2id[$key];?>">详细</a>
										|
										<a target="_blank" href="<?php echo APP_PATH;?>cp/<?php echo $key;?>/trendbase/">走势</a>
									</div>
								</div>

					</div>
					<?php $n++;}unset($n); ?>
				</div>



			</div>
			<div class="col-sm-4 pdR0 side">
				<div class="section-item">
					<!-- 今日股指 -->
					<h1 class="title pdT10">
						<span class="icon-odd icon-title">
						</span>
						今日股指
						<a rel="external nofollow" href="<?php echo APP_PATH;?>st/list/" target="_blank" class="more">更多</a>
					</h1>


					<div class="content today_guzhi">
						<ul class="clearfix">
							<?php $n=1;if(is_array($dapan_data)) foreach($dapan_data AS $value) { ?>
							<li class="today_guzhi-item">
								<h1><?php echo $value['name'];?></h1>
								<p>
								<span class="<?php if($value['increase'] < 0) { ?>guzhi-down<?php } else { ?>guzhi-up<?php } ?>">
									<?php echo $value['nowpri'];?>
									<span class="<?php if($value['increase'] < 0) { ?>index-down<?php } else { ?>index-up<?php } ?>"></span>
								</span>
								<span><?php if($value['increase'] > 0) { ?>+<?php } ?><?php echo $value['increase'];?>&nbsp;<?php if($value['increase'] > 0) { ?>+<?php } ?><?php echo $value['increPer'];?>%</span>
								</p>
							</li>
							<?php $n++;}unset($n); ?>
						</ul>
					</div>

				</div>
			</div>

		</div>

</section>
<!-- main body -->
<script>
	var IMG_PATH = '<?php echo IMG_PATH;?>';
	var APP_PATH = '<?php echo APP_PATH;?>';
</script>
<?php $js = array('jquery.mousewheel.js', 'banner.js', 'slideBar.js', 'index.js',  'imagesloaded.pkgd.min.js', 'imagesloaded.pkgd.common.js', 'http://echarts.baidu.com/build/dist/echarts.js', 'guzhi.js', 'chart.js')?>
<?php include template('content', 'footer'); ?>
