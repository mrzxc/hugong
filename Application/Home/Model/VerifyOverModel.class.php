<?php
namespace Home\Model;
use Think\Model;

/**
* 手机验证次数超过3次
*/

Class VerifyOverModel extends Model{
    private $trueTableName = 'verify_over';
    private static $ip = '';
    function __construct($ip){
        self::$ip = $ip;
    }
    public function addto()
    {
        $me = M('verify_over');
        $data = [
        'ip'    =>  self::$ip,
        'date'  =>  date('Y-m-d',time())
        ];
        return $me->data($data)->add();
    }
    //检查是否应该发短信
    public function check()
    {
        $me = M('verify_over');
        $condition['ip'] = self::$ip;

        $data = $me->where($condition)->find();
        if (is_null($data)) {
            return 1;
        }else{
            $date = new \DateTime($data['date']);
            $date_ = new \DateTime(date('Y-m-d'));
            return $date < $date_;
        }
    }
    public function deleteto()
    {
        $m = M('verify_over');
        $con = array(
            'ip' => self::$ip
            );
        $m->where($con)->delete();
    }
}



 ?>