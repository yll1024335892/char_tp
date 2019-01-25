<?php
/**
 * Created by 深圳市阿翼互联网有限公司.
 * User: yinliangliang
 * Date: 2019/1/5
 * Time: 11:11
 * file: Chat.php
 * email:yll1024335892@163.com
 */

namespace app\admin\controller;


class Chat extends Base
{
    public function index()
    {
        if(request()->isPost()){

            $data = input('post.');
            $data['file_ext'] = trim($data['file_ext']);
            $data['img_ext'] = trim($data['img_ext']);

            writeCtConfig($data);
            return json(['code' => 1, 'data' => '', 'msg' => '配置成功']);
        }

        $config = readCtConfig();

        empty($config) &&
        $config = ['file_size' => 2, 'file_ext' => 'zip|rar', 'img_size' => 2, 'img_ext' => 'png|jpg|gif'];

        $this->assign([
            'config' => $config,
            'up_size' => ini_get('upload_max_filesize')
        ]);

        return $this->fetch();
    }
}