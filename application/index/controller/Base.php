<?php
/**
 * Created by 深圳市阿翼互联网有限公司.
 * User: yinliangliang
 * Date: 2019/1/5
 * Time: 11:16
 * file: Base.php
 * email:yll1024335892@163.com
 */

namespace app\index\controller;


use think\Controller;
use session\Session;

class Base extends Controller
{
    public function _initialize()
    {
        if(empty(session('f_user_name'))){

            $this->redirect(url('login/index'));
        }
    }
}