<?php

namespace Engine;

require "./vendor/autoload.php";

use function cli\line;
use function cli\prompt;
use function progression\Game\progressGame;

function helloUser()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function answerChecker($userAnswer, $correctanswer, $name): bool
{
    if ($userAnswer == $correctanswer) {
        line("Correct!");
        return true;
    } else {
        line("\"$userAnswer\", is wrong answer ;(. Correct answer was \"$correctanswer\"");
        line("Let's try again, $name!");
        exit;
//        return false;

    }
}

function gcd($randomNumber1, $randomNumber2) {
    while ($randomNumber1 != $randomNumber2)
        if ($randomNumber1>$randomNumber2)
            $randomNumber1 -= $randomNumber2;
        else
            $randomNumber2 -= $randomNumber1;
    return $randomNumber1;
}

function makeProgression($count = 10): array
{
    $beginNum = rand(1,10);
    $range = rand(1,10);

    $result = [$beginNum];

    for ($i = 1; $i <= $count; $i++) {
        $result[] = $result[$i - 1] + $range;
    }

    $rand = rand(0,$count);
    $correctNum = $result[$rand];
    $result[$rand] = '..';

    $result = implode(' | ', $result);

//    print_r (['test' => $result, 'correctAnswer' => $correctNum]);
    return ['type' =>'progress','test' => $result, 'correctAnswer' => $correctNum];
}

function makeCalc()
{
    $operators = ["+", "-", "*"];
    $operator = $operators[array_rand($operators)];
    $operand1 = rand(1,10);
    $operand2 = rand(1,10);

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

//    print_r(['test' => $result, 'correctAnswer' => $correct]);
    return ['type' =>'calc', 'test' => $result, 'correctAnswer' => $correct];

}

function playGame($gameData) {

    $name = helloUser();
    line($gameData['quest']);

    for ($i = 0; $i < 3; $i++) {
        line("Question: %s", $gameData['test'] );
        $userAnswer = prompt("Your answer");
        if (answerChecker($userAnswer, $gameData['correctAnswer'], $name)) {
            switch ($gameData['type']) {
                case "calc":
                    $gameData = makeCalc();
                    break;
                case "progress":
                    $gameData = makeProgression();
                    break;
//                case "calc":
//                    $gameData = makeCalc();
//                    break;
//                default:
//                    $gameData = null;
//                    break;
            }
        }
//        answerChecker($userAnswer, $gameData['correctAnswer'], $name);

    }


    line("Congratulations, %s!", $name);
}