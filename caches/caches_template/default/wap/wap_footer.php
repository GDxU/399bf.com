<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script>
    if (router === undefined) {
        var router = false;
    }
    $.config = {
        router: router
    };
</script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>


<!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
<script>
    var IMG_PATH = '<?php echo WAP_IMG_PATH;?>';
    var WAP_PATH = '<?php echo WAP_PATH;?>';
</script>

<script src="<?php echo WAP_JS_PATH;?>main.js"></script>
<?php if(isset($js)) { ?>
<?php $n=1;if(is_array($js)) foreach($js AS $data) { ?>
<script src="<?php echo WAP_JS_PATH;?><?php echo $data;?>"></script>
<?php $n++;}unset($n); ?>
<?php } ?>
<!--百度统计代码-->
<script src="<?php echo WAP_JS_PATH;?>hm.js"></script>
</body>
</html>