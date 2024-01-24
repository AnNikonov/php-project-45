<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

const QUEST = 'What is the result of the expression?';
function playCalc(): void
{
    $gameData = [];
    $operators = ["+", "-", "*"];
    for ($i = 0; $i < 3; $i++) {
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

        $gameData[] =  ['test' => $result, 'correctAnswer' => $correct];
    }
    playGame($gameData, QUEST);
}
