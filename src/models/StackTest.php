<?php
require 'Stack.php';
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase{
    public function testEmpty() {
        $stack = new Stack();
        $result = $stack->isEmpty();
        $this->assertTrue($result);
    }

    public function testPop() {
        $stack = new Stack();
        $this->expectException(RunTimeException::class);
        $stack->pop();
    }

    public function testPopAdvanced() {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());
        $stack->push("a");
        $this->assertFalse($stack->isEmpty());
        $result = $stack->pop();
        $this->assertNotNull($result);
        $this->assertEquals("a", $result);
        $this->assertTrue($stack->isEmpty());
    }

    public function testTop() {
        $stack = new Stack();
        $this->assertFalse($stack->top());
        $stack->push("a");
        $stack->push("b");
        $stack->push("c");
        $this->assertEquals("c", $stack->top());
    }

    public function testPushException() {
        $stack = new Stack();
        $stack->push("1");
        $stack->push("2");
        $stack->push("3");
        $stack->push("4");
        $stack->push("5");
        $stack->push("6");
        $stack->push("7");
        $stack->push("8");
        $stack->push("9");
        $stack->push("10");
        $stack->push("11");
        $stack->push("12");
        $stack->push("13");
        $stack->push("14");
        $stack->push("15");
        $stack->push("16");
        $stack->push("17");
        $stack->push("18");
        $stack->push("19");
        $stack->push("20");
        $this->expectException(RunTimeException::class);
        $stack->push("21");

    }
}