<?php
/**
 * Created by 深圳市阿翼互联网有限公司.
 * User: yinliangliang
 * Date: 2019/1/5
 * Time: 11:13
 * file: Report.php
 * email:yll1024335892@163.com
 */

namespace app\admin\controller;


class Report extends Base
{
    //举报信息
    public function index()
    {
        $where = '1=1';
        $userName = input('param.user_name');
        if(!empty($userName)){
            $where .= ' and report_user = "' . $userName . '"';
        }

        $list = db('report')->field('id,report_uid,report_user,reported_uid,reported_user,report_type,report_detail')
            ->where($where)->order('addtime desc')->paginate(10);
        $this->assign([
            'list' => $list,
            'uname' => empty($userName) ? '' : $userName,
            'total' => $list->total()
        ]);

        return $this->fetch();
    }

    //查看证据
    public function seeDetail()
    {
        $id = input('id');
        $detail = db('report')->field('content')->where('id', $id)->find();
        if(!empty($detail)){
            $detail = unserialize($detail['content']);
        }

        $this->assign([
            'detail' => $detail
        ]);

        return $this->fetch();
    }
}