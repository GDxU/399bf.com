<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><nav class="nav">
    <!-- header -->
    <header class="bar bar-nav">
        <a class="button pull-left btn-back" href="<?php echo WAP_PATH;?>zqscore/">
            <i class="icon icon-left"></i>
        </a>
        <h1 class="title white">
            <?php echo $game_info['season'];?> <?php echo $game_info['competitionname'];?>
        </h1>
    </header>
    <!-- header end -->
    <div class="row match-nav">
        <div class="col-33 team">
            <div class="team-icon">
                <img src="<?php echo PHOTO_PATH;?>team/<?php echo $game_info['hometeamid'];?>.jpg" alt="<?php echo $game_info['homename'];?>" class="team-photo">
            </div>
            <div class="team-name"><?php echo $game_info['homename'];?></div>
        </div>
        <div class="col-33">
            <div class="match-state">
                <div class="score-line"><?php echo $game_info['homescore'];?>:<?php echo $game_info['awayscore'];?></div>
                <p><?php echo date('Y-m-d', $game_info['date']);?></p>
                <p><?php echo date('H:i', $game_info['date']);?></p>
                <p><?php echo $game_info['status_text'];?></p>
            </div>
        </div>
        <div class="col-33 team">
            <div class="team-icon">
                <img src="<?php echo PHOTO_PATH;?>team/<?php echo $game_info['awayteamid'];?>.jpg" alt="<?php echo $game_info['awayname'];?>" class="team-photo">
            </div>
            <div class="team-name"><?php echo $game_info['awayname'];?></div>
        </div>
    </div>
</nav>
