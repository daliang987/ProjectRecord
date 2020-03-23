<?php
namespace app\index\model;
use think\Model;

class Comment extends Model{

    protected $table="comment";
   
    public function store($data){
        $res=$this->validate(true)->save($data);
        if($res){
            return ['valid'=>1,'msg'=>'评论成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    public function del($id){
        $comment=Comment::get($id);
        $result=$comment->delete();
        if($result){
            return ['valid'=>1,'msg'=>'删除成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
}