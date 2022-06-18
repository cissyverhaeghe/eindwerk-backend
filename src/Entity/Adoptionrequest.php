<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdoptionrequestRepository;
use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"adoptionrequests:read"}},
 *     denormalizationContext={"groups"={"adoptionrequests:write"}}
 * )
 * @ORM\Entity(repositoryClass=AdoptionrequestRepository::class)
 */
class Adoptionrequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity=Animal::class, inversedBy="adoptionrequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $animal;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="adoptionrequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="adoptionrequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @Groups({"adoptionrequests:read","adoptionrequests:write", "users:read","users:write"})
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusName(): ?string
    {
       return $this->status->getName();
    }

    public function getUserFullName(): ?string
    {
        $firstName = $this->user->getFirstName();
        $lastName = $this->user->getLastName();

        return $lastName . " " . $firstName;
    }

    /**
     * @Groups({"adoptionrequests:read","adoptionrequests:write"})
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @Groups({"users:read","users:write"})
     */
    public function getDateString(): ?string
    {
        return $this->date->format('Y-m-d H:i:s');
    }

    /**
     * @Groups({"adoptionrequests:read","adoptionrequests:write", "users:read","users:write"})
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @Groups({"adoptionrequests:read","adoptionrequests:write", "users:read","users:write"})
     */
    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * @Groups({"adoptionrequests:read","adoptionrequests:write"})
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @Groups({"adoptionrequests:read","adoptionrequests:write", "users:read","users:write"})
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }
}
