<?php

class Myfunctions {

    public function array_pluck($toPluck, $arr){
        $ret = array();
        foreach ($arr as $item) {
            $ret[] = $item[$toPluck];
        }
        return $ret;
    }
    
    public function array_pluck2($toPluck, $arr){
        return array_map(function($item) use($toPluck){
            return $item[$toPluck];
        }, $arr);
    }
    
}
$arr = array(
    array('name' => "ta7a", 'age' => 20, 'job' => "web developer"),
    array('name' => "fat", 'age' => 40, 'job' => "PHP developer"),
    array('name' => "sat", 'age' => 60, 'job' => "HTML5 developer"),
    array('name' => "rat", 'age' => 80, 'job' => "node.js developer")
);
//$test = new Myfunctions();
//print_r($test->array_pluck2("job", $arr));
 $a =   array('name' => "ta7a", 'age' => 20, 'job' => "web developer");

var_dump(extract($a));
echo $name;