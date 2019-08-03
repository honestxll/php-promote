<?php


class C {
    function __construct() {
        echo 3;
        if (method_exists($this, '_initialize')) {
            $this->_initialize();
        }
    }
}

class B extends C {
    function _initialize() {
        echo 2;
        if (method_exists($this, '__initialize')) {
            $this->__initialize();
        }
    }
}


class A extends B {
    function __initialize() {
        echo 1;
    }
}

new A;