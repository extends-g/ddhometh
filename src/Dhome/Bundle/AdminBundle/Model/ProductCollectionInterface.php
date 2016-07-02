<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface ProductCollectionInterface extends TimestampableInterface, ResourceInterface
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
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription);

    /**
     * @return string
     */
    public function getShortDescription();

    /**
     * @param string $content
     */
    public function setContent($content);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return ProductCollectionCategoryInterface
     */
    public function getCategory();

    /**
     * @param ProductCollectionCategoryInterface $category
     */
    public function setCategory(ProductCollectionCategoryInterface $category);
}
