<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\VisionInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

class VisionImage implements VisionImageInterface
{
    use TimestampableTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $position = 1;

    /**
     * @var ImageInterface
     */
    protected $image;

    /**
     * @var VisionInterface
     */
    protected $vision;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * {@inheritdoc}
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * {@inheritdoc}
     */
    public function setImage(ImageInterface $image = null)
    {
        $this->image = $image;
    }

    /**
     * {@inheritdoc}
     */
    public function getVision()
    {
        return $this->vision;
    }

    /**
     * {@inheritdoc}
     */
    public function setVision(VisionInterface $vision)
    {
        $this->vision = $vision;
    }

    /**
     * {@inheritdoc}
     */
    public function getSelfImagePath()
    {
        if (!$this->image) {
            return;
        }
        return ltrim($this->image->getMediaId(), '/');
    }

    /**
     * {@inheritdoc}
     */
    public function getMediaPath()
    {
        return '/vision';
    }
}
