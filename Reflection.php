<?php

function test() {
    echo 'test';
}

/**
 * 查找函数所在的文件夹
 */
$func = Reflection::export(new ReflectionFunction('test'));
var_dump($func);
