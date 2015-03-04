/**
 * Created by mackcyl on 15/3/4.
 */
$(document).ready(function(){



    $("#sendBtn").on('click',sendMessage);
    setInterval(function () {getMessage(); }, 800);


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


        var urlStr ="/Demo/Index/ajaxSendMsg";

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
            }
        });
    }

    function getMessage(){

        var rootId = $("#rootId").val();
        var urlStr ="/Demo/Index/ajaxLoadChatHistory";
        $.ajax({
            type: "POST",
            url: urlStr,
            data: { r: rootId},
            dataType : "JSON",
            success: function(jsonResult){

                console.log(jsonResult);
                if(jsonResult.status){

                }else{

                }
            }
        });
    }

});

