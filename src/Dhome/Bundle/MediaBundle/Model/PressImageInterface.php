<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\PressInterface;

interface PressImageInterface extends ImageInterface
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
     * @return PressInterface
     */
    public function getPress();

    /**
     * @param PressInterface $press
     */
    public function setPress(PressInterface $press = null);
}
