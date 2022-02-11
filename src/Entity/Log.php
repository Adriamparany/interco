<?php

namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogRepository::class)
 */
class Log
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
    private $username;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datelog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logtype;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getDatelog(): ?\DateTimeInterface
    {
        return $this->datelog;
    }

    public function setDatelog(\DateTimeInterface $datelog): self
    {
        $this->datelog = $datelog;

        return $this;
    }

    public function getLogtype(): ?string
    {
        return $this->logtype;
    }

    public function setLogtype(string $logtype): self
    {
        $this->logtype = $logtype;

        return $this;
    }
}
