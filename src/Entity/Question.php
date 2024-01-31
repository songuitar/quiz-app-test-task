<?php

namespace App\Entity;

use App\Model\IndexedAnswerOption;
use App\Repository\QuestionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


/**
 * @property IndexedAnswerOption[] $answerOptions
 */
#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $questionText = null;


    #[ORM\Column(type: Types::JSON)]
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


    /**
     * @return IndexedAnswerOption[]
     */
    public function getAnswerOptions(): array
    {
        return array_map(function ($option) {
            if (!is_array($option)) {
                return $option;
            }
            return new IndexedAnswerOption(
                $option['key'],
                $option['text'],
                $option['isCorrect'],
            );
        }, $this->answerOptions);
    }

    /**
     * @param IndexedAnswerOption[] $answerOptions
     * @return $this
     */
    public function setAnswerOptions(array $answerOptions): static
    {
        $this->answerOptions = $answerOptions;

        return $this;
    }
}
