<?php

$hero = array('法师' => '安琪拉','刺客' => '李白', '坦克' => '程咬金',);

//error 
// echo $hero;

// right
echo '<pre>';
print_r($hero);

var_dump($hero);

$hero = ['法师'=>'王昭君','刺客'=>'兰陵王','坦克' => '张飞',];

print_r($hero);




$hero = [
  '法师' => ['安琪拉','王昭君','女娲','妲己','貂蝉',],
  '刺客' => ['兰陵王','李白','阿珂','猴子','韩信'],
  '坦克' => ['程咬金','曹操','梦琪','吕布','苏烈']
];

print_r($hero);


$fashi = $hero['法师'];

print_r($fashi);