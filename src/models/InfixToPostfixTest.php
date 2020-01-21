<?php
require 'InfixToPostfix.php';
use PHPUnit\Framework\TestCase;

class InfixToPostfixTest extends TestCase {
    /**
     * @dataProvider additionProvider
     * @param $example
     */
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
}