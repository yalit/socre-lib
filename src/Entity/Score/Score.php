<?php

namespace App\Entity\Score;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Doctrine\Generator\DoctrineStringUUIDGenerator;
use App\Repository\Score\ScoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => [Score::GROUP_READ]]
        )
    ]
)]
class Score
{
    public const GROUP_READ = 'score:read';

    #[ORM\Id]
    #[ORM\GeneratedValue('CUSTOM')]
    #[ORM\CustomIdGenerator(class: DoctrineStringUUIDGenerator::class)]
    #[ORM\Column]
    #[Groups([self::GROUP_READ])]
    private ?string $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([self::GROUP_READ])]
    private ?string $title = null;

    #[ORM\Column(length: 1028, nullable: true)]
    #[Groups([self::GROUP_READ])]
    private ?string $description = null;

    /**
     * @var Collection<int, ScoreReference>
     */
    #[ORM\OneToMany(targetEntity: ScoreReference::class, mappedBy: 'score', cascade: ['persist'], orphanRemoval: true)]
    #[Groups([self::GROUP_READ])]
    private Collection $refs;

    /**
     * @var Collection<int, Artist>
     */
    #[ORM\ManyToMany(targetEntity: Artist::class, inversedBy: 'scores', cascade: ['persist'])]
    #[Groups([self::GROUP_READ])]
    private Collection $artists;

    /**
     * @var Collection<int, ScoreCategory>
     */
    #[ORM\ManyToMany(targetEntity: ScoreCategory::class, inversedBy: 'scores', cascade: ['persist'])]
    #[Groups([self::GROUP_READ])]
    private Collection $categories;

    /**
     * @var Collection<int, ScoreFile>
     */
    #[ORM\OneToMany(targetEntity: ScoreFile::class, mappedBy: 'score', cascade: ['persist'], orphanRemoval: true)]
    #[Groups([self::GROUP_READ])]
    private Collection $files;

    public function __construct()
    {
        $this->refs = new ArrayCollection();
        $this->artists = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->files = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection<int, ScoreReference>
     */
    public function getRefs(): Collection
    {
        return $this->refs;
    }

    public function addRef(ScoreReference $ref):  void
    {
        if (!$this->refs->contains($ref)) {
            $this->refs->add($ref);
            $ref->setScore($this);
        }
    }

    public function removeRef(ScoreReference $ref):  void
    {
        if ($this->refs->removeElement($ref)) {
            // set the owning side to null (unless already changed)
            if ($ref->getScore() === $this) {
                $ref->setScore(null);
            }
        }
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): void
    {
        if (!$this->artists->contains($artist)) {
            $this->artists->add($artist);
            $artist->addScore($this);
        }
    }

    public function removeArtist(Artist $artist): void
    {
        $this->artists->removeElement($artist);
    }

    /**
     * @return Collection<int, ScoreCategory>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(ScoreCategory $category): void
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addScore($this);
        }
    }

    public function removeCategory(ScoreCategory $category): void
    {
        $this->categories->removeElement($category);
    }

    /**
     * @return Collection<int, ScoreFile>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(ScoreFile $file): void
    {
        if (!$this->files->contains($file)) {
            $this->files->add($file);
            $file->setScore($this);
        }
    }

    public function removeFile(ScoreFile $file): void
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getScore() === $this) {
                $file->setScore(null);
            }
        }
    }
}
