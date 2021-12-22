<?php

declare(strict_types=1);

namespace App\Games\BrainPrime;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run(): void
{
    runGame(fn() => prime(), GAME_DESCRIPTION);
}

function prime(): array
{
    $booleanTextMap = [
        true => 'yes',
        false => 'no',
    ];

    $number = rand(0, MAX_NUMBER);

    if ($number === 0 || $number === 1) {
        $isPrime = false;
    } elseif (($number === 2) || ($number === 3)) {
        $isPrime = true;
    } else {
        $isPrime = isNumberPrime($number);
    }

    $question = $number;
    $correctAnswer = $booleanTextMap[$isPrime];

    return [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ];
}

function isNumberPrime(int $number): bool
{
    for ($n = 2; $n <= sqrt($number); $n++) {
        if ($number % $n === 0) {
            return false;
        }
    }

    return true;
}
