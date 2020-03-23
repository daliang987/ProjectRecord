<?php
namespace app\index\controller;
use think\Controller;

class Auth extends Controller{

    protected function _initialize(){
        if(!session('userid')){
            $this->redirect('index/index/login');
        }
    }
}