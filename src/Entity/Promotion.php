<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;
use PHPUnit\Util\Json;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $name;

    #[ORM\Column(length: 255)]
    private ?string $type;

    #[ORM\Column]
    private ?float $adjustment;

    #[ORM\Column(type: 'json')]
    private $criteria = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of adjustment
     */ 
    public function getAdjustment()
    {
        return $this->adjustment;
    }

    /**
     * Set the value of adjustment
     *
     * @return  self
     */ 
    public function setAdjustment($adjustment)
    {
        $this->adjustment = $adjustment;

        return $this;
    }

    /**
     * Get the value of criteria
     */ 
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Set the value of criteria
     *
     * @return  self
     */ 
    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;

        return $this;
    }
}
