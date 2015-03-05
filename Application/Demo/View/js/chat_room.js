/**
 * Created by mackcyl on 15/3/4.
 */
$(document).ready(function(){



    $("#sendBtn").on('click',sendMessage);
    $("#praiseBtn").on('click',addPraise);

    setInterval(function () {getMessage(); }, 800);
    var $contentDiv = document.getElementById('msgContent');
    $contentDiv.scrollTop = $contentDiv.scrollHeight;


    function addPraise(){
        var rootId = $("#rootId").val();
        var sendUser = $("#loginUser").val();
        var messageContent = "赞赞赞赞赞赞赞赞赞赞赞赞赞赞!"

        if(sendUser == '' || sendUser==null || sendUser ==undefined){
            sendUser = '匿名'
        }


        var urlStr = T.D.APP+"/Demo/Index/ajaxSendMsg";

        /**
         * r: room (房间)
         * u: user (用户)
         * m: 消息内容
         * t: 消息类型(当前全是1(文本类型)
         */
        $.ajax({
            type: "POST",
            url: urlStr,
            data: { r: rootId, u: sendUser ,m:messageContent,t:2},
            dataType : "JSON",
            success: function(jsonResult){
                if(jsonResult.status){

                }else{

                }
            }
        });
    }

    function sendMessage(){

        var rootId = $("#rootId").val();
        var sendUser = $("#loginUser").val();
        var messageContent = $.trim($("#sendContent").val());

        if(messageContent == '' || messageContent==null || messageContent ==undefined){
            alert("发送消息为空");
            return;
        }
        if(sendUser == '' || sendUser==null || sendUser ==undefined){
            sendUser = '匿名'
        }


        var urlStr = T.D.APP+"/Demo/Index/ajaxSendMsg";

        /**
         * r: room (房间)
         * u: user (用户)
         * m: 消息内容
         * t: 消息类型(当前全是1(文本类型)
         */
        $.ajax({
            type: "POST",
            url: urlStr,
            data: { r: rootId, u: sendUser ,m:messageContent,t:1},
            dataType : "JSON",
            success: function(jsonResult){
                console.log(jsonResult);
                if(jsonResult.status){

                }else{

                }

                $("#sendContent").val('');
            }
        });
    }

    function getMessage(){

        var rootId = $("#rootId").val();
        var urlStr =T.D.APP + "/Demo/Index/ajaxLoadChatHistory";

        $.ajax({
            type: "POST",
            url: urlStr,
            data: { r: rootId},
            dataType : "JSON",
            success: function(jsonResult){

                if(jsonResult.status){
                    $("#msgContent").append(jsonResult.info.htmlStr);
                    var $contentDiv = document.getElementById('msgContent');
                    $contentDiv.scrollTop = $contentDiv.scrollHeight;
                }else{

                }
            }
        });
    }

});

