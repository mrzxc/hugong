<?php
namespace Home\Controller;
use Think\Controller;
/**
*登录、注册
*/
class UserController extends Controller
{
    private function access()
    {

        if(!empty(cookie('user')) && !empty(session('user')) && session('user') == cookie('user'))
        {
            $this->display('Index:index');
        }
    }
    public function register()
    {
        $this->display('register');
    }
    public function login()
    {
        $this->display('login');
    }
    public function signin()
    {
        $phone = preg_match('/^[1-9]\d{10}$/', $_POST['phone']) ? $_POST['phone'] : null;
        $pass = addslashes($_POST['pass']);
        if(is_null($phone)) die('phonenumber error');
        $m = M('user');
        $con = array(
            'phone' => $phone
            );
        $arr = $m->where($con)->find();
        if($arr['password'] == $pass)
        {
            session('user', $arr['id']);
            cookie('user', $arr['id']);
            $this->access();
        }else{
            echo '帐号或者密码错误,5s后返回登录界面';
            header('Refresh:5;url=http://127.0.0.1:8080/hugong/index.php/Home/User/login');
        }
    }
    public function signup()
    {
        $phone = preg_match('/^[1-9]\d{10}$/', $_POST['phone']) ? $_POST['phone'] : null;
        if ($phone != session('phone')) {
            die('该手机号未验证');
        }
        $pass = addslashes($_POST['pass']);
        $user = M('user');
        $data = array(
            'phone' => $phone,
            'password' => $pass,
            'data' => date()
            );
        if($user->add($data) === false){
            error('注册失败,请您重试');
        }
        $arr = $user->where($data)->find();
        cookie('user', $arr['id']);
        session('user', $arr['id']);
        $this->access();
    }

    //发送验证码
    public function ajax() {
        $phone = preg_match('/^[1-9]\d{10}$/', $_POST['phone']) ? $_POST['phone'] : null;
        $verify = new \Home\Model\VerifyModel();
        $verify->phone = $phone;
        echo $verify->ask();
    }
    //审核验证码
    public function check() {
        $check = new \Home\Model\VerifyModel();
        $num = preg_match('/^\d{6}$/', $_GET['verifyNum']) ? $_GET['verifyNum'] : null;
        if(!is_null($num))
            $verifyCode = $check->fit($num);
        switch ($verifyCode) {
            case 0;
                $me = [
                'code' => 0,
                'message' => '手机验证码过期'
                ];
                break;
            case 1;
                $me = [
                'code' => 1,
                'message' => '手机验证码正确'
                ];
                break;
            default:
                $me = [
                'code' => 2,
                'message' => '验证码错误'
                ];
                break;
        }
        echo json_encode($me);
    }
    public function se()
    {
        $arr = [
        'url' => 'http://127.0.0.1:8080/hugong/index.php/Home/User/signin',
        'method' => 'post',
        'data' => ['phone' => '/^[1-9]\d{10}$/','pass' => '']
        ];


        echo json_encode($arr);
    }
}
 ?>