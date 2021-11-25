<?php

declare(strict_types=1);

namespace App\Games\BrainPrime;

use function App\Engine\exitWithText;
use function App\Engine\isNumberPrime;
use function App\Engine\showCongratulation;
use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function App\Cli\welcome;
use function cli\line;

use const App\Engine\MAX_NUMBER;
use const App\Engine\ROUND_COUNT;

function prime(): void
{
    $answerPrimeMap = [
        true => 'yes',
        false => 'no',
    ];
    $name = welcome();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $number = rand(1, MAX_NUMBER);
        $answer = showQuestion((string)$number);

        $isPrime = isNumberPrime($number);

        if ($answer === $answerPrimeMap[$isPrime]) {
            showOkText();
            continue;
        }

        exitWithText($answer, $answerPrimeMap[$isPrime], $name);
    }

    showCongratulation($name);
}
