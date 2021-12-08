<?php

declare(strict_types=1);

namespace App\Games\BrainPrime;

use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function cli\line;

use const App\Engine\MAX_NUMBER;
use const App\Engine\ROUND_COUNT;

function prime(): array
{
    $isGameResultSuccessful = true;
    $answer = null;
    $correctAnswer = null;

    $answerPrimeMap = [
        true => 'yes',
        false => 'no',
    ];

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $number = rand(1, MAX_NUMBER);
        $answer = showQuestion((string)$number);

        $isPrime = isNumberPrime($number);
        $correctAnswer = $answerPrimeMap[$isPrime];

        if ($answer === $correctAnswer) {
            showOkText();
            continue;
        }

        $isGameResultSuccessful = false;
        break;
    }

    return [
        $isGameResultSuccessful,
        $answer,
        $correctAnswer,
    ];
}

function isNumberPrime(int $number): bool
{
    for ($n = 2; $n < $number - 1; $n++) {
        if ($number % $n === 0) {
            return false;
        }
    }

    return true;
}
