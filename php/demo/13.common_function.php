<?php
echo "<pre>";
// array_sum()
$a = array(2, 4, 6, 8);
echo "sum(a) = " . array_sum($a) . "\n";

$b = array("a" => 1.2, "b" => 2.3, "c" => 3.4);
echo "sum(b) = " . array_sum($b) . "\n";

// array_key_exists()
$search_array = array('first' => 1, 'second' => 4);
if (array_key_exists('first', $search_array)) {
    echo "The 'first' element is in the array";
}

// array_keys()
$array = array(0 => 100, "color" => "red");
print_r(array_keys($array));

$array = array("blue", "red", "green", "blue", "blue");
print_r(array_keys($array, "blue"));

$array = array("color" => array("blue", "red", "green"),
               "size"  => array("small", "medium", "large"));
print_r(array_keys($array));


// array_pop — 弹出数组最后一个单元（出栈）

$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);

// array_push — 将一个或多个单元压入数组的末尾（入栈） 
$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");
print_r($stack);



// implode()
$array = array('lastname', 'email', 'phone');
$comma_separated = implode(",", $array);

echo $comma_separated; // lastname,email,phone

// Empty string when using an empty array:
var_dump(implode('hello', array())); // string(0) ""


$student = ['sunchen','yejiahui','madongxu'];
$address = ['北京','石景山','苹果园'];

echo implode(',',$address);



// explode — 使用一个字符串分割另一个字符串

// 示例 1
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2

// 示例 2
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user; // foo
echo $pass; // *


$address = '北京市，石景山区，苹果园大街，实兴东街';


$addressArray = explode('，',$address);

print_r($addressArray);


// md5 
$password = '123456';
$md5pw = md5($password.time());

echo $md5pw;

// sort — 对数组排序

$fruits = array("lemon", "orange", "banana", "apple");
sort($fruits);
foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . "\n";
}


// in_array — 检查数组中是否存在某个值

$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
if (in_array("mac", $os)) {
    echo "Got mac";
}

// 时间

echo '<br> ======================================================== </br>';
$now = time();
print_r($now);

$readTime = date('Y-m-d H:i:s',time());
echo '<br> ======================================================== </br>';

print_r($readTime);
$readTime = date('Y年m月d日 H:i:s',time());
echo '<br> ======================================================== </br>';

print_r($readTime);

// 随机数
echo '<br> ======================================================== </br>';
// Note: 在某些平台下（例如 Windows）getrandmax() 只有 32767。如果需要的范围大于 32767，那么指定 min 和 max 参数就可以生成更大的数了，或者考虑用 mt_rand() 来替代之。 
echo rand() . "\n";
echo rand() . "\n";

echo rand(5, 15). "\n";
echo rand(5, 15). "\n";

echo '<br> ======================================================== </br>';

echo  $vip = 'vip' .rand(10,99) .time() . rand(100,999); 


