<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::JSON)]
    private ?array $pickedOptions;

    #[ORM\Column(length: 255)]
    private ?string $questionText = null;

    #[ORM\Column]
    private ?bool $correct = null;

    #[ORM\ManyToOne(inversedBy: 'answers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TestResult $testResult = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTestResult(): ?TestResult
    {
        return $this->testResult;
    }

    public function setTestResult(?TestResult $testResult): static
    {
        $this->testResult = $testResult;

        return $this;
    }

    public function getPickedOptions(): ?array
    {
        return $this->pickedOptions;
    }

    public function setPickedOptions(?array $pickedOptions): Answer
    {
        $this->pickedOptions = $pickedOptions;
        return $this;
    }

    public function getQuestionText(): ?string
    {
        return $this->questionText;
    }

    public function setQuestionText(?string $questionText): Answer
    {
        $this->questionText = $questionText;
        return $this;
    }

    public function isCorrect(): ?bool
    {
        return $this->correct;
    }

    public function setCorrect(?bool $correct): Answer
    {
        $this->correct = $correct;
        return $this;
    }

}
