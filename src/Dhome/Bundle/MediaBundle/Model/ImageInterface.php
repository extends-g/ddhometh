<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Symfony\Cmf\Bundle\MediaBundle\ImageInterface as CmfImageInterface;

interface ImageInterface extends ResourceInterface, TimestampableInterface
{
    /**
     * @return string
     */
    public function getMediaId();

    /**
     * @param string $mediaId
     */
    public function setMediaId($mediaId);

    /**
     * @return CmfImageInterface
     */
    public function getMedia();

    /**
     * @param CmfImageInterface $media
     */
    public function setMedia($media);
}
