<?php

declare(strict_types=1);

namespace App\BrainGcd;

use function App\Cli\welcome;
use function App\Engine\exitWithText;
use function cli\line;
use function cli\prompt;

use const App\Engine\MAX_NUMBER;
use const App\Engine\ROUND_COUNT;

function gcd(): void
{
    $number1 = null;
    $number2 = null;

    $name = welcome();

    line('Find the greatest common divisor of given numbers.');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $node = null;

        while (!$node) {
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

        line("Question: {$number1} {$number2}");
        $answer = prompt('Your answer');

        if ($node === (int)$answer) {
            line('Correct!');
            continue;
        }

        exitWithText($answer, $node, $name);
    }

    line("Congratulations, {$name}!");
}
