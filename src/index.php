<?php
require_once('models/Stack.php');

$view = new stdClass();
$view->pageTitle = 'Calculator';

if (isset($_GET['submit'])) {
    // Initialising empty stack
    $stack = new Stack();
    // Getting the infix expression and turning it into array
    $infix = $_GET['expression'];
    $array = str_split($infix);
    // Initialising empty string for the postfix expression
    $postfix = "";


    for ($i = 0; $i < count($array); $i++) {
        $char = $array[$i];

        // if the character is operand, add it to the postfix expression
        if($stack->isOperand($char)) {
            $postfix .= $char;
        }
        // if the character is a '(', push it to the stack
        elseif ($char == "(") {
            $stack->push($char);
        }
        // if the character is an ‘)’, pop and add the characters from the stack
        // to the postfix expression until '(' is met
        elseif ($char == ")") {
            while (!$stack->isEmpty() && $stack->top() != "(") {
                $postfix .= $stack->pop();
            }
            // if the stack is not empty after the addition to the postfix expression
            // and the top element is not an '(' display an error message
            if(!$stack->isEmpty() && $stack->top() != "(") {
                $postfix = "Invalid infix expression";
            }
            else { // pop the '(' character; allows garbage collection
                $stack->pop();
            }
        }
        // if the character is an operator
        elseif ($stack->isOperator($char)){
            if(!$stack->isEmpty() && $stack->findPrecedence($char) <= $stack->findPrecedence($stack->top())) {
                $postfix .= $stack->pop(); // add the top element from the stack to the postfix expression
                                           // if the met character has precedence lower or equal than it
            }
            $stack->push($char); // add the character to the stack
        }
        else {
            $postfix = "Invalid infix expression";
        }
    }
    // pop all the operators from the stack and add them to the postfix expression
    while(!$stack->isEmpty()) {
        if($stack->top() == "(") { // the inputted expression is wrong if an '(' has been left in the stack
            $postfix = "Invalid infix expression";
        }
        $postfix .= $stack->pop();
    }
    //evaluation of the postfix expression
    $evaluation = new Stack();
    $expression = str_split($postfix);

    for ($i = 0; $i < count($expression); $i++) {
        $s = $expression[$i];

        if(is_numeric($s)) {
            $evaluation->push($s);
        }
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
//                case '^':
//                    $evaluation->push($num1 $num2);
//                    break;
            }
        }
    }

    $result = $evaluation->pop();
    $view->result = $result;

    //$view->postfix = $postfix;
}



require_once('views/index.phtml');
