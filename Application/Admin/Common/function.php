<?php


//分页；
	function handPage($data,$num,$page)
    {
        $pcount = (int)(count($data) / $num + 1);
        $info['count'] = $pcount;
        $info['data'] = array_slice($data, $page * $num, $num);
        return $info;
    }
//随机数
    function random($n)
    {
        $a ='';
        for ($i=0; $i < $n; $i++) {
            $a .= mt_rand(0,9);
        }
        return $a;
    }
 ?>