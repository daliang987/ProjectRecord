<?php
namespace app\index\model;
use think\Model;

class User extends Model{
    protected $table="userinfo";
    protected $pk="id";

    public function edit($data){

        $result=$this->validate(true)->allowField(true)->save($data,['id'=>$data["id"]]);
        if($result){
            return ['valid'=>1,'msg'=>'修改成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function store($data){

        $result=$this->validate(true)->allowField(true)->save($data);
        if($result){
            return ['valid'=>1,'msg'=>'添加用户成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function forbidden($id){
        $result=$this->save(['forbidden'=>1],['id'=>$id]);
        if($result){
            return ['valid'=>1,'msg'=>'用户禁用成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }


    public function pass($data){
        $user=db('userinfo')->find(session('userid'));
        if($user['password']==$data['password']){
            $result=$this->save(['password'=>$data['newpass']],['id'=>$user['id']]);
            if($result){
                return ['valid'=>1,'msg'=>'修改密码成功'];
            }else{
                return ['valid'=>0,'msg'=>'修改密码失败'];
            }
        }else{
            return ['valid'=>0,'msg'=>'原密码不正确'];
        }
    }
}