<?php

declare(strict_types=1);

namespace App\Engine;

const ROUND_COUNT = 3;
const MAX_NUMBER = 100;

function exitWithText($answer, $correctAnswer, $name): void
{
    exit(
        "'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'." .
        PHP_EOL . "Let's try again, {$name}!" . PHP_EOL
    );
}
