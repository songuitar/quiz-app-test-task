<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $questionText = null;

    #[ORM\Column]
    private ?int $correctAnswerValue = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $answerOptions = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionText(): ?string
    {
        return $this->questionText;
    }

    public function setQuestionText(string $questionText): static
    {
        $this->questionText = $questionText;

        return $this;
    }

    public function getCorrectAnswerValue(): ?int
    {
        return $this->correctAnswerValue;
    }

    public function setCorrectAnswerValue(int $correctAnswerValue): static
    {
        $this->correctAnswerValue = $correctAnswerValue;

        return $this;
    }

    public function getAnswerOptions(): array
    {
        return $this->answerOptions;
    }

    public function setAnswerOptions(array $answerOptions): static
    {
        $this->answerOptions = $answerOptions;

        return $this;
    }
}
