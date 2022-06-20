<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function greeting(&$name)
{
line('Welcome to the Brain Game!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
}

function giveDescription()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function isEven($num)
{
    return $num % 2 === 0 ?: false;
}

function launchGame()
{
    greeting($name);
    giveDescription();

    for ($i = 1; $i <= 3; $i++) {
        $randomNum = rand(1, 100);
        line("Question: {$randomNum}");
        $userAnswer = prompt('Your answer');
        $correctAnswer = isEven($randomNum) ? 'yes' : 'no';

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
