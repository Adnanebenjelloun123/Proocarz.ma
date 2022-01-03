<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"person:read"}},
 *     denormalizationContext={"groups"={"person:write"}},
 * )
 * @ORM\Entity(repositoryClass=personRepository::class)
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"person:read", "person:write"})
     */
    private $Firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"person:read", "person:write"})
     */
    private $Lastname;
     /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"person:read", "person:write"})
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"person:read", "person:write"})
     */
    private $Phone;

    /**
     * @ORM\ManyToMany(targetEntity=City::class, inversedBy="Persons")
     */
    private $cities;
    
    public function __construct()
    {
        $this->cities = new ArrayCollection();
    }
        /**
     * @return Collection|City[]
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        $this->cities->removeElement($city);

        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstName(string $Firstname): self
    {
        $this->Firstname= $Firstname;

        return $this;
    }
    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname= $Lastname;

        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email= $Email;

        return $this;
    }
    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): self
    {
        $this->Phone= $Phone;

        return $this;
    }
}