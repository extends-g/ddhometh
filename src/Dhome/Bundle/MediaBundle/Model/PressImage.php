<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\PressInterface;

class PressImage extends Image implements PressImageInterface
{
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
    public function getPress()
    {
        return $this->press;
    }

    /**
     * {@inheritdoc}
     */
    public function setPress(PressInterface $press = null)
    {
        $this->press = $press;
    }
}
