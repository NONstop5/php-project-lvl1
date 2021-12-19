<?php

declare(strict_types=1);

namespace App\Games\BrainCalc;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

function run(): void
{
    runGame('\App\Games\BrainCalc\calc');
}

function calc(): array
{
    $gameDescription = 'What is the result of the expression?';

    $operators = [
        '+',
        '-',
        '*',
    ];
    $operations = [
        fn($operand1, $operand2) => $operand1 + $operand2,
        fn($operand1, $operand2) => $operand1 - $operand2,
        fn($operand1, $operand2) => $operand1 * $operand2,
    ];

    $operand1 = rand(0, MAX_NUMBER);
    $operand2 = rand(0, MAX_NUMBER);
    $operatorNumber = rand(0, (count($operators) - 1));
    $operator = $operators[$operatorNumber];
    $expressionResult = $operations[$operatorNumber]($operand1, $operand2);

    $question = "{$operand1} {$operator} {$operand2}";
    $correctAnswer = $expressionResult;

    return [
        'gameDescription' => $gameDescription,
        'question' => $question,
        'correctAnswer' => (string)$correctAnswer,
    ];
}
