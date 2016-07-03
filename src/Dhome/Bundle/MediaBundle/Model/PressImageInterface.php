<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\PressInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface PressImageInterface extends TimestampableInterface, ResourceInterface
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
     * @return PressInterface
     */
    public function getPress();

    /**
     * @param PressInterface $press
     */
    public function setPress(PressInterface $press);

    /**
     * @return string
     */
    public function getSelfImagePath();

    /**
     * @return string
     */
    public function getMediaPath();
}
