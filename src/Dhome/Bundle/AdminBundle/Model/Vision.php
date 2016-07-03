<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Dhome\Bundle\MediaBundle\Model\VisionImageInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\User\Model\UserInterface;

class Vision implements VisionInterface
{
    use TimestampableTrait;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $subTitle;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $videoLink;

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * @var Collection|VisionImageInterface[]
     */
    protected $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
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
    public function setTitle($title)
    {
        $this->title = $title;
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
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function setUser(UserInterface $user = null)
    {
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getVideoLink()
    {
        return $this->videoLink;
    }

    /**
     * {@inheritdoc}
     */
    public function setVideoLink($videoLink)
    {
        $this->videoLink = $videoLink;
    }

    /**
     * {@inheritdoc}
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * {@inheritdoc}
     */
    public function setImages(Collection $images)
    {
        if (!$images instanceof Collection) {
            $images = new ArrayCollection($images);
        }

        /** @var VisionImageInterface $image */
        foreach($images as $image) {
            $image->setVision($this);
        }

        $this->images = $images;
    }

    /**
     * {@inheritdoc}
     */
    public function hasImage(VisionImageInterface $image)
    {
        return $this->images->contains($image);
    }

    /**
     * {@inheritdoc}
     */
    public function addImage(VisionImageInterface $image)
    {
        if (!$this->hasImage($image)) {
            $image->setVision($this);
            $this->images->add($image);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeImage(VisionImageInterface $image)
    {
        if ($this->hasImage($image)) {
            $image->setImage(null);
            $this->images->removeElement($image);
        }
    }
}
