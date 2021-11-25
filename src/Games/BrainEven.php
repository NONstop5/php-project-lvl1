<?php

declare(strict_types=1);

namespace App\Games\BrainEven;

use function App\Engine\exitWithText;
use function App\Engine\showCongratulation;
use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function App\Cli\welcome;
use function cli\line;

use const App\Engine\MAX_NUMBER;
use const App\Engine\ROUND_COUNT;

function even(): void
{
    $answerEvenMap = [
        true => 'yes',
        false => 'no',
    ];
    $name = welcome();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $number = rand(0, MAX_NUMBER);
        $answer = showQuestion((string)$number);

        $isEven = $number % 2 === 0;

        if (($answer === 'yes' && $isEven) || ($answer === 'no' && !$isEven)) {
            showOkText();
            continue;
        }

        exitWithText($answer, $answerEvenMap[$isEven], $name);
    }

    showCongratulation($name);
}
