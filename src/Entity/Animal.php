<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $neutered;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $adopted;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Agecategory::class, inversedBy="animal")
     */
    private $agecategory;

    /**
     * @ORM\ManyToOne(targetEntity=Breed::class, inversedBy="animals")
     */
    private $breed;

    /**
     * @ORM\ManyToOne(targetEntity=Sex::class, inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sex;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getNeutered(): ?int
    {
        return $this->neutered;
    }

    public function setNeutered(?int $neutered): self
    {
        $this->neutered = $neutered;

        return $this;
    }

    public function getAdopted(): ?int
    {
        return $this->adopted;
    }

    public function setAdopted(?int $adopted): self
    {
        $this->adopted = $adopted;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAgecategory(): ?Agecategory
    {
        return $this->agecategory;
    }

    public function setAgecategory(?Agecategory $agecategory): self
    {
        $this->agecategory = $agecategory;

        return $this;
    }

    public function getBreed(): ?Breed
    {
        return $this->breed;
    }

    public function setBreed(?Breed $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getSex(): ?Sex
    {
        return $this->sex;
    }

    public function setSex(?Sex $sex): self
    {
        $this->sex = $sex;

        return $this;
    }
}
