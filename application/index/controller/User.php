<?php
namespace app\index\controller;
use think\Controller;

class User extends Admin{

    protected $db;

    protected function _initialize(){
        parent::_initialize();
        $this->db=new \app\index\model\User();
    }

    public function index(){
        $userinfo= db('userinfo');
        $pageParam=['query'=>[]];
        $username=input('get.username')?input('get.username'):'';
        if($username){
            $userinfo->where('username','like','%'.$username.'%');
            $this->assign('username',$username);
            $pageParam['query']['username']=$username;
        }

        $user=$userinfo->paginate(15,false,$pageParam);
        $this->assign('_user',$user);
        return $this->fetch();
    }

    public function store(){

        if(request()->isPost()){
            $data=input('post.');
            $res=$this->db->store($data);
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        return $this->fetch();
    }

    public function edit(){
        $id=input('param.id');
        $user=db('userinfo')->find($id);
        $this->assign('user',$user);

        if(request()->isPost()){
            $data=input('post.');
            $res=$this->db->edit($data);
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        return $this->fetch();
    }


    public function forbidden(){
        $id=input('get.id');
        $res=$this->db->forbidden($id);
        if($res['valid']){
            $this->success($res['msg'],'index');exit;
        }else{
            $this->error($res['msg']);exit;
        }
    }

    public function start_user(){
        $id=input('get.id');
        $res=$this->db->start_user($id);
        if($res['valid']){
            $this->success($res['msg'],'index');exit;
        }else{
            $this->error($res['msg']);exit;
        }
    }

    
}