<?php

namespace App\Entity\Library;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Doctrine\Generator\DoctrineStringUUIDGenerator;
use App\Entity\Library\Enum\ArtistType;
use App\Repository\Library\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue('CUSTOM')]
    #[ORM\CustomIdGenerator(class: DoctrineStringUUIDGenerator::class)]
    #[ORM\Column]
    #[Groups([Score::GROUP_READ])]
    private ?string $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([Score::GROUP_READ])]
    private ?string $name = null;

    /**
     * @var Collection<int, ScoreArtist>
     */
    #[ORM\OneToMany(targetEntity: ScoreArtist::class, mappedBy: 'artist', orphanRemoval: true)]
    private Collection $scores;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Collection<int, ScoreArtist>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(ScoreArtist $score): static
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setArtist($this);
        }

        return $this;
    }

    public function removeScore(ScoreArtist $score): static
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getArtist() === $this) {
                $score->setArtist(null);
            }
        }

        return $this;
    }
}