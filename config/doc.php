<?php

return [
    'prefix'=>env('DOC_PREFIX','doc'), //访问前缀
    'api_prefix'=>env('DOC_API_PREFIX','/api'), //api请求前缀
    'title' => env('DOC_TITLE','APi接口文档'),  //文档title
    'version'=>env('DOC_VERSION','1.0.0'), //文档版本
    'copyright'=>env('DOC_COPYRIGHT',''), //版权信息
    'password' => env('DOC_PASSWORD',''), //访问密码，为空不需要密码

    'static_path' => 'apidoc', //视图，css,js文件路径
    'controller' => [
        'App\Http\Controllers\Api\UserController',

    ],
    'filter_method' => [
        //过滤 不解析的方法名称
    ],
    'return_format' => [
        //数据格式
        'success' => "true",
        "code"=> '200',
        "msg"=> '消息提示',
    ],
    'public_header' => [
        //全局公共头部参数
//        ['name'=>'source', 'require'=>0, 'default'=>'APP', 'desc'=>'source来源 APP,H5'],

    ],
    'public_param' => [
        //全局公共请求参数，设置了所以的接口会自动增加次参数
        //如：['name'=>'token', 'type'=>'string', 'require'=>1, 'default'=>'', 'other'=>'' ,'desc'=>'验证（全局）')']
    ],
];
