<?php
define("CONSTANT", "Hello world.");
echo CONSTANT; // outputs "Hello world."
echo Constant; // 输出 "Constant" 并发出一个提示级别错误信息


// php 5.3以后的版本
// 以下代码在 PHP 5.3.0 后可以正常工作
const STARK = 'Hello World';

echo STARK;
