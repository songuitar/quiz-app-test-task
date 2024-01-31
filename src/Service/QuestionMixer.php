<?php

namespace App\Service;

use App\Entity\Question;

class QuestionMixer
{
    /**
     * @param Question[] $questions
     * @return Question[]
     */
    public function shake(array $questions): array
    {
        shuffle($questions);

        return array_map(function ($question) {
            $options = $question->getAnswerOptions();
            shuffle($options);

            $question->setAnswerOptions($options);
            return $question;

        }, $questions);
    }
}