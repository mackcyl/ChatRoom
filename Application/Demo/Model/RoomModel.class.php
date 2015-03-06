<?php
/**
 * Created by PhpStorm.
 * User: mackcyl
 * Date: 15/3/3
 * Time: 下午3:47
 */

namespace Demo\Model;


use Think\Model;

class RoomModel extends Model\RelationModel{



    protected $_link = array(
        'ChatHistory'    => array(
            'mapping_type'  => self::HAS_MANY,
            'class_name'    => 'ChatHistory',
            'foreign_key'   => 'room_id',
            'mapping_name'  => 'chatHistory',
            'mapping_order' => 'create_time asc',
        )

    );


    public function getRootInfoById($rootId){
        $roomInfo = $this->relation(true)->find($rootId);

        $s_id = session('s_id');

        $usersMod = new UsersModel();
        foreach($roomInfo['chatHistory'] as $key=>$value){
            if(trim($s_id) == trim($value['s_id'])){
                $roomInfo['chatHistory'][$key]['cssStr'] = 'selfMsg';
            }else{
                $roomInfo['chatHistory'][$key]['cssStr'] = 'otherMsg';
            }
            $roomInfo['chatHistory'][$key]['nickname'] = $usersMod->getUsersNicknameByUuid(trim($value['s_id']));
        }
        return $roomInfo;
    }


    public function update($modelData = null){
        /* 获取数据对象 */
        $modelData = $this->create($modelData);

        if(empty($modelData)){
            return false;
        }
        /* 添加或新增属性 */
        if(empty($modelData['id'])){ //新增属性
            $id = $this->add();
            if(!$id){
                $this->error = '新增出错！';
                return false;
            }
        } else { //更新数据
            $status = $this->save();
            if(false === $status){
                $this->error = '更新出错！';
                return false;
            }
        }
        //添加或更新完成
        return $modelData;

    }


} 