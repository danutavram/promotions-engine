<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\OneToMany(targetEntity: ProductPromotion::class, mappedBy: 'product')]
    private $productPromotions;

    public function __construct()
    {
        $this->productPromotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ProductPromotion>
     */
    public function getProductPromotions(): Collection
    {
        return $this->productPromotions;
    }

    public function addProductPromotion(ProductPromotion $productPromotion): static
    {
        if (!$this->productPromotions->contains($productPromotion)) {
            $this->productPromotions->add($productPromotion);
            $productPromotion->setProduct($this);
        }

        return $this;
    }

    public function removeProductPromotion(ProductPromotion $productPromotion): static
    {
        if ($this->productPromotions->removeElement($productPromotion)) {
            // set the owning side to null (unless already changed)
            if ($productPromotion->getProduct() === $this) {
                $productPromotion->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}
