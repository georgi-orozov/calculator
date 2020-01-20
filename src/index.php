<?php
require_once('models/Stack.php');
require_once('models/InfixToPostfix.php');

$view = new stdClass();
$view->pageTitle = 'Calculator';

if (isset($_GET['submit'])) {
    //Converting from infix to postfix
    $infixToPostfix = new InfixToPostfix();
    $infix = $_GET['expression'];
    $postfix_expression = $infixToPostfix->infixToPostfix($infix);
    var_dump($postfix_expression); die();

    //evaluation of the postfix expression
    $evaluation = new Stack();
    $expression = str_split($postfix);

    for ($i = 0; $i < count($expression); $i++) {
        $s = $expression[$i];

        // If the scanned character is a number push it to the stack
        if(is_numeric($s)) {
            $evaluation->push($s);
        }
        // If the scanned character is an operator, pop two elements from stack apply the operator
        else {
            $num1 = $evaluation->pop();
            $num2 = $evaluation->pop();

            switch ($s){
                case "+":
                    $evaluation->push($num2 + $num1);
                    break;
                case "-":
                    $evaluation->push($num2 - $num1);
                    break;
                case '*':
                    $evaluation->push($num2 * $num1);
                    break;
                case '/':
                    $evaluation->push($num2 / $num1);
                    break;
                case '^':
                    $evaluation->push($num2 ** $num1);
                    break;
            }
        }
    }

    $result = $evaluation->pop();
    //display the result
    $view->result = $result;
}



require_once('views/index.phtml');
