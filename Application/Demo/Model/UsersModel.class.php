<?php
/**
 * Created by PhpStorm.
 * User: mackcyl
 * Date: 15/3/6
 * Time: 下午2:23
 */

namespace Demo\Model;


use Think\Model;

class UsersModel extends Model{

    public function getUsersInfoByNickname($nickname, $whereParam=''){
        $where = $whereParam;
        if(empty($nickname)){
            return '';
        }
        $where['nickname'] = trim($nickname);

        $userObj = $this->where($where)->find();

        return $userObj;

    }


    public function getUsersNicknameByUuid($uuid ,$whereParam=''){

        $where = $whereParam;
        if(empty($uuid)){
            return '匿名';
        }
        $where['uuid'] = trim($uuid);

        $userObj = $this->where($where)->find();

        if(!empty($userObj) && isset($userObj['nickname']) && !empty($userObj['nickname'])){
            return $userObj['nickname'];
        }
        return '匿名';
    }

    public function update($modelData = null){
        /* 获取数据对象 */
        $modelData = $this->create($modelData);

        if(empty($modelData)){
            return false;
        }

        $status = $this->save($modelData);
        if(false === $status){
            $this->error = '更新出错！';
            return false;
        }
        //添加或更新完成
        return $modelData;
    }
    public function addObj($modelData = null){
        /* 获取数据对象 */
        $modelData = $this->create($modelData);

        if(empty($modelData)){
            return false;
        }
        /* 添加或新增属性 */
        $this->add($modelData);
        //添加或更新完成
        return $modelData;
    }

} 