<?php
require 'InfixToPostfix.php';
use PHPUnit\Framework\TestCase;

class InfixToPostfixTest extends TestCase {
    /**
     * dataProvider additionProvider
     * @param $example
     *
    public function testInfixToPostfixForReturnType($example) {
        $infixToPostfix = new InfixToPostfix();
        $result = $infixToPostfix->infixToPostfix($example);
        $this->assertIsString($result);
    }

    /**
     * @dataProvider additionProvider
     * @param $example
     */
    public function testInfixToPostfixForNull($example) {
        $infixToPostfix = new InfixToPostfix();
        $result = $infixToPostfix->infixToPostfix($example);
        $this->assertNotNull($result);
    }

    public function additionProvider()
    {
        return [
            ["1+5*(9-1)"],
            ["(1+3)*(6-4)"],
            ["(2*5)+(8/4)"],
            ["(7*9)*(2+3*(2^6))"]
        ];
    }
    */

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