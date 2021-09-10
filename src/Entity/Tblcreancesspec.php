<?php

namespace App\Entity;

use App\Repository\TblcreancesspecRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TblcreancesspecRepository::class)
 */
class Tblcreancesspec
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
    private $dateoperation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codique;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idgest;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idcreances;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nomcreance;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $stival;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $orval;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $osvteval;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $stfival;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $isinit;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateoperation(): ?\DateTimeInterface
    {
        return $this->dateoperation;
    }

    public function setDateoperation(\DateTimeInterface $dateoperation): self
    {
        $this->dateoperation = $dateoperation;

        return $this;
    }

    public function getCodique(): ?int
    {
        return $this->codique;
    }

    public function setCodique(?int $codique): self
    {
        $this->codique = $codique;

        return $this;
    }

    public function getIdgest(): ?int
    {
        return $this->idgest;
    }

    public function setIdgest(?int $idgest): self
    {
        $this->idgest = $idgest;

        return $this;
    }

    public function getIdcreances(): ?int
    {
        return $this->idcreances;
    }

    public function setIdcreances(?int $idcreances): self
    {
        $this->idcreances = $idcreances;

        return $this;
    }

    public function getNomcreance(): ?string
    {
        return $this->nomcreance;
    }

    public function setNomcreance(?string $nomcreance): self
    {
        $this->nomcreance = $nomcreance;

        return $this;
    }

    public function getStival(): ?float
    {
        return $this->stival;
    }

    public function setStival(?float $stival): self
    {
        $this->stival = $stival;

        return $this;
    }

    public function getOrval(): ?float
    {
        return $this->orval;
    }

    public function setOrval(?float $orval): self
    {
        $this->orval = $orval;

        return $this;
    }

    public function getOsvteval(): ?float
    {
        return $this->osvteval;
    }

    public function setOsvteval(?float $osvteval): self
    {
        $this->osvteval = $osvteval;

        return $this;
    }

    public function getStfival(): ?float
    {
        return $this->stfival;
    }

    public function setStfival(?float $stfival): self
    {
        $this->stfival = $stfival;

        return $this;
    }

    public function getIsinit(): ?int
    {
        return $this->isinit;
    }

    public function setIsinit(?int $isinit): self
    {
        $this->isinit = $isinit;

        return $this;
    }

}
