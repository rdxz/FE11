<?php
class User
{
  /**
   * 用户信息
   */
  public static function info()
  {
    $info = [
      'id' => 1,
      'name' => 'stark',
      'age' => '18',
      'email' => 'wsd312@163.com',
      'password' => '123321',
      'phone' => '18066666666',
      'nickname' => 'starkname',
      'sex' => 1,
    ];
    return json_encode($info);
  }
}

$userinfo = User::info();

print_r($userinfo);