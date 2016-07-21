<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Dhome\Bundle\MediaBundle\Model\InspirationImageInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\User\Model\UserAwareInterface;

interface InspirationInterface extends ResourceInterface, TimestampableInterface, UserAwareInterface
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
     * @return InspirationImageInterface
     */
    public function getImage();

    /**
     * @param InspirationImageInterface $image
     */
    public function setImage(InspirationImageInterface $image);
}
