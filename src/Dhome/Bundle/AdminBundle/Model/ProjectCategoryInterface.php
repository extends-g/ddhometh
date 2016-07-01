<?php

namespace Dhome\Bundle\AdminBundle\Model;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProjectCategoryInterface extends ResourceInterface
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
     * @return Collection|ProjectInterface[]
     */
    public function getProjects();

    /**
     * @param Collection|ProjectInterface[] $projects
     */
    public function setProjects(Collection $projects);

    /**
     * @param ProjectInterface $project
     *
     * @return boolean
     */
    public function hasProject(ProjectInterface $project);

    /**
     * @param ProjectInterface $project
     */
    public function addProject(ProjectInterface $project);

    /**
     * @param ProjectInterface $project
     */
    public function removeProject(ProjectInterface $project);
}
