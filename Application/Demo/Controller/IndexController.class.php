<?php
/**
 * Created by PhpStorm.
 * User: mackcyl
 * Date: 15/3/3
 * Time: 上午11:01
 */

namespace Demo\Controller;

use Demo\Model\ChatHistory;
use Demo\Model\RoomModel;

class IndexController extends BaseController{

    protected $roomId = 1;

    public function index(){

        $roomModel = new RoomModel();

        $rootObj =$roomModel->getRootInfoById($this->roomId);

        $rhistory = $rootObj['chatHistory'];
        $eTimeObj = end($rhistory);
        if(empty($eTimeObj)){
            session('end_time',time());
        }else{
            session('end_time',$eTimeObj['create_time']);
        }
        $this->assign('roomInfo',$rootObj);
        $this->assign('chatHistory',$rootObj['chatHistory']);
        $this->assign('roomId',$this->roomId);
        $this->display();
    }


    /**
     * 取聊天记录
     */
    public function ajaxLoadChatHistory(){
        $room = I('r','');
        $chatHistoryModel = new ChatHistory();

        $endTime = session('end_time');
        if(!empty($endTime)){
            $where['create_time'] = array("GT",$endTime);
        }

        $chatHistory = $chatHistoryModel->getListByRoomId($room,$where);


        $this->assign('chatHistory',$chatHistory);
        $htmlStr = $this->fetch('content.inc');


        $rhistory = $chatHistory;
        $eTimeObj = end($rhistory);
        if(!empty($eTimeObj)){
            session('end_time',$eTimeObj['create_time']);
        }

        $this->success(array("htmlStr"=>$htmlStr,"querySql"=>$chatHistoryModel->getLastSql()));
    }


    /**
     * 消息发送
     */
    public function ajaxSendMsg(){
        $message = I('m','');
        $msgType = I('t','');
        $room = I('r','');
        $user = I('u','匿名');
        $ruser = I('ru','all');

        $chatHistoryModel = new ChatHistory();

        $msgObj['msg_content'] = $message;
        $msgObj['msg_type'] = $msgType;
        $msgObj['room_id'] = $room;
        $msgObj['send_user'] = $user;
        $msgObj['recipient_user'] = $ruser;
        $msgObj['create_time'] = time();

        $newObj = $chatHistoryModel->update($msgObj);

        $this->success($newObj);

    }


} 