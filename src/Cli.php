<?php

declare(strict_types=1);

namespace App\Cli;

use function cli\line;
use function cli\prompt;

function welcome()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello1, %s!", $name);

    return $name;
}
