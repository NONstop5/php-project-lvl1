<?php

declare(strict_types=1);

namespace App\BrainEven;

use function App\Cli\welcome;
use function cli\line;
use function cli\prompt;

function even(): void
{
    $answerEvenMap = [
        true => 'yes',
        false => 'no',
    ];
    $name = welcome();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 1; $i <= 3; $i++) {
        $number = rand();
        line("Question: {$number}");
        $answer = prompt('Your answer');

        $isEven = $number % 2 === 0;

        if (($answer === 'yes' && $isEven) || ($answer === 'no' && !$isEven)) {
            line('Correct!');
            continue;
        }

        exit(
            "'{$answer}' is wrong answer ;(. Correct answer was '{$answerEvenMap[$isEven]}'." .
            PHP_EOL . "Let's try again, {$name}!" . PHP_EOL
        );
    }

    line("Congratulations, {$name}!");
}
