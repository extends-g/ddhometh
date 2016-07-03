<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Dhome\Bundle\MediaBundle\Model\PressImageInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\User\Model\UserAwareInterface;

interface PressInterface extends TimestampableInterface, ResourceInterface, UserAwareInterface
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
     * @return PressCategoryInterface
     */
    public function getCategory();

    /**
     * @param PressCategoryInterface $category
     */
    public function setCategory(PressCategoryInterface $category);

    /**
     * @return string
     */
    public function getVideoLink();

    /**
     * @param string $videoLink
     */
    public function setVideoLink($videoLink);

    /**
     * @return Collection|PressImageInterface[]
     */
    public function getImages();

    /**
     * @param Collection|PressImageInterface[] $images
     */
    public function setImages(Collection $images);

    /**
     * @param PressImageInterface $image
     *
     * @return boolean
     */
    public function hasImage(PressImageInterface $image);

    /**
     * @param PressImageInterface $image
     */
    public function addImage(PressImageInterface $image);

    /**
     * @param PressImageInterface $image
     */
    public function removeImage(PressImageInterface $image);
}
