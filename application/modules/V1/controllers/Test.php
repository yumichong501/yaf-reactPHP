<?php


class TestController extends BaseController
{

    public function indexAction(){
        $max_num = rand(1000,9999);
        for ($i=1;$i<=60;$i++){
            $list[] = rand(1,$max_num);
        }
        $result = $this->m_sort($list);
        return $this->response(0,  $result,"ok");
    }


    //冒泡
    function m_sort($arr){
        $len = count($arr);
        for ($i = 0; $i < $len -1; $i++) {
            for ($j = 0; $j < $len - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                }
            }
        }
        return $arr;
    }
}