<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    function index()
    {
        $this->display();
    }

//主页数据获取
    public function Ajax()
    {
        $page = is_numeric($_GET['page']) ? $_GET['page']-1 : 0;
        $condition = array(
            'place' => is_numeric($_GET['place']) ? $_GET['place'] : 0,
            'type' => is_numeric($_GET['type']) ? $_GET['type'] : 0,
            'ability' => is_numeric($_GET['ability']) ? $_GET['ability'] : 0,
            'wage' => is_numeric($_GET['wage']) ? $_GET['wage'] : 0
            );
        foreach ($condition as $key => $value) {
            if ($value == 0) {
                unset($condition[$key]);
            }
        }
        unset($value);
        $condition['status'] = 0;
        $sortCode = is_numeric($_GET['sort']) ? $_GET['sort'] : 0;
        $mdel = D('WorkerInformation');
        $arr = $mdel->where($condition)->getField('id,place,wage,type,src,star,ability');
        $arr = $this->sortMethod($arr, $sortCode);
        $num = 15;               // 每页数据
        $returnArr = handPage($arr, $num, $page);
        echo json_encode($returnArr);
    }

//数据排序
    private function sortMethod($arr, $sortCode)
    {
        switch ($sortCode) {
            case '0':
                break;
            case '1':
                usort($arr, function($a, $b){
                    if($a['star'] == $b['star']){
                        return 0;
                    }
                    return $a['star'] > $b['star'] ? -1 : 1;
                });
                break;
            case '2':
                usort($arr, function($a, $b){
                    if($a['wage'] == $b['wage']){
                        return 0;
                    }
                    return $a['wage'] < $b['wage'] ? -1 : 1;
                });
                break;
            case '3':
                usort($arr, function($a, $b){
                    if($a['age'] == $b['age']){
                        return 0;
                    }
                    return $a['age'] < $b['age'] ? -1 : 1;
                });
                break;
            default:
                break;
        }
        return $arr;
    }
    public function detail()
    {
        $this->display();
    }
    // function dasdsa(){
    //     $mdel = D('WorkerInformation');
    //     for ($i=1; $i < 76; $i++) {
    //         $data['star'] = mt_rand(5,10);
    //         $con['id'] = $i;
    //         $mdel->where($con)->save($data);
    //     }
    // }

}