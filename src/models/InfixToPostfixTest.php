<?php
require 'InfixToPostfix.php';
use PHPUnit\Framework\TestCase;

class InfixToPostfixTest extends TestCase {

    public function testInfixToPostfixSimple() {
        $infixToPostfix = new InfixToPostfix();
        $infix = "1+0";
        $postfix = $infixToPostfix->infixToPostfix($infix);
        $this->assertIsString($postfix);
        $this->assertEquals("10+", $postfix);
    }

    public function testInfixToPostfix() {
        $infixToPostfix = new InfixToPostfix();
        $infix = "1+2*3";
        $postfix = $infixToPostfix->infixToPostfix($infix);
        $this->assertIsString($postfix);
        $this->assertEquals("123*+", $postfix);
    }

    public function testInfixToPostfixAdvanced() {
        $infixToPostfix = new InfixToPostfix();
        $infix = "(7*9)*(2+3*(2^6))";
        $postfix = $infixToPostfix->infixToPostfix($infix);
        $this->assertIsString($postfix);
        $this->assertEquals("79*2326^*+*", $postfix);
    }

}