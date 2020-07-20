<?php

namespace App\Http\Controllers\Wh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   
    //登录
    public function login(Request $Request)
    {
    	// phpinfo();die;
    	
        return view('login');
    }

    //首页
    public function index(Request $Request){

    	//查库
        $data_tp=DB::select('select * from tp_admin where id = ?', [1]);
    	var_dump($data_tp);die;

    	//接收数据
    	$data=$Request->all();
    	// var_dump($data);die;
        //储存
        $data_name=$data['name'];
        $data_pwd=$data['pwd'];
        $name=Redis::SET("name",$data_name);
        $pwd=Redis::SET("name",$data_pwd);
        $name=Redis::GET("name");
        $pwd=Redis::GET("pwd");

        // var_dump($name);die;
        if ($Request->isMethod('post')) {
        	return view('index');
		}
    }

    //登出
    public function loginOut(){
    	Redis::DEL("name","pwd");
    	return redirect('wh/login');
    }
}
