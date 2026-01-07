<?php
namespace app\index\controller;
use think\Controller;

class Company extends Admin{
    
    protected $db;

    public function _initialize(){
        parent::_initialize();
        $this->db= new \app\index\model\Company();
    }

    public function index(){
       
        $allcom= db('company');
        $pageParam=['query'=>[]];
        $com_name=input('get.com_name')?input('get.com_name'):'';
        if($com_name){
            $allcom->where('a.com_name','like','%'.$com_name.'%');
            $this->assign('company_name',$com_name);
            $pageParam['query']['com_name']=$com_name;
        }

        $company=$allcom->alias('a')->join('company c','a.com_pid=c.id','left')->field('a.id,c.id as cid,c.com_name as parent_name,a.com_name,a.com_pid')->order('com_pid asc,parent_name asc,id asc')->paginate(15,false,$pageParam);
        $this->assign("_company",$company);
        return $this->fetch();
    }

    public function store(){
        $parent=db('company')->where('com_pid',0)->select();
        $this->assign('_parent',$parent);
        if(request()->isPost()){
            $data=input('post.');
            $res=$this->db->store($data);
            if($res['valid']){
                $this->success($res['msg'],'index');
            }else{
                $this->error($res['msg']);
            }
        }
        return $this->fetch();
    }

    public function edit(){

        $data=db('company')->find(input('param.id'));
        $this->assign('company',$data);
        $parent=db('company')->where('com_pid',0)->select();
        $this->assign('_parent',$parent);
        $page=input('param.page')?input('param.page'):1;
        $this->assign('page',$page);

        if(request()->isPost()){
            $data=input('post.');
            $page = $data['page']?$data['page']:1;
            $res=$this->db->edit($data);
            if($res['valid']){
                $this->success($res['msg'],url('index')."?page=".$page);
            }else{
                $this->error($res['msg']);
            }
        }

        return $this->fetch(); 
    }

    public function del(){
       $id=input('get.id');
       $page=input('get.page')?input('get.page'):1;
       $res=$this->db->del($id);
       if($res['valid']){
           $this->success($res['msg'],url('index')."?page=".$page);
       } else{
           $this->error($res['msg']);
       }
    }
}