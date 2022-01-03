<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"vehicle:read"}},
 *     denormalizationContext={"groups"={"vehicle:write"}},
 * )
 * @ORM\Entity(repositoryClass=vehicleRepository::class)
 */
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"title:read", "title:write"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"slug:read", "slug:write"})
     */
    private $engine;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"slug:read", "slug:write"})
     */
    private $transmission;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"slug:read", "slug:write"})
     */
    private $year;
    /**
    * @ORM\Column(type="integer")
     * @Groups({"slug:read", "slug:write"})
     */
    private $mileage;
    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"slug:read", "slug:write"})
     */
    private $color;
    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"slug:read", "slug:write"})
     */
    private $fiscalpower;
    /**
     * @ORM\Column(type="integer")
     * @Groups({"slug:read", "slug:write"})
     */
    private $price;

     /**
     * @ORM\ManyToOne(targetEntity=Brand::class)
     * @Groups("brand:read")
     */
    private $brand;
     /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @Groups("category:read")
     */
    private $category;
     /**
     * @ORM\ManyToOne(targetEntity=Person::class)
     * @Groups("person:read")
     */
    private $person;
    /**
     * @ORM\ManyToOne(targetEntity=Model::class)
     * @Groups("model:read")
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity=City::class)
     * @Groups("city:read")
     */
    private $city;

    // /**
    //  * @ORM\OneToMany(targetEntity=Video:class, mappedBy="parent", orphanRemoval=true)
    //  * @Groups ({"video:write", "video:item:read"})
    //  */
    // private $videos;

    // /**
    //  * @ORM\OneToMany(targetEntity=Image::class, mappedBy="parent", orphanRemoval=true)
    //  * @Groups ({"image:write", "image:item:read"})
    //  */
    // private $images;
    
    // public function __construct()
    // {
    //     $this->videos = new ArrayCollection();
    //     $this->images = new ArrayCollection();
    // }
   
    public function getId(): ?int
    {
        return $this->id;
    }
    public function gettitle(): ?string
    {
        return $this->title;
    }

    public function settitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    public function getprice(): ?Int
    {
        return $this->price;
    }

    public function setprice(string $price): self
    {
        $this->price = $price;

        return $this;
    }
    public function getfiscalpower(): ?string
    {
        return $this->fiscalpower;
    }

    public function settransmission(string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }
    public function gettransmission(): ?string
    {
        return $this->transmission;
    }

    public function getcolor(): ?string
    {
        return $this->color;
    }

    public function setyear(string $year): self
    {
        $this->year = $year;

        return $this;
    }
    public function getyear(): ?string
    {
        return $this->year;
    }

    public function setmileage(string $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }
    public function getmileage(): ?string
    {
        return $this->mileage;
    }

    public function setcolor(string $color): self
    {
        $this->color = $color;

        return $this;
    }
    public function getslug(): ?string
    {
        return $this->slug;
    }

    public function setslug(string $slug): self
    {
        $this->slug= $slug;

        return $this;
    }
    public function getengine(): ?string
    {
        return $this->engine;
    }

    public function setengine(string $engine): self
    {
        $this->engine= $engine;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }
    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }


}