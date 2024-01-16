<?php

namespace calc\Game;

const QUEST = 'What is the result of the expression?';
function makeCalc(): array
{
    $operators = ["+", "-", "*"];
    $operator = $operators[array_rand($operators)];
    $operand1 = rand(1, 10);
    $operand2 = rand(1, 10);

    switch ($operator) {
    case "+":
        $result = "$operand1 + $operand2";
        $correct = $operand1 + $operand2;
        break;
    case "-":
        $result = "$operand1 - $operand2";
        $correct = $operand1 - $operand2;
        break;
    case "*":
        $result = "$operand1 * $operand2";
        $correct = $operand1 * $operand2;
        break;
    default:
        $result = null;
        $correct = null;
        break;
    }

    return ['quest' => QUEST, 'type' =>'calc', 'test' => $result, 'correctAnswer' => $correct];
}