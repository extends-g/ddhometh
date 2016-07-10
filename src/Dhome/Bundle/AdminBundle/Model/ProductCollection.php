<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Dhome\Bundle\MediaBundle\Model\CollectionImageInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\User\Model\UserInterface;

class ProductCollection implements ProductCollectionInterface
{
    use TimestampableTrait;

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
    protected $shortDescription;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $videoLink;

    /**
     * @var ProductCollectionCategoryInterface
     */
    protected $category;

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * @var Collection|CollectionImageInterface[]
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
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * {@inheritdoc}
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
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
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * {@inheritdoc}
     */
    public function setCategory(ProductCollectionCategoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * [@inheritdoc}
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

        /** @var CollectionImageInterface $image */
        foreach($images as $image) {
            $image->setCollection($this);
        }

        $this->images = $images;
    }

    /**
     * {@inheritdoc}
     */
    public function hasImage(CollectionImageInterface $image)
    {
        return $this->images->contains($image);
    }

    /**
     * {@inheritdoc}
     */
    public function addImage(CollectionImageInterface $image)
    {
        if (!$this->hasImage($image)) {
            $image->setCollection($this);
            $this->images->add($image);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeImage(CollectionImageInterface $image)
    {
        if ($this->hasImage($image)) {
            $image->setCollection(null);
            $this->images->removeElement($image);
        }
    }
}
