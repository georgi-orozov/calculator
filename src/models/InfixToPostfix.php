<?php
require_once('models/Stack.php');

class InfixToPostfix {

    public function __construct() {

    }

    public function infixToPostfix($infix) {
        // Initialising empty stack
        $stack = new Stack();
        // Getting the infix expression and turning it into array
        $array = str_split($infix);
        // Initialising empty string for the postfix expression
        $postfix = "";


        for ($i = 0; $i < count($array); $i++) {
            $char = $array[$i];

            // if the character is operand, add it to the postfix expression
            if($this->isOperand($char)) {
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
                else { // pop the '(' character
                    $stack->pop();
                }
            }
            // if the character is an operator
            elseif ($this->isOperator($char)){
                if(!$stack->isEmpty() && $this->findPrecedence($char) <= $this->findPrecedence($stack->top())) {
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
        return $postfix;
    }

    public function isOperator($char) {
        if($char == "+" || $char == "-" || $char == "*" || $char == "/" || $char == "^") {
            return true;
        }
        else {
            return false;
        }
    }

    public function isOperand($char) {
        return is_numeric($char);
    }

    public function findPrecedence($char) {
        switch ($char){
            case "+":
            case "-":
                return 1;
                break;
            case '*':
            case '/':
                return 2;
                break;
            case '^':
                return 3;
                break;
            default:
                return -1;
        }
    }
}