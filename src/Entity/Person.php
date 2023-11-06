<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ApiResource]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $patronymic = null;

    #[ORM\Column]
    private ?bool $alive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $martialStatus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $maidenName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $birthPlace = null;

    #[ORM\Column(nullable: true)]
    private ?int $birthDay = null;

    #[ORM\Column(nullable: true)]
    private ?int $birthMonth = null;

    #[ORM\Column(nullable: true)]
    private ?int $birthYear = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deathDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $weddingDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $weddingPlace = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children1')]
    private ?self $mother = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children2')]
    private ?self $father = null;

    #[ORM\OneToMany(mappedBy: 'mother', targetEntity: self::class)]
    private Collection $children1;
    #[ORM\OneToMany(mappedBy: 'father', targetEntity: self::class)]
    private Collection $children2;

    #[ORM\Column(nullable: true)]
    private ?bool $sex = null;

    #[ORM\ManyToOne(inversedBy: 'people')]
    #[ORM\JoinColumn(nullable: false)]
    private ?FamilyTree $tree = null;

    public function __construct()
    {
        $this->children1 = new ArrayCollection();
        $this->children2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): static
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    public function isAlive(): ?bool
    {
        return $this->alive;
    }

    public function setAlive(bool $alive): static
    {
        $this->alive = $alive;

        return $this;
    }

    public function getMartialStatus(): ?string
    {
        return $this->martialStatus;
    }

    public function setMartialStatus(?string $martialStatus): static
    {
        $this->martialStatus = $martialStatus;

        return $this;
    }

    public function getMaidenName(): ?string
    {
        return $this->maidenName;
    }

    public function setMaidenName(?string $maidenName): static
    {
        $this->maidenName = $maidenName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(?string $birthPlace): static
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getBirthDay(): ?int
    {
        return $this->birthDay;
    }

    public function setBirthDay(?int $birthDay): static
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    public function getBirthMonth(): ?int
    {
        return $this->birthMonth;
    }

    public function setBirthMonth(?int $birthMonth): static
    {
        $this->birthMonth = $birthMonth;

        return $this;
    }

    public function getBirthYear(): ?int
    {
        return $this->birthYear;
    }

    public function setBirthYear(?int $birthYear): static
    {
        $this->birthYear = $birthYear;

        return $this;
    }

    public function getDeathDate(): ?\DateTimeInterface
    {
        return $this->deathDate;
    }

    public function setDeathDate(?\DateTimeInterface $deathDate): static
    {
        $this->deathDate = $deathDate;

        return $this;
    }

    public function getWeddingDate(): ?\DateTimeInterface
    {
        return $this->weddingDate;
    }

    public function setWeddingDate(?\DateTimeInterface $weddingDate): static
    {
        $this->weddingDate = $weddingDate;

        return $this;
    }

    public function getWeddingPlace(): ?string
    {
        return $this->weddingPlace;
    }

    public function setWeddingPlace(?string $weddingPlace): static
    {
        $this->weddingPlace = $weddingPlace;

        return $this;
    }

    public function getFather(): ?self
    {
        return $this->father;
    }

    public function setFather(?self $father): static
    {
        $this->father = $father;

        return $this;
    }

    public function getMother(): ?self
    {
        return $this->mother;
    }

    public function setMother(?self $mother): static
    {
        $this->mother = $mother;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildren(): Collection
    {
        return new ArrayCollection(array_merge($this->children1->toArray(),  $this->children2->toArray()));
    }

    public function addChild(self $child): static
    {
        if (!$this->getChildren()->contains($child)) {
            $this->children1->add($child);
            $child->setMother($this);
        }

        return $this;
    }

    public function removeChild(self $child): static
    {
        if ($this->getChildren()->removeElement($child)) {
            if ($child->getMother() === $this) {
                $child->setMother(null);
            }
            if ($child->getFather() === $this) {
                $child->setFather(null);
            }
        }

        return $this;
    }

    public function setParent(self $parent): static
    {
        if ($parent->isMale()) {
            $this->father = $parent;
        } else {
            $this->mother = $parent;
        }

        return $this;
    }

    public function isMale(): bool
    {
        return !$this->sex;
    }

    public function isFemale(): bool
    {
        return $this->sex;
    }

    public function setMale(): static
    {
        $this->sex = false;

        return $this;
    }

    public function setFemale(): static
    {
        $this->sex = true;

        return $this;
    }

    public function getTree(): ?FamilyTree
    {
        return $this->tree;
    }

    public function setTree(?FamilyTree $tree): static
    {
        $this->tree = $tree;

        return $this;
    }
}
