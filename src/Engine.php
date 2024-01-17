<?php

namespace Engine;

require __DIR__ . "/../vendor/autoload.php";

use function cli\line;
use function cli\prompt;
use function even\Game\makeEven;
use function calc\Game\makeCalc;
use function prime\Game\makePrime;
use function progression\Game\makeProgression;
use function gcd\Game\makeGcd;

///main game start function///
function playGame(array $gameData): void
{

    $name = helloUser();
    line(getQuest($gameData));

    for ($i = 0; $i < 3; $i++) {
        line("Question: %s", getTest($gameData));
        $userAnswer = prompt("Your answer");
        if (answerChecker($userAnswer, getCorrectAnswer($gameData), $name)) {
            $gameData = match (getType($gameData)) {
                "calc" => makeCalc(),
                "progress" => makeProgression(),
                "even" => makeEven(),
                "gcd" => makeGcd(),
                "prime" => makePrime(),
                default => null,
            };
        }
    }
    line("Congratulations, %s!", $name);
}

///help functions///
function helloUser(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function answerChecker(string $userAnswer, string $correctAnswer, string $name): bool
{
    if ($userAnswer == $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("\"$userAnswer\", is wrong answer ;(. Correct answer was \"$correctAnswer\"");
        line("Let's try again, $name!");
        exit;
    }
}

function gcd(int $randomNumber1, int $randomNumber2)
{
    while ($randomNumber1 != $randomNumber2) {
        if ($randomNumber1 > $randomNumber2) {
            $randomNumber1 -= $randomNumber2;
        } else {
            $randomNumber2 -= $randomNumber1;
        }
    }
    return $randomNumber1;
}

///getters///
function getTest(array|null $gameData)
{
    if ($gameData !== null && array_key_exists('test', $gameData)) {
        return $gameData['test'];
    } else {
        return null;
    }
}

function getType(array|null $gameData)
{
    if ($gameData !== null && array_key_exists('type', $gameData)) {
        return $gameData['type'];
    } else {
        return null;
    }
}

function getCorrectAnswer(array|null $gameData)
{
    if ($gameData !== null && array_key_exists('correctAnswer', $gameData)) {
        return $gameData['correctAnswer'];
    } else {
        return null;
    }
}

function getQuest(array $gameData)
{
    return $gameData['quest'];
}
