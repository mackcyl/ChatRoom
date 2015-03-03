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
            'mapping_order' => 'create_time desc',
        )

    );


    public function getRootInfoById($rootId){
        $roomInfo = $this->relation(true)->find($rootId);

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