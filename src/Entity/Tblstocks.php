<?php

namespace App\Entity;

use App\Repository\TblstocksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TblstocksRepository::class)
 */
class Tblstocks
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
    private $idmenu;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $objet;

    /**
     * @ORM\Column(type="float")
     */
    private $valeurfac;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stiqte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $stival;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orqte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $orval;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $osvteqte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $osvteval;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $osauqte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $osauval;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stfqte;

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

    public function getIdmenu(): ?int
    {
        return $this->idmenu;
    }

    public function setIdmenu(?int $idmenu): self
    {
        $this->idmenu = $idmenu;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(?string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getValeurfac(): ?float
    {
        return $this->valeurfac;
    }

    public function setValeurfac(float $valeurfac): self
    {
        $this->valeurfac = $valeurfac;

        return $this;
    }

    public function getStiqte(): ?int
    {
        return $this->stiqte;
    }

    public function setStiqte(?int $stiqte): self
    {
        $this->stiqte = $stiqte;

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

    public function getOrqte(): ?int
    {
        return $this->orqte;
    }

    public function setOrqte(?int $orqte): self
    {
        $this->orqte = $orqte;

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

    public function getOsvteqte(): ?int
    {
        return $this->osvteqte;
    }

    public function setOsvteqte(?int $osvteqte): self
    {
        $this->osvteqte = $osvteqte;

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

    public function getOsauqte(): ?int
    {
        return $this->osauqte;
    }

    public function setOsauqte(?int $osauqte): self
    {
        $this->osauqte = $osauqte;

        return $this;
    }

    public function getOsauval(): ?float
    {
        return $this->osauval;
    }

    public function setOsauval(?float $osauval): self
    {
        $this->osauval = $osauval;

        return $this;
    }

    public function getStfqte(): ?int
    {
        return $this->stfqte;
    }

    public function setStfqte(?int $stfqte): self
    {
        $this->stfqte = $stfqte;

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
