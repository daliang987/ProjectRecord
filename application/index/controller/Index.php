<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use think\Validate;

class Index extends Controller
{
    protected $user;

    protected function _initialize(){
        $this->user=new \app\index\model\User();
    }

    public function index(){
        if(session('username')){
            $this->redirect('index/record/person');
        }else{
            $this->redirect('index/index/login');
        }
    }

    public function login(){

        if(session('username')){
            $this->redirect('index/record/person');
        }

        if(request()->isPost()){
            $data=input('post.');
            $user=db('userinfo')->where('username',$data['username'])->find();
            // halt($user);
            if($user){
                if($user['password']==$data['password']){
                    Session::set('username',$user['username']);
                    Session::set('userid',$user['id']);
                    Session::set('department',$user['department']);
                    Session::set('isadmin',$user['isadmin']);
                    $this->redirect('index/record/person');
                }else{
                    $this->error('用户名或密码错误');
                }
            }else{
                $this->error('用户名或密码错误');
            }
        }
        return $this->fetch();
    }



    public function pass(){
        if(!session('username')){
            $this->redirect('index/index/login');exit;
        }

        if(request()->isPost()){
            $data=input('post.');
            $validate=new Validate([
                'password'=>'require',
                'newpass'=>'require|min:6',
                'confirmpass'=>'require|confirm:newpass',
            ],[
                'password.require'=>'原密码必须填写',
                'newpass.require'=>'新密码必须填写',
                'confirmpass.require'=>'确认新密码必须填写',
                'newpass.min'=>'新密码长度不得小于6位',
                'confirmpass.confirm'=>'两次密码输入不一致',
            ]);

            
            if(!$validate->check($data)){
                $this->error($validate->getError());exit;
            }
            

            $res=$this->user->pass($data);
            if($res['valid']){
                $this->success($res['msg']);exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        return $this->fetch();

    }
    
    public function logout(){
        session(null);
        session_destroy();
        cookie(session_id(),null);
        $this->redirect('index/index/login');
    }

}
