<?php

declare(strict_types=1);

namespace App\Games\BrainGcd;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

function run(): void
{
    runGame(fn() => gcd());
}

function gcd(): array
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';

    [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ] = getNumbersAndMaxDivisor();

    return [
        'gameDescription' => $gameDescription,
        'question' => $question,
        'correctAnswer' => (string)$correctAnswer,
    ];
}

function getNumbersAndMaxDivisor()
{
    $number1 = null;
    $number2 = null;
    $node = null;

    while ($node === null) {
        $number1 = rand(0, MAX_NUMBER);
        $number2 = rand(0, MAX_NUMBER);

        $maxNumber = $number1;
        $minNumber = $number2;

        if ($number2 > $number1) {
            $maxNumber = $number2;
            $minNumber = $number1;
        }

        for ($n = $minNumber; $n > 1; $n--) {
            if (($maxNumber % $n === 0) && ($minNumber % $n === 0)) {
                $node = $n;
                break;
            }
        }
    }

    return [
        'question' => "{$number1} {$number2}",
        'correctAnswer' => $node,
    ];
}
