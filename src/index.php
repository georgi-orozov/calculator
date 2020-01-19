<?php
require_once('models/Stack.php');

$view = new stdClass();
$view->pageTitle = 'Calculator';

if (isset($_GET['submit'])) {
    $stack = new Stack();
    $infix = $_GET['expression'];
    $postfix = "";
    $array = str_split($infix);

    for ($i = 0; $i < count($array); $i++) {
        $char = $array[$i];

        if($stack->isOperand($char)) {
            $postfix .= $char;
        }
        elseif ($char == "(") {
            $stack->push($char);
        }
        elseif ($char == ")") {
            while (!$stack->isEmpty() && $stack->top() != "(") {
                $postfix .= $stack->pop();
            }

            if(!$stack->isEmpty() && $stack->top() != "(") {
                $postfix = "Invalid infix expression";
            }
            else {
                $stack->pop();
            }
        }
        elseif ($stack->isOperator($char)){
            if(!$stack->isEmpty() && $stack->findPrecedence($char) <= $stack->findPrecedence($stack->top())) {
                $postfix .= $stack->pop();
            }
            $stack->push($char);
        }
        else {
            $postfix = "Invalid infix expression";
        }
    }
    while(!$stack->isEmpty()) {
        if($stack->top() == "(") {
            $postfix = "Invalid infix expression";
        }
        $postfix .= $stack->pop();
    }

    $view->postfix = $postfix;
}



require_once('views/index.phtml');
