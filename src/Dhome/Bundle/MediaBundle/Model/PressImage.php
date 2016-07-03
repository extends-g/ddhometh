<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\PressInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

class PressImage implements PressImageInterface
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
     * @var PressInterface
     */
    protected $press;

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
    public function getPress()
    {
        return $this->press;
    }

    /**
     * {@inheritdoc}
     */
    public function setPress(PressInterface $press)
    {
        $this->press = $press;
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
        return '/press';
    }
}
