<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\User\Model\UserAwareInterface;

interface ProductCollectionInterface extends TimestampableInterface, ResourceInterface, UserAwareInterface
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

    /**
     * @return string
     */
    public function getVideoLink();

    /**
     * @param string $videoLink
     */
    public function setVideoLink($videoLink);
}
