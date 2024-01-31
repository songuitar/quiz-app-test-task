<?php

namespace App\Entity;

use App\Repository\TestResultRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestResultRepository::class)]
class TestResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeInterface $conductedAt;

    #[ORM\OneToMany(mappedBy: 'testResult', targetEntity: Answer::class, orphanRemoval: true, cascade: ["PERSIST"])]
    private Collection $answers;

    public function __construct()
    {
        $this->conductedAt = new \DateTimeImmutable();
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function getConductedAt(): \DateTimeInterface
    {
        return $this->conductedAt;
    }

    public function addAnswer(Answer $answer): static
    {
        if (!$this->answers->contains($answer)) {
            $this->answers->add($answer);
            $answer->setTestResult($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): static
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getTestResult() === $this) {
                $answer->setTestResult(null);
            }
        }

        return $this;
    }
}
