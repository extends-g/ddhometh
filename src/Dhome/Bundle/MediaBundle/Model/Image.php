<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Sylius\Component\Resource\Model\TimestampableTrait;
use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image as CmfImage;

class Image implements ImageInterface
{
    use TimestampableTrait;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $mediaId;

    /**
     * @var CmfImage
     */
    protected $media;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * @param string $mediaId
     */
    public function setMediaId($mediaId)
    {
        $this->mediaId = $mediaId;
    }

    /**
     * @return CmfImage
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param CmfImage $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }
}
