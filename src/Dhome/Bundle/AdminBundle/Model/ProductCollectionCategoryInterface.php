<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductCollectionCategoryInterface extends ResourceInterface
{
    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $icon
     */
    public function setIcon($icon);

    /**
     * @return string
     */
    public function getIcon();

    /**
     * @return Collection|ProductCollectionInterface[]
     */
    public function getProductCollections();

    /**
     * @param Collection|ProductCollectionInterface[] $productCollections
     */
    public function setProductCollections(Collection $productCollections);

    /**
     * @param ProductCollectionInterface $productCollection
     *
     * @return boolean
     */
    public function hasProductCollection(ProductCollectionInterface $productCollection);

    /**
     * @param ProductCollectionInterface $productCollection
     */
    public function addProductCollection(ProductCollectionInterface $productCollection);

    /**
     * @param ProductCollectionInterface $productCollection
     */
    public function removeProductCollection(ProductCollectionInterface $productCollection);
}
