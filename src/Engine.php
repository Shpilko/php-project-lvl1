<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function game(string $description, callable $askQuestionGiveAnswer): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    for ($i = 1; $i <= 3; $i++) {
        [ $question, $correctAnswer ] = $askQuestionGiveAnswer();
        line("Question: {$question}");
        $userAnswer = prompt('Your answer');

        if ($correctAnswer !== $userAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        } else {
            line("Correct!");
        }

        if ($i === 3) {
            line("Congratulations, {$name}!");
        }
    }
}
