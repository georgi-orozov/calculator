<?php
require 'PostfixCalculation.php';
use PHPUnit\Framework\TestCase;

class PostfixCalculationTest extends TestCase {
    /**
     * @dataProvider additionProvider
     * @param $example
     */
    public function testPostfixCalculationForReturnType($example) {
        $postfixCalculation = new PostfixCalculation();
        $result = $postfixCalculation->postfixCalculation($example);
        $this->assertIsNumeric($result);
    }

    public function additionProvider()
    {
        return [
            ["1591-*+"],
            ["13+64-*"],
            ["25*84/+"],
            ["79*2326^*+*"]
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param $postfix
     * @param $expected
     */
    public function testPostfixCalculationForResult($postfix, $expected) {
        $postfixCalculation = new PostfixCalculation();
        $result = $postfixCalculation->postfixCalculation($postfix);
        $this->assertEquals($expected, $result);
    }

    public function dataProvider()
    {
        return [
            ["1591-*+", "41"],
            ["13+64-*", "8"],
            ["25*84/+", "12"],
            ["79*2326^*+*", "12222"]
        ];
    }
}