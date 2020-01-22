# Calculator

## Description

A BODMAS (Brackets, Orders, Division, Multiplication, Addition, Subtraction) calculator that can calculates mathematical 
expressions, long up to 20 characters. At the moment, it can deal only with expressions, which consists of one-digit numbers.

## Technologies

- Bootstrap 4
- PHP 7

## Usage

- 1+5*(9-1) will give result: 41
- (1+3)*(6-4) will give result: 8
- (7\*9)\*(2+3*(2^6)) will give result: 12222

## Running Unit Tests

Requires PHPUnit installed
```bash
$ phpunit tests/InfixToPostfixTest.php 
$ phpunit tests/PostfixCalculationTest.php
$ phpunit tests/StackTest.php
```
