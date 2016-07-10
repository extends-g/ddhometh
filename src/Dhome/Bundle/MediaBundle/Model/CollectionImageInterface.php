<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\ProductCollectionInterface;

interface CollectionImageInterface extends ImageInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return int
     */
    public function getPosition();

    /**
     * @param int $position
     */
    public function setPosition($position);

    /**
     * @return ProductCollectionInterface
     */
    public function getCollection();

    /**
     * @param ProductCollectionInterface $collection
     */
    public function setCollection(ProductCollectionInterface $collection = null);
}
