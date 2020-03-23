<?php
namespace app\index\validate;
use think\Validate;

class Comment extends Validate{
    protected $rule=[
        'comment'=>'require|max:120',
    ];

    protected $message=[
        'comment.require'=>'评论内容不能为空',
        'comment.max'=>'评论长度不能超过120个字',
    ];
}



