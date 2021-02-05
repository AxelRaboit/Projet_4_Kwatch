<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DirectorRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DirectorRepository::class)
 * @Vich\Uploadable
 */
class Director
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
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @Vich\UploadableField(mapping="picture_director_file", fileNameProperty="picture")
     * @var File
     * @Assert\File(
     *     maxSize="2000000",
     *     mimeTypes={"image/jpeg", "image/png", "image/jpg"},
     *     mimeTypesMessage="Le fichier doit être au format .jpg, .png ou .jpeg."
     * )
     */
    private $pictureFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var Datetime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationality;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Program::class, inversedBy="directors")
     */
    private $program;

    public function __construct()
    {
        $this->program = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function setPictureFile(File $pictureFile = null): Director
    {
        $this->pictureFile = $pictureFile;
        if ($pictureFile) {
          $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Program[]
     */
    public function getProgram(): Collection
    {
        return $this->program;
    }

    public function addProgram(Program $program): self
    {
        if (!$this->program->contains($program)) {
            $this->program[] = $program;
        }

        return $this;
    }

    public function removeProgram(Program $program): self
    {
        $this->program->removeElement($program);

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
