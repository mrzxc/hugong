<?php
function handPage($data,$num,$page)
{
    $pcount = (count($data) % $num == 0) ? (int)(count($data) / $num) : (int)(count($data) / $num + 1);
    $info['pageCount'] = $pcount;
    $info['data'] = array_slice($data, $page * $num, $num);
    return $info;
}
    function sortMethod($a, $b){
        if($a['star'] == $b['star']){
            return 0;
        }
        return $a['star'] > $a['star'] ? -1 : 1;
    }
 ?>