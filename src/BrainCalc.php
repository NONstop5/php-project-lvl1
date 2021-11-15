<?php

declare(strict_types=1);

namespace App\BrainCalc;

use function App\Cli\welcome;
use function App\Engine\exitWithText;
use function cli\line;
use function cli\prompt;

use const App\Engine\MAX_NUMBER;
use const App\Engine\ROUND_COUNT;

function calc(): void
{
    $operators = [
        '+',
        '-',
        '*'
    ];
    $operations = [
        fn($operand1, $operand2) => $operand1 + $operand2,
        fn($operand1, $operand2) => $operand1 - $operand2,
        fn($operand1, $operand2) => $operand1 * $operand2,
    ];
    $name = welcome();

    line('What is the result of the expression?');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $operand1 = rand(0, MAX_NUMBER);
        $operand2 = rand(0, MAX_NUMBER);
        $operatorNumber = rand(0, (count($operators) - 1));
        $operator = $operators[$operatorNumber];
        $expressionResult = $operations[$operatorNumber]($operand1, $operand2);

        line("Question: {$operand1} {$operator} {$operand2}");
        $answer = prompt('Your answer');

        if ($expressionResult === (int)$answer) {
            line('Correct!');
            continue;
        }

        exitWithText($answer, $expressionResult, $name);
    }

    line("Congratulations, {$name}!");
}
