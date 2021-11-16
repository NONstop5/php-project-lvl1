<?php

declare(strict_types=1);

namespace App\Games\BrainGcd;

use function App\Engine\exitWithText;
use function App\Engine\getAnswer;
use function App\Engine\showCongratulation;
use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function App\Games\Cli\welcome;
use function cli\line;

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

        showQuestion("{$number1} {$number2}");
        $answer = getAnswer();

        if ($node === (int)$answer) {
            showOkText();
            continue;
        }

        exitWithText($answer, (string)$node, $name);
    }

    showCongratulation($name);
}
