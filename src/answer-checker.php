<?php

namespace answer\Checker;

use function cli\line;
use function cli\prompt;

function answerChecker ($userAnswer, $correctanswer, $name)
{
    if ($userAnswer == $correctanswer) {
        line("Correct!");
    } else {
        line("\"$userAnswer\", is wrong answer ;(. Correct answer was \"$correctanswer\"");
        line("Let's try again, $name!");
        exit;
    }
}