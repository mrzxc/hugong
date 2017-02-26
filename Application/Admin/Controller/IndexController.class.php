<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
public function fdsafrsdsaffdghweom()
{
    $model = M();
    $arr = array(
        '1'=>'小学',
        '2'=>'初中',
        '3'=>'高中',
        '4'=>'中专',
        '5'=>'大专',
        '6'=>'本科',
        '7'=>'硕士'
        );
    $i = 0;
    foreach ($arr as $key => $value) {
        $arr1[$i]['id'] = $key;
        $arr1[$i]['name'] = $value;
        $i++;
    }
    // var_dump($arr1);
    // $model->addAll($arr1);
}
function insertsome()
{
        $cer = random(18);
        $phone = random(11);
        $type = mt_rand(1,3);
        $place = mt_rand(1,18);
        $age = mt_rand(30,55);
        $education = mt_rand(1,10);
        $wage = mt_rand(1,10);
        $src = 'https://img.alicdn.com/bao/uploaded/TB1Ij3MMXXXXXaHXpXXSutbFXXX.jpg';
        $star = mt_rand(0,5);
        $arr = [
        'certificate'    =>   $cer,
        'phone'   =>   $phone,
        'type'   =>   $type,
        'place'   =>   $place,
        'age'   =>   $age,
        'education'   =>   $education,
        'wage'   =>   $wage,
        'src'   =>   $src,
        'star'   =>   $star
        ];

        $star = mt_rand(0,5);
        $model = M('WorkerInformation');
        $model->add($arr);
}
// function updataStar()
// {
//     $m = D('WorkerInformation');
//     for ($i=0; $i < 75; $i++) {
//         $con = [
//             'id' =>  $i
//         ];
//         $old->$m->where($con)->field('star');
//     }

// }
}