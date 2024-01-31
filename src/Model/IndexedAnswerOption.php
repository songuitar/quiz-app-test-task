<?php

namespace App\Model;

class IndexedAnswerOption
{
    public function __construct(
        public string $key,
        public string $text,
        public string $isCorrect,
    )
    {
    }
}