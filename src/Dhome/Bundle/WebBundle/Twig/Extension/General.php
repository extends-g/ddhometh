<?php

namespace Dhome\Bundle\WebBundle\Twig\Extension;

use Dhome\Bundle\AdminBundle\Model\InspirationInterface;
use Dhome\Bundle\AdminBundle\Model\ProjectCategoryInterface;
use Symfony\Bridge\Twig\Extension\HttpKernelExtension;
use Symfony\Component\DependencyInjection\ContainerInterface;

class General extends \Twig_Extension
{
    /**
     * @var HttpKernelExtension
     */
    protected $httpKernelExtension;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param HttpKernelExtension $httpKernelExtension
     *
     * @deprecated Use $container
     */
    public function setHttpKernelExtension(HttpKernelExtension $httpKernelExtension)
    {
        $this->httpKernelExtension = $httpKernelExtension;
    }

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('dhome_latest_inspiration', array($this, 'getLatestInspiration')),
            new \Twig_SimpleFunction('dhome_project_submenu', array($this, 'getProjectSubmenu'))
        );
    }

    /**
     * @param $inspirationId
     *
     * @return null|InspirationInterface[]
     */
    public function getLatestInspiration($inspirationId)
    {
        $inspirationRepository = $this->container->get('dhome.repository.inspiration');

        return $inspirationRepository->findLatest($inspirationId);
    }

    /**
     * @return null|ProjectCategoryInterface[]
     */
    public function getProjectSubmenu()
    {
        return $this->container->get('dhome.repository.project_category')->findBy([], ['name' => 'ASC']);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dhome_ui_general';
    }
}
