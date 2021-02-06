<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
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
     * @ORM\ManyToOne(targetEntity=Actor::class, inversedBy="roles")
     */
    private $actor;

    /**
     * @ORM\ManyToOne(targetEntity=Program::class, inversedBy="role")
     * @ORM\JoinColumn(nullable=false)
     */
    private $program;

<<<<<<< HEAD
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

=======
>>>>>>> 37217bd6a603581c5c849a49234afe60dc9ee62c
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

    public function getActor(): ?Actor
    {
        return $this->actor;
    }

    public function setActor(?Actor $actor): self
    {
        $this->actor = $actor;

        return $this;
    }

    public function getProgram(): ?Program
    {
        return $this->program;
    }

    public function setProgram(?Program $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
<<<<<<< HEAD

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
=======
>>>>>>> 37217bd6a603581c5c849a49234afe60dc9ee62c
}
