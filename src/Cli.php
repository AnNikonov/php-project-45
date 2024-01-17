<?php

namespace Cli;

use function cli\line;
use function cli\prompt;

function gameStart()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
