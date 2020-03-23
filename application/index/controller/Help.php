<?php
namespace app\index\controller;
use think\Controller;

class Help extends Controller{

    protected $db;

    protected function _initialize(){
        $this->db=new \app\index\model\Comment();
    }

    public function manual(){

        return $this->fetch();
    }

    public function bug(){

        if(request()->isPost()){
            $data=input('post.'); 
            $data['uid']=session('userid');
            $data['datetime']=date('y-m-d H:i:s',time());
            $res=$this->db->store($data);
            if($res['valid']){
                $this->success($res['msg']);exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        $comment=db('comment')->field('c.id as cid,uid,comment,datetime,u.username')->alias('c')->join('userinfo u','c.uid=u.id','left')->order('datetime','desc')->paginate(10);
        $this->assign('comment',$comment);

        return $this->fetch();
    }

    public function delbug(){
        $id=input('get.id');
        $comment=db('comment')->find($id);
        if($comment['uid']==session('userid')){
            $res=$this->db->del($id);
            if($res['valid']){
                $this->success($res['msg']);exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }else{
            $this->error('你没有权限删除该评论');
        }
        
    }
}