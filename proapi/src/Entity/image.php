<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"image:read"}},
 *     denormalizationContext={"groups"={"image:write"}},
 * )
 * @ORM\Entity(repositoryClass=imageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"Contenturl:read", "Contenturl:write"})
     */
    private $Contenturl;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"Contentpath:read", "Contentpath:write"})
     */
    private $Contentpath;


    public function getParent(): ?Video
    {
        return $this->parent;
    }

    public function setParent(?Video $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenturl(): ?string
    {
        return $this->Contenturl;
    }

    public function setContenturl(string $Contenturl): self
    {
        $this->Contenturl = $Contenturl;

        return $this;
    }
    public function getContentpath(): ?string
    {
        return $this->Contentpath;
    }

    public function setContentpath(string $Contentpath): self
    {
        $this->Contentpath= $Contentpath;

        return $this;
    }
}