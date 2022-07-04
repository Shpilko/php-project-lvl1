<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\game;

function calc($num1, $num2, $operator)
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            return null;
    }
}

function launchGame()
{
    $description = 'What is the result of the expression?';

    $askQuestionGiveAnswer = function() {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $arr = ['+', '-', '*'];
        $index = rand(0, 1);
        $operator = $arr[$index];
        $question = "{$num1} {$operator} {$num2}";
        $correctAnswer = (string) calc($num1, $num2, $operator);

        return [ $question, $correctAnswer ];
    };

    game($description, $askQuestionGiveAnswer);
}
