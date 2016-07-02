<?php

namespace Dhome\Bundle\AdminBundle\Model;

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
     * @var ProductCollectionCategoryInterface
     */
    protected $category;

    /**
     * @var UserInterface
     */
    protected $user;

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
}
