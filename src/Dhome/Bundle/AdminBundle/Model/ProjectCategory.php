<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ProjectCategory implements ProjectCategoryInterface
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
     * @var Collection|ProjectInterface[]
     */
    protected $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
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
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * {@inheritdoc}
     */
    public function setProjects(Collection $projects)
    {
        if (!$projects instanceof Collection) {
            $projects = new ArrayCollection($projects);
        }

        /** @var ProjectInterface $project */
        foreach($projects as $project) {
            $project->setCategory($this);
        }

        $this->projects = $projects;
    }

    /**
     * {@inheritdoc}
     */
    public function hasProject(ProjectInterface $project)
    {
        return $this->projects->contains($project);
    }

    /**
     * {@inheritdoc}
     */
    public function addProject(ProjectInterface $project)
    {
        if (!$this->hasProject($project)) {
            $project->setCategory($this);
            $this->projects->add($project);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeProject(ProjectInterface $project)
    {
        if ($this->hasProject($project)) {
            $project->setCategory(null);
            $this->projects->removeElement($project);
        }
    }
}
