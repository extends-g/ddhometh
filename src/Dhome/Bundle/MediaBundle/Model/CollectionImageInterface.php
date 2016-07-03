<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\ProductCollectionInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface CollectionImageInterface extends TimestampableInterface, ResourceInterface
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
     * @return ImageInterface
     */
    public function getImage();

    /**
     * @param ImageInterface $image
     */
    public function setImage(ImageInterface $image = null);

    /**
     * @return ProductCollectionInterface
     */
    public function getCollection();

    /**
     * @param ProductCollectionInterface $collection
     */
    public function setCollection(ProductCollectionInterface $collection);

    /**
     * @return string
     */
    public function getSelfImagePath();

    /**
     * @return string
     */
    public function getMediaPath();
}
