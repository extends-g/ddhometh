<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class PressCategory implements PressCategoryInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var Collection|PressInterface[]
     */
    protected $presses;

    public function __construct()
    {
        $this->presses = new ArrayCollection();
    }

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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * {@inheritdoc}
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * {@inheritdoc}
     */
    public function getPresses()
    {
        return $this->presses;
    }

    /**
     * {@inheritdoc}
     */
    public function setPresses(Collection $presses)
    {
        if (!$presses instanceof Collection) {
            $presses = new ArrayCollection($presses);
        }

        /** @var PressInterface $press */
        foreach($presses as $press) {
            $press->setCategory($this);
        }

        $this->presses = $presses;
    }

    /**
     * {@inheritdoc}
     */
    public function hasPress(PressInterface $press)
    {
        return $this->presses->contains($press);
    }

    /**
     * {@inheritdoc}
     */
    public function addPress(PressInterface $press)
    {
        if (!$this->hasPress($press)) {
            $press->setCategory($this);
            $this->presses->add($press);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removePress(PressInterface $press)
    {
        if ($this->hasPress($press)) {
            $press->setCategory(null);
            $this->presses->removeElement($press);
        }
    }
}
