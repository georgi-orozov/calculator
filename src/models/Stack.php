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

    /**
     * @description Adding item to the stack
     * @param $item
     * @throws RuntimeException - if the stack is full
     */
    public function push($item) {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }

    /**
     * @return mixed - the top element, if the stack is not empty
     * @throws RuntimeException - if the stack is empty
     */
    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
            throw new RunTimeException('Stack is empty!');
        } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
    }

    /**
     * @return mixed - the top element, if the stack is not empty, false - otherwise
     */
    public function top() {
        return current($this->stack);
    }

    /**
     * @return bool - true if the stack is empty, false - otherwise
     */
    public function isEmpty() {
        return empty($this->stack);
    }
}