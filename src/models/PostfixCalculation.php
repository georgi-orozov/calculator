<?php
require_once('Stack.php');

class PostfixCalculation {
    public function __construct() {

    }

    public function postfixCalculation($postfix) {
        $stack = new Stack();
        $expression = str_split($postfix);

        for ($i = 0; $i < count($expression); $i++) {
            $s = $expression[$i];

            // If the scanned character is a number push it to the stack
            if(is_numeric($s)) {
                $stack->push($s);
            }
            // If the scanned character is an operator, pop two elements from stack apply the operator
            else {
                $num1 = $stack->pop();
                $num2 = $stack->pop();

                switch ($s){
                    case "+":
                        $stack->push($num2 + $num1);
                        break;
                    case "-":
                        $stack->push($num2 - $num1);
                        break;
                    case '*':
                        $stack->push($num2 * $num1);
                        break;
                    case '/':
                        $stack->push($num2 / $num1);
                        break;
                    case '^':
                        $stack->push($num2 ** $num1);
                        break;
                }
            }
        }

        $result = $stack->pop();
        return $result;
    }
}