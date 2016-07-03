<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Dhome\Bundle\MediaBundle\Model\VisionImageInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\User\Model\UserAwareInterface;

interface VisionInterface extends ResourceInterface, TimestampableInterface, UserAwareInterface
{
    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $subTitle
     */
    public function setSubTitle($subTitle);

    /**
     * @return string
     */
    public function getSubTitle();

    /**
     * @param string $content
     */
    public function setContent($content);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return string
     */
    public function getVideoLink();

    /**
     * @param string $videoLink
     */
    public function setVideoLink($videoLink);

    /**
     * @return Collection|VisionImageInterface[]
     */
    public function getImages();

    /**
     * @param Collection|VisionImageInterface[] $images
     */
    public function setImages(Collection $images);

    /**
     * @param VisionImageInterface $image
     *
     * @return boolean
     */
    public function hasImage(VisionImageInterface $image);

    /**
     * @param VisionImageInterface $image
     */
    public function addImage(VisionImageInterface $image);

    /**
     * @param VisionImageInterface $image
     */
    public function removeImage(VisionImageInterface $image);
}
