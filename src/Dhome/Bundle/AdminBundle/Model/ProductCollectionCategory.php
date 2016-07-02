<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ProductCollectionCategory implements ProductCollectionCategoryInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var Collection|ProductCollectionInterface[]
     */
    protected $productCollections;

    public function __construct()
    {
        $this->productCollections = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * {@inheritdoc}
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductCollections()
    {
        return $this->productCollections;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductCollections(Collection $productCollections)
    {
        if (!$productCollections instanceof Collection) {
            $productCollections = new ArrayCollection($productCollections);
        }

        /** @var ProductCollectionInterface $productCollection */
        foreach($productCollections as $productCollection) {
            $productCollection->setCategory($this);
        }

        $this->productCollections = $productCollections;
    }

    /**
     * {@inheritdoc}
     */
    public function hasProductCollection(ProductCollectionInterface $productCollection)
    {
        return $this->productCollections->contains($productCollection);
    }

    /**
     * {@inheritdoc}
     */
    public function addProductCollection(ProductCollectionInterface $productCollection)
    {
        if (!$this->hasProductCollection($productCollection)) {
            $productCollection->setCategory($this);
            $this->productCollections->add($productCollection);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeProductCollection(ProductCollectionInterface $productCollection)
    {
        if ($this->hasProductCollection($productCollection)) {
            $productCollection->setCategory(null);
            $this->productCollections->removeElement($productCollection);
        }
    }
}
