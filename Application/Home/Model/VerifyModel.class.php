<?php
namespace Home\Model;
use Think\Model;
/**
* 手机验证类
*/
class VerifyModel
{
    public $phone = '';
    protected function random($n)
    {
        $a ='';
        for ($i=0; $i < $n; $i++) {
            $a .= mt_rand(0,9);
        }
        return $a;
    }
    protected function sent()
    {
        if (session('verify_time')+60 > time()) {
            return 0;
        }
        $randoms = (string)$this->random(6);
        $ch = curl_init();
        $timeout = 5;
        curl_setopt ($ch, CURLOPT_URL, 'https://106.ihuyi.com/webservice/sms.php?method=Submit&account=cf_zxc_nl&password=zxcvbnm,./&mobile='.$this->phone.'&content=您的验证码是：【'.$randoms.'】。请不要把验证码泄露给其他人。');
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        session('verify',$randoms);
        session('verify_time',time());
        return 1;
    }
    public function ask()
    {
        $ip = get_client_ip();
        $model = new \Home\Model\VerifyOverModel($ip);
        if ($model->check()) {
            if (session('asktime') == 2) {
                session('asktime', null);
                $model->addto();
            }else{
                session('asktime',session('asktime')+1);
            }
            session('phone',$this->phone);
            return $this->sent();
        }else return -1;
    }
    public function fit($num)
    {
        if (session('verify_time') + 180 < time()) {
            return 0;
            }elseif (session('verify') == $num) {
                session('verify',null);
                session('verify_time',null);
                $m = new \Home\Model\VerifyOverModel($ip);
                $m->deleteto();
                return 1;
            }else{
                return 2;
            }
    }
}


 ?>