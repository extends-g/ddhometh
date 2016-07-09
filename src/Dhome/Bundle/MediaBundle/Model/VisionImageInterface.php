<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\VisionInterface;

interface VisionImageInterface extends ImageInterface
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
     * @return VisionInterface
     */
    public function getVision();

    /**
     * @param VisionInterface $vision
     */
    public function setVision(VisionInterface $vision = null);
}
