<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>足球比分</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- build css -->
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">

    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>main.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>index.css">
    <link rel="stylesheet" href="<?php echo WAP_CSS_PATH;?>banner.css">

    <!-- build css end -->


  </head>
  <body>
    <div class="page-group">

        <div class="page page-current">
            
            <header class="bar bar-nav">
                <div class="pull-left">
                    <img src="../images/logo.png" alt="" class="logo">
                </div>
                <nav class="header-nav pull-right">
                    <div class="buttons-row">
                        <a href="http://baidu.com" class="button active">足球</a>
                        <a href="" class="button">篮球</a>
                        <a href="" class="button">情报</a>
                        <a href="" class="button">资讯</a>
                        <a href="" class="button">图库</a>
                    </div>
                </nav>
            </header>
            <div class="content">

                <!-- banner       -->
                <div class="banner" id="banner">
                    <div class="banner-bd">
                        <ul>
                            <li>
                                <a href="" class="banner-img">
                                    <img src="http://www.399cm.com/uploadfile/2017/0504/20170504040239541.jpg" alt="" width="100%">
                                </a>
                                
                                <div class="banner-info">
                                    <div class="banner-title">世界杯 aaa 强足球宝贝模特</div>
                                    <p>世界杯 32 强足球宝贝模特</p>
                                </div>
                            </li>
                            <li>
                                <a href="" class="banner-img">
                                    <img src="http://www.399cm.com/uploadfile/2017/0504/20170504040239541.jpg" alt="" width="100%">
                                </a>
                                
                                <div class="banner-info">
                                    <div class="banner-title">世界杯 bbb 强足球宝贝模特</div>
                                    <p>世界杯 32 强足球宝贝模特</p>
                                </div>
                            </li>
                            <li>
                                <a href="" class="banner-img">
                                    <img src="http://www.399cm.com/uploadfile/2017/0504/20170504040239541.jpg" alt="" width="100%">
                                </a>
                                
                                <div class="banner-info">
                                    <div class="banner-title">世界杯 ccc 强足球宝贝模特</div>
                                    <p>世界杯 32 强足球宝贝模特</p>
                                </div>
                            </li>
                            <li>
                                <a href="" class="banner-img">
                                    <img src="http://www.399cm.com/uploadfile/2017/0504/20170504040239541.jpg" alt="" width="100%">
                                </a>
                                
                                <div class="banner-info">
                                    <div class="banner-title">世界杯 ccc 强足球宝贝模特</div>
                                    <p>世界杯 32 强足球宝贝模特</p>
                                </div>
                            </li>
                        </ul>
                        
                    </div>

                    <div class="banner-fd" banner-footer>
                        <ul class="banner-progress">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    
                </div>
                <!-- banner end -->
                
                <!-- 即时赛事 -->
                <div class="live-game">
                    <div class="inner-title live-game">
                        <span class="orange">即时赛事</span>

                        <a href="" class="more pull-right">更多</a>
                    </div>
                    <!-- 卡片 -->
                    <div class="card-box">
                        <div class="card begin" id="test1">
                            <a href="##" class="gray btn-link fixed-right">
                                <i class="icon icon-right"></i>
                            </a>

                            <table class="table">
                                <tr>
                                    <th width="40%" class="text-left">
                                        <span class="card-title pull-left">阿夫汗</span>
                                        <time class="gray time">15:00</time>
                                    </th>
                                    <th>
                                        <span class="red state" data-key="text">81'</span>
                                    </th>
                                    <th width="40%">&nbsp;</th>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <span class="home-animate"></span>
                                        <span class="gray">
                                            [1]
                                        </span>
                                        <span class="yellow-card" data-key="homeyellowcard">3</span>
                                        <span class="red-card" data-key="homeredcard">2</span>
                                        <span class="team-name home-name">械枯</span>
                                    </td>
                                    <td>
                                        <span class="live-score">
                                            <span data-key="homescore" data-target="home-name" data-animate=".home-animate">1</span>
                                            -
                                            <span data-key="awayscore" data-target="away-name" data-animate=".away-animate">2</span>
                                        </span>
                                    </td>
                                    <td class="text-left">
                                        <span class="team-name away-name">苛基本原则</span>
                                        <span class="red-card" data-key="awayredcard">3</span>
                                        <span class="yellow-card" data-key="awayyellowcard">3</span>
                                        <span class="gray">
                                            [0]
                                        </span>
                                        <span class="away-animate">
                                        </span>

                                    </td>
                                </tr>

                                <tr class="fd gray">
                                    <td>&nbsp;</td>
                                    <td>
                                        角：<span data-key="homecorner">1</span> - <span data-key="awaycorner">1</span>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>

                                

                            </table>
                        </div>
                        <div class="card begin" id="test1">
                            <a href="##" class="gray btn-link fixed-right">
                                <i class="icon icon-right"></i>
                            </a>

                            <table class="table">
                                <tr>
                                    <th width="40%" class="text-left">
                                        <span class="card-title pull-left">阿夫汗</span>
                                        <time class="gray time">15:00</time>
                                    </th>
                                    <th>
                                        <span class="red state" data-key="text">81'</span>
                                    </th>
                                    <th width="40%">&nbsp;</th>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <span class="home-animate"></span>
                                        <span class="gray">
                                            [1]
                                        </span>
                                        <span class="yellow-card" data-key="homeyellowcard">3</span>
                                        <span class="red-card" data-key="homeredcard">2</span>
                                        <span class="team-name home-name">械枯</span>
                                    </td>
                                    <td>
                                        <span class="live-score">
                                            <span data-key="homescore" data-target="home-name" data-animate=".home-animate">1</span>
                                            -
                                            <span data-key="awayscore" data-target="away-name" data-animate=".away-animate">2</span>
                                        </span>
                                    </td>
                                    <td class="text-left">
                                        <span class="team-name away-name">苛基本原则</span>
                                        <span class="red-card" data-key="awayredcard">3</span>
                                        <span class="yellow-card" data-key="awayyellowcard">3</span>
                                        <span class="gray">
                                            [0]
                                        </span>
                                        <span class="away-animate">
                                        </span>

                                    </td>
                                </tr>


                                

                            </table>
                        </div>
                    </div>
                    <!-- 卡片 end -->
                </div>

                <!-- news -->
                <div class="news">
                    <div class="inner-title news">
                        <a href="" class="more pull-right">更多</a>
                    </div>
                    <div class="buttons-tab tab-nav">
                        <a href="#ft_fenxi" class="tab-link button active">足彩分析</a>
                        <a href="#ft_yuce" class="tab-link button">足彩预测</a>
                        <a href="#ft_tuijian" class="tab-link button">足彩推荐</a>
                    </div>
                    <div class="tabs">
                        <div id="ft_fenxi" class="tab active">
                            <ul class="news-list">
                                <li class="news-item">
                                    <a href="">
                                        <img src="http://www.399cm.com/uploadfile/2017/0504/20170504040239541.jpg" alt="" class="pull-left list-pic">
                                        <div class="list-detail">
                                            <div class="list-title">梅西禁赛4场，没有梅西阿根asdssssssssssssss...</div>
                                            <p class="list-info">北京时间2017年3月28日消息，FILA国际联官方宣告，阿根廷著名足...</p>
                                            <div class="list-fd">
                                                <time>2017-03-30 13:58</time>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="news-item">
                                    <a href="">
                                        <img src="http://www.399cm.com/uploadfile/2017/0504/20170504040239541.jpg" alt="" class="pull-left list-pic">
                                        <div class="list-detail">
                                            <div class="list-title">梅西禁赛4场，没有梅西阿根asdssssssssssssss...</div>
                                            <p class="list-info">北京时间2017年3月28日消息，FILA国际联官方宣告，阿根廷著名足...</p>
                                            <div class="list-fd">
                                                <time>2017-03-30 13:58</time>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="ft_yuce" class="tab">2</div>
                        <div id="ft_tuijian" class="tab">3</div>
                    </div>
                </div>

                <!--footer-->
                <footer class="footer">
                    <div class="footer-nav">
                        <a href="<?php echo WAP_PATH;?>zqscore/" class="close-poup">首页</a>
                        <a href="javascript:;" id="toTop">返回顶部</a>
                    </div>
                    <div class="hint">
                        399彩迷网
                        <a href="<?php echo WAP_PATH;?>zqscore/" class="close-poup">m.399bf.com</a>
                    </div>
                </footer>
                <!--footer end-->



            </div>

        </div>
        
    </div>

    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
    <script src="<?php echo WAP_JS_PATH;?>fx.js"></script>
    <script src="<?php echo WAP_JS_PATH;?>touch.js"></script>
    <script src="<?php echo WAP_JS_PATH;?>banner.js"></script>

    <script src="<?php echo WAP_JS_PATH;?>main.js"></script>

  </body>
</html>
