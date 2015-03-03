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
use Think\Controller;

class ChatRoomController extends Controller{

    protected $roomId = 1;

    public function index(){

        $roomModel = new RoomModel();

        $rootObj =$roomModel->getRootInfoById($this->roomId);

        $this->assign('roomInfo',$rootObj['info']);
        $this->assign('chatHistory',$rootObj['chatHistory']);
        $this->assign('roomId',$this->roomId);

        $this->display();
    }


    /**
     * 取聊天记录
     */
    public function ajaxLoadChatHistory(){
        $room = I('roomId','');
        $chatHistoryModel = new ChatHistory();
        $chatHistory = $chatHistoryModel->getListByRoomId($room);
        $this->success($chatHistory);
    }


    /**
     * 消息发送
     */
    public function ajaxSendMsg(){
        $message = I('message','');
        $msgType = I('msgType','');
        $room = I('roomId','');
        $user = I('userId','');

        $chatHistoryModel = new ChatHistory();

        $msgObj['message'] = $message;
        $msgObj['type'] = $msgType;
        $msgObj['room_id'] = $room;
        $msgObj['user_name'] = $user;
        $msgObj['send_time'] = time();

        $chatHistoryModel->update($msgObj);



    }

    protected function getChatHistoryByRoom(){
    }

} 