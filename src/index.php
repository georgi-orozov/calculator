<?php
$view = new stdClass();
$view->pageTitle = 'Calculator';

if (isset($_GET['submit'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operator = $_GET['operator'];
    $result = 0;

    switch ($operator) {
        case "None":
            echo "Chose an operator.";
        break;
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            $result = $num1 / $num2;
            break;
    }

    $view->result = $result;
}

require_once('views/index.phtml');
