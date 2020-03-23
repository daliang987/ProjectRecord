<?php
namespace app\index\model;
use think\Model;
use vendor\PHPExcel\PHPExcel;

class Record extends Model{
    protected $table="record";
    protected $pk="id";

    public function del($id){

        $result=$this->save(['delflag'=>1],['id'=>$id]);
        if($result){
            return ['valid'=>1,'msg'=>'已删除至回收站'];
        }else{
            return ['valid'=>0,'msg'=>'删除失败'];
        }
    }
   
    public function restore($id){
        $result=$this->save(['delflag'=>0],['id'=>$id]);
        if($result){
            return ['valid'=>1,'msg'=>'还原成功'];
        }else{
            return ['valid'=>0,'msg'=>'删除失败'];
        }
    }

    public function remove($id){
        $record=Record::get($id);
        $result=$record->delete();
        if($result){
            return ['valid'=>1,'msg'=>'已从回收站删除'];
        }else{
            return ['valid'=>0,'msg'=>'删除失败'];
        }
    }

    public function store($data){
        // halt($data);
        $result=$this->validate(true)->allowField(true)->save($data);
        if($result){
            return ['valid'=>1,'msg'=>'保存成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function edit($data){
        // halt($data);
        $result=$this->validate(true)->allowField(true)->save($data,['id'=>$data['id']]);
        if($result){
            return ['valid'=>1, 'msg'=>'修改成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }

}