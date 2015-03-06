<?php if (!defined('THINK_PATH')) exit(); if(is_array($chatHistory)): $i = 0; $__LIST__ = $chatHistory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($content["cssStr"]) && ($content["cssStr"] !== ""))?($content["cssStr"]):'otherMsg'); ?>">
        <div class="msgc">
            <?php echo ($content["nickname"]); ?>:<br>
           <?php echo ($content["msg_content"]); ?>
        </div>

    </li><?php endforeach; endif; else: echo "" ;endif; ?>