<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BreedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"breeds:read"}},
 *     denormalizationContext={"groups"={"breeds:write"}}
 * )
 * @ORM\Entity(repositoryClass=BreedRepository::class)
 */
class Breed
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Animal::class, mappedBy="breed")
     */
    private $animals;

    /**
     * @ORM\ManyToOne(targetEntity=Species::class, inversedBy="breeds")
     */
    private $species;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    /**
     * @Groups({"species:read","species:write"})
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({"animals:read","animals:write","breeds:read","breeds:write", "species:read","species:write"})
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): self
    {
        if (!$this->animals->contains($animal)) {
            $this->animals[] = $animal;
            $animal->setBreed($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): self
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getBreed() === $this) {
                $animal->setBreed(null);
            }
        }

        return $this;
    }

    /**
     * @Groups({"breeds:read","breeds:write"})
     */
    public function getSpecies(): ?Species
    {
        return $this->species;
    }

    public function setSpecies(?Species $species): self
    {
        $this->species = $species;

        return $this;
    }
}
