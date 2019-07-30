<?php

/**
 * 装饰器接口
 */
interface Decorator {
    public function before ();
    public function after();
}

/**
 * 实现装饰器
 */
class ColorDecorator implements Decorator {
    protected $color;
    public function __construct($color) {
        $this->color = $color;
    }
    public function before() {
        echo "<div style='color:{$this->color}'>";
    }
    public function after() {
        echo '</div>';
    }
}

class FontSizeDecorator implements Decorator {
    protected $fontSize;
    public function __construct($fontSize) {
        $this->fontSize = $fontSize;
    }
    public function before() {
        echo "<div style='font-size:{$this->fontSize}'>";
    }
    public function after() {
        echo "</div>";
    }
}

class EchoHtml {
    protected $decorator = [];
    public function beforeEcho() {
        foreach($this->decorator as $decorator)
            $decorator->before();
    }
    public function afterEcho() {
        foreach($this->decorator as $decorator)
            $decorator->after();
    }
    public function addDecorator(Decorator $decorator) {
        $this->decorator[] = $decorator;
    }
    public function index() {
        $this->beforeEcho();
        echo '你好，我是装饰器';
        $this->afterEcho();
    }
}

$html = new EchoHtml();
$html->addDecorator(new ColorDecorator('red'));
$html->addDecorator(new FontSizeDecorator('40px'));
$html->index();
