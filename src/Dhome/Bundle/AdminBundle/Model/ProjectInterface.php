<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Dhome\Bundle\MediaBundle\Model\ProjectImageInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\User\Model\UserAwareInterface;

interface ProjectInterface extends TimestampableInterface, ResourceInterface, UserAwareInterface
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
     * @return ProjectCategoryInterface
     */
    public function getCategory();

    /**
     * @param ProjectCategoryInterface $category
     */
    public function setCategory(ProjectCategoryInterface $category);

    /**
     * @return string
     */
    public function getVideoLink();

    /**
     * @param string $videoLink
     */
    public function setVideoLink($videoLink);

    /**
     * @return Collection|ProjectImageInterface[]
     */
    public function getImages();

    /**
     * @param Collection|ProjectImageInterface[] $images
     */
    public function setImages(Collection $images);

    /**
     * @param ProjectImageInterface $image
     *
     * @return boolean
     */
    public function hasImage(ProjectImageInterface $image);

    /**
     * @param ProjectImageInterface $image
     */
    public function addImage(ProjectImageInterface $image);

    /**
     * @param ProjectImageInterface $image
     */
    public function removeImage(ProjectImageInterface $image);

    /**
     * @return null|ProjectImageInterface
     */
    public function getFirstImage();
}
