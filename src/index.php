<?php
require_once('models/InfixToPostfix.php');
require_once('models/PostfixCalculation.php');

$view = new stdClass();
$view->pageTitle = 'Calculator';

if (isset($_GET['submit'])) {
    //Converting from infix to postfix
    $infixToPostfix = new InfixToPostfix();
    $infix = $_GET['expression'];
    $postfix = $infixToPostfix->infixToPostfix($infix);

    //calculation of the postfix expression
    $postfixCalculation = new PostfixCalculation();
    $result = $postfixCalculation->postfixCalculation($postfix);

    //display the result
    $view->result = $result;
}



require_once('views/index.phtml');
