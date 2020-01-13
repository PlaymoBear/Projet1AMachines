<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComputerRepository")
 */
class Computer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $respo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoty;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\Column(type="text", nullable=true)
     */
    private $ipAddr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $macAddr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="date")
     */
    private $addedOn;

    /**
     * @ORM\Column(type="date")
     */
    private $retiredOn;

    /**
     * @ORM\Column(type="date")
     */
    private $lastCheck;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRespo(): ?User
    {
        return $this->respo;
    }

    public function setRespo(?User $respo): self
    {
        $this->respo = $respo;

        return $this;
    }

    public function getCategoty(): ?Category
    {
        return $this->categoty;
    }

    public function setCategoty(?Category $categoty): self
    {
        $this->categoty = $categoty;

        return $this;
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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getIpAddr(): ?string
    {
        return $this->ipAddr;
    }

    public function setIpAddr(string $ipAddr): self
    {
        $this->ipAddr = $ipAddr;

        return $this;
    }

    public function getMacAddr(): ?string
    {
        return $this->macAddr;
    }

    public function setMacAddr(string $macAddr): self
    {
        $this->macAddr = $macAddr;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAddedOn(): ?\DateTimeInterface
    {
        return $this->addedOn;
    }

    public function setAddedOn(\DateTimeInterface $addedOn): self
    {
        $this->addedOn = $addedOn;

        return $this;
    }

    public function getRetiredOn(): ?\DateTimeInterface
    {
        return $this->retiredOn;
    }

    public function setRetiredOn(\DateTimeInterface $retiredOn): self
    {
        $this->retiredOn = $retiredOn;

        return $this;
    }

    public function getLastCheck(): ?\DateTimeInterface
    {
        return $this->lastCheck;
    }

    public function setLastCheck(\DateTimeInterface $lastCheck): self
    {
        $this->lastCheck = $lastCheck;

        return $this;
    }
}
