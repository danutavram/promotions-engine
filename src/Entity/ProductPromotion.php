<?php

namespace App\Entity;

use App\Repository\ProductPromotionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductPromotionRepository::class)]
class ProductPromotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'productPromotions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Promotion $promotion = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $validTo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $promotion): static
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get the value of validTo
     */ 
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * Set the value of validTo
     *
     * @return  self
     */ 
    public function setValidTo($validTo)
    {
        $this->validTo = $validTo;

        return $this;
    }
}
