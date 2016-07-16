<?php

namespace Dhome\Bundle\MediaBundle\Model;

use Dhome\Bundle\AdminBundle\Model\ProjectInterface;

class ProjectImage extends Image implements ProjectImageInterface
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
     * @var ProjectInterface
     */
    protected $project;

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
    public function getProject()
    {
        return $this->project;
    }

    /**
     * {@inheritdoc}
     */
    public function setProject(ProjectInterface $project = null)
    {
        $this->project = $project;
    }
}
