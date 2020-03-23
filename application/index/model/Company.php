<?php
namespace app\index\model;
use think\Model;

class Company extends Model{

    protected $table="company";
    protected $pk="id";

    public function store($data){
        $res=$this->validate(true)->save($data);
        if($res){
            return ['valid'=>1, 'msg'=>'保存成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }

    public function del($id){
        $company=Company::get($id);
        $result=$company->delete();
        if($result){
            return ['valid'=>1,'msg'=>'删除成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function edit($data){
        $result=$this->validate(true)->save($data,['id'=>$data['id']]);
        if($result){
            return ['valid'=>1,'msg'=>'修改成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
}