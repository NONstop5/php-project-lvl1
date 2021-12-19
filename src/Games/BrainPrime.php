<?php

declare(strict_types=1);

namespace App\Games\BrainPrime;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

function run(): void
{
    runGame('\App\Games\BrainPrime\prime');
}

function prime(): array
{
    $booleanTextMap = [
        true => 'yes',
        false => 'no',
    ];

    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $number = rand(1, MAX_NUMBER);
    $isPrime = isNumberPrime($number);

    $question = $number;
    $correctAnswer = $booleanTextMap[$isPrime];

    return [
        'gameDescription' => $gameDescription,
        'question' => $question,
        'correctAnswer' => (string)$correctAnswer,
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
