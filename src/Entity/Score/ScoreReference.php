<?php

namespace App\Entity\Score;

use App\Doctrine\Generator\DoctrineStringUUIDGenerator;
use App\Repository\Score\ScoreReferenceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ScoreReferenceRepository::class)]
class ScoreReference
{
    #[ORM\Id]
    #[ORM\GeneratedValue('CUSTOM')]
    #[ORM\CustomIdGenerator(class: DoctrineStringUUIDGenerator::class)]
    #[ORM\Column]
    #[Groups([Score::GROUP_READ])]
    private ?string $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([Score::GROUP_READ])]
    private ?string $value = null;

    #[ORM\ManyToOne(inversedBy: 'refs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Score $score = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->value ?? '';
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getScore(): ?Score
    {
        return $this->score;
    }

    public function setScore(?Score $score): static
    {
        $this->score = $score;

        return $this;
    }
}
