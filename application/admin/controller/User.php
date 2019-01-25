<?php
/**
 * Created by 深圳市阿翼互联网有限公司.
 * User: yinliangliang
 * Date: 2019/1/5
 * Time: 11:09
 * file: User.php
 * email:yll1024335892@163.com
 */

namespace app\admin\controller;


class User extends Base
{
    //用户列表
    public function index()
    {
        $where = '1=1';
        $userName = input('param.user_name');
        if(!empty($userName)){
            $where .= ' and user_name = "' . $userName . '"';
        }

        $list = db('chatuser')->where($where)->paginate(10);
        $this->assign([
            'list' => $list,
            'uname' => empty($userName) ? '' : $userName,
            'total' => $list->total(),
            'sex' => ['1' => '男', '-1' => '女']
        ]);

        return $this->fetch();
    }
}