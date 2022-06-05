<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"animals:read"}},
 *     denormalizationContext={"groups"={"animals:write"}}
 * )
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

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getAge(): ?int
    {
        $dateOfBirth = $this->birthdate->format("Y-m-d");
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y');
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getNeutered(): ?int
    {
        return $this->neutered;
    }

    public function setNeutered(?int $neutered): self
    {
        $this->neutered = $neutered;

        return $this;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getAdopted(): ?int
    {
        return $this->adopted;
    }

    public function setAdopted(?int $adopted): self
    {
        $this->adopted = $adopted;

        return $this;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getAgecategory(): ?Agecategory
    {
        return $this->agecategory;
    }

    public function setAgecategory(?Agecategory $agecategory): self
    {
        $this->agecategory = $agecategory;

        return $this;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
    public function getBreed(): ?Breed
    {
        return $this->breed;
    }

    public function setBreed(?Breed $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * @Groups({"animals:read","animals:write"})
     */
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
