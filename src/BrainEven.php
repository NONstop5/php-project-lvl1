<?php

declare(strict_types=1);

namespace App\BrainEven;

use function App\Cli\welcome;
use function App\Engine\exitWithText;
use function cli\line;
use function cli\prompt;

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
        line("Question: {$number}");
        $answer = prompt('Your answer');

        $isEven = $number % 2 === 0;

        if (($answer === 'yes' && $isEven) || ($answer === 'no' && !$isEven)) {
            line('Correct!');
            continue;
        }

        exitWithText($answer, $answerEvenMap[$isEven], $name);
    }

    line("Congratulations, {$name}!");
}
