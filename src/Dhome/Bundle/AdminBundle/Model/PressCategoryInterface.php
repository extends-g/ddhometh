<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface PressCategoryInterface extends ResourceInterface
{
    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $icon
     */
    public function setIcon($icon);

    /**
     * @return string
     */
    public function getIcon();

    /**
     * @return Collection|PressInterface[]
     */
    public function getPresses();

    /**
     * @param Collection|PressInterface[] $presses
     */
    public function setPresses(Collection $presses);

    /**
     * @param PressInterface $press
     *
     * @return boolean
     */
    public function hasPress(PressInterface $press);

    /**
     * @param PressInterface $press
     */
    public function addPress(PressInterface $press);

    /**
     * @param PressInterface $press
     */
    public function removePress(PressInterface $press);
}
