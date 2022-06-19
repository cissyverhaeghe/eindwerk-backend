<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=StatusRepository::class)
 */
class Status
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
     * @ORM\OneToMany(targetEntity=Adoptionrequest::class, mappedBy="status")
     */
    private $adoptionrequests;

    public function __construct()
    {
        $this->adoptionrequests = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @Groups({"adoptionrequests:read","adoptionrequests:write"})
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({"adoptionrequests:read","adoptionrequests:write", "users:read","users:write"})
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
     * @return Collection<int, Adoptionrequest>
     */
    public function getAdoptionrequests(): Collection
    {
        return $this->adoptionrequests;
    }

    public function addAdoptionrequest(Adoptionrequest $adoptionrequest): self
    {
        if (!$this->adoptionrequests->contains($adoptionrequest)) {
            $this->adoptionrequests[] = $adoptionrequest;
            $adoptionrequest->setStatus($this);
        }

        return $this;
    }

    public function removeAdoptionrequest(Adoptionrequest $adoptionrequest): self
    {
        if ($this->adoptionrequests->removeElement($adoptionrequest)) {
            // set the owning side to null (unless already changed)
            if ($adoptionrequest->getStatus() === $this) {
                $adoptionrequest->setStatus(null);
            }
        }

        return $this;
    }
}
