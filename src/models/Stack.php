<?php


class Stack {
    private $stack;
    private $limit;

    public function __construct($limit = 20) {
        // initialize the stack
        $this->stack = array();
        // stack can only contain this many items
        $this->limit = $limit;
    }

    public function push($item) {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
            throw new RunTimeException('Stack is empty!');
        } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
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