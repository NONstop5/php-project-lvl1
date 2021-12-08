<?php

declare(strict_types=1);

namespace App\Games\BrainEven;

use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function cli\line;

use const App\Engine\MAX_NUMBER;
use const App\Engine\ROUND_COUNT;

function even(): array
{
    $isGameResultSuccessful = true;
    $answer = null;
    $correctAnswer = null;

    $answerEvenMap = [
        true => 'yes',
        false => 'no',
    ];

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $number = rand(0, MAX_NUMBER);
        $answer = showQuestion((string)$number);

        $isEven = $number % 2 === 0;
        $correctAnswer = $answerEvenMap[$isEven];

        if (($answer === 'yes' && $isEven) || ($answer === 'no' && !$isEven)) {
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
