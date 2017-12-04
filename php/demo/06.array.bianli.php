<?php

$hero = array('法师' => '安琪拉','刺客' => '李白', '坦克' => '程咬金',);

//error 
// echo $hero;

// right
// echo '<pre>';
// print_r($hero);

// var_dump($hero);

$hero = ['法师'=>'王昭君','刺客'=>'兰陵王','坦克' => '张飞',];
$heros = ['王昭君','兰陵王','张飞',];

for ($i=0; $i < count($heros); $i++) { 
  # code...
  echo "<li>". $heros[$i]."</li>";
}


foreach ($hero as $key => $value) {
  # code...
  echo "英雄：".$value. "---".$key ."<br>";
}
// print_r($hero);


$hero = [
  '法师' => ['安琪拉','王昭君','女娲','妲己','貂蝉',],
  '刺客' => ['兰陵王','李白','阿珂','猴子','韩信'],
  '坦克' => ['程咬金','曹操','梦琪','吕布','苏烈']
];

// print_r($hero);


$fashi = $hero['法师'];
 echo '============================================================'.'<br>';
// print_r($fashi);

foreach ($hero as $key => $value) {
  # code...
  echo $key .'<br>';
  foreach ($value as  $heroname) {
    echo "英雄：".$heroname. "---".$key ."<br>";
    # code...
  }
}