<?php

declare(strict_types=1);

namespace App\Cli;

use function cli\line;
use function cli\prompt;

function welcome()
{
    if (false) {
        $asd = 1;
    }
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}
