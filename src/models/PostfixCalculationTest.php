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
}