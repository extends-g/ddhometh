<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\VisionInterface;

class VisionImage extends Image implements VisionImageInterface
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
     * @var VisionInterface
     */
    protected $vision;

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
    public function setPosition($position = 1)
    {
        $this->position = $position;
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
    public function setVision(VisionInterface $vision = null)
    {
        $this->vision = $vision;
    }
}
