<?php
class Foo
{
    function do_foo()
    {
        echo "Doing foo."; 
    }
}

$bar = new foo;
$bar->do_foo();

echo '<br>========================================<br>';


class Stark
{
  public $name = 'stark';

  public function name()
  {
    echo 'my name is '. $this->name;
  }
}


$stark = new Stark();

$stark->name();


echo '<br>========================================<br>';


class Shudong
{
  public static $name = 'shudong';

  public static function name()
  {
     echo 'my name is '. self::$name;
  }
}

Shudong::name();