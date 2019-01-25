<?php
/**
 * Created by 深圳市阿翼互联网有限公司.
 * User: yinliangliang
 * Date: 2019/1/5
 * Time: 13:34
 * file: Base.php
 * email:yll1024335892@163.com
 */

namespace app\phone\controller;


use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        if(empty(cookie('phone_user_name'))){

            $this->redirect(url('login/index'));
        }
    }
}