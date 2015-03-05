<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>聊天室demo</title>
    <link type="text/css" rel="stylesheet" href="<?php echo ($view_css_dir); ?>/style.css" />
    <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>

    <script>
        //按照包来管理
        T = {};
        T.D = {};

        T.D = (function(){
            var d = {
                "ROOT"   : "/ChatRoom", //当前网站地址
                "APP"    : "/ChatRoom", //当前项目地址
                "PUBLIC" : "/ChatRoom/Public" //项目公共目录地址
            }
            return d;
        })();

    </script>

</head>

<body>

<br>
<br>
<br>


    <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
        <span>聊天室名称:<?php echo ($roomInfo["name"]); ?></span>
        <span>聊天室描述:<?php echo ($roomInfo["room_desc"]); ?></span>
        <span>聊天室管理员:<?php echo ($roomInfo["room_admin"]); ?></span>

        <input type="hidden" id="loginUser" value="">
        <input type="hidden" id="rootId" value="<?php echo ($roomInfo["id"]); ?>">

    </div>
    <div id="convo" data-from="<?php echo ($roomInfo["room_admin"]); ?>">
        <ul class="chat-thread" id="msgContent">
            <?php if(is_array($chatHistory)): $i = 0; $__LIST__ = $chatHistory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($content["cssStr"]) && ($content["cssStr"] !== ""))?($content["cssStr"]):'otherMsg'); ?>"><?php echo ($content["msg_content"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>

    <?php if($client == 1): ?><div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
            <button id="praiseBtn">点赞</button>
        </div>
     <?php else: ?>
        <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
            <textarea style="margin: 0px; width: 768px; height: 121px;" id="sendContent"></textarea>
            <button id="sendBtn">发送</button>
        </div><?php endif; ?>



<script src="<?php echo ($view_js_dir); ?>/chat_room.js"></script>
</body>
</html>