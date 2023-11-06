<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FamilyTreeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilyTreeRepository::class)]
#[ApiResource]
class FamilyTree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'familyTree', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    #[ORM\Column(nullable: true)]
    private ?array $aggregationTree = null;

    #[ORM\OneToMany(mappedBy: 'tree', targetEntity: Person::class)]
    private Collection $people;

    public function __construct()
    {
        $this->people = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getAggregationTree(): ?array
    {
        return $this->aggregationTree;
    }

    public function setAggregationTree(?array $aggregationTree): static
    {
        $this->aggregationTree = $aggregationTree;

        return $this;
    }

    /**
     * @return Collection<int, Person>
     */
    public function getPeople(): Collection
    {
        return $this->people;
    }

    public function addPerson(Person $person): static
    {
        if (!$this->people->contains($person)) {
            $this->people->add($person);
            $person->setTree($this);
        }

        return $this;
    }

    public function removePerson(Person $person): static
    {
        if ($this->people->removeElement($person)) {
            // set the owning side to null (unless already changed)
            if ($person->getTree() === $this) {
                $person->setTree(null);
            }
        }

        return $this;
    }
}
