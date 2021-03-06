<?php

namespace Dhome\Bundle\AdminBundle\DependencyInjection;

use Dhome\Bundle\AdminBundle\Controller\InspirationController;
use Dhome\Bundle\AdminBundle\Controller\PressController;
use Dhome\Bundle\AdminBundle\Controller\ProductCollectionController;
use Dhome\Bundle\AdminBundle\Controller\ProjectController;
use Dhome\Bundle\AdminBundle\Doctrine\ORM\InspirationRepository;
use Dhome\Bundle\AdminBundle\Form\Type\InspirationType;
use Dhome\Bundle\AdminBundle\Form\Type\PressCategoryType;
use Dhome\Bundle\AdminBundle\Form\Type\PressType;
use Dhome\Bundle\AdminBundle\Form\Type\ProductCollectionCategoryType;
use Dhome\Bundle\AdminBundle\Form\Type\ProductCollectionType;
use Dhome\Bundle\AdminBundle\Form\Type\ProjectCategoryType;
use Dhome\Bundle\AdminBundle\Form\Type\ProjectType;
use Dhome\Bundle\AdminBundle\Model\Inspiration;
use Dhome\Bundle\AdminBundle\Model\InspirationInterface;
use Dhome\Bundle\AdminBundle\Model\Press;
use Dhome\Bundle\AdminBundle\Model\PressCategory;
use Dhome\Bundle\AdminBundle\Model\PressCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\PressInterface;
use Dhome\Bundle\AdminBundle\Model\ProductCollection;
use Dhome\Bundle\AdminBundle\Model\ProductCollectionCategory;
use Dhome\Bundle\AdminBundle\Model\ProductCollectionCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\ProductCollectionInterface;
use Dhome\Bundle\AdminBundle\Model\Project;
use Dhome\Bundle\AdminBundle\Model\ProjectCategory;
use Dhome\Bundle\AdminBundle\Model\ProjectCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\ProjectInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Resource\Factory\Factory;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceChoiceType;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {

        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dhome_admin');

        $rootNode
            ->children()
            ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
            ->scalarNode('storage')->defaultValue('sylius.storage.session')->end()
            ->end()
        ;

        $this->addResourcesSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addResourcesSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('resources')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('inspiration')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Inspiration::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(InspirationInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(InspirationController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->defaultValue(InspirationRepository::class)->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->arrayNode('form')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('default')->defaultValue(InspirationType::class)->cannotBeEmpty()->end()
                                                ->scalarNode('choice')->defaultValue(ResourceChoiceType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                                ->arrayNode('validation_groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->arrayNode('default')
                                            ->prototype('scalar')->end()
                                            ->defaultValue(['dhome'])
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('project')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Project::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(ProjectInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ProjectController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->arrayNode('form')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('default')->defaultValue(ProjectType::class)->cannotBeEmpty()->end()
                                                ->scalarNode('choice')->defaultValue(ResourceChoiceType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                                ->arrayNode('validation_groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->arrayNode('default')
                                            ->prototype('scalar')->end()
                                            ->defaultValue(['dhome'])
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('project_category')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(ProjectCategory::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(ProjectCategoryInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->arrayNode('form')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('default')->defaultValue(ProjectCategoryType::class)->cannotBeEmpty()->end()
                                                ->scalarNode('choice')->defaultValue(ResourceChoiceType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                                ->arrayNode('validation_groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->arrayNode('default')
                                            ->prototype('scalar')->end()
                                            ->defaultValue(['dhome'])
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('collection')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(ProductCollection::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(ProductCollectionInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ProductCollectionController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->arrayNode('form')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('default')->defaultValue(ProductCollectionType::class)->cannotBeEmpty()->end()
                                                ->scalarNode('choice')->defaultValue(ResourceChoiceType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                                ->arrayNode('validation_groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->arrayNode('default')
                                            ->prototype('scalar')->end()
                                            ->defaultValue(['dhome'])
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('collection_category')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(ProductCollectionCategory::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(ProductCollectionCategoryInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->arrayNode('form')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('default')->defaultValue(ProductCollectionCategoryType::class)->cannotBeEmpty()->end()
                                                ->scalarNode('choice')->defaultValue(ResourceChoiceType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                                ->arrayNode('validation_groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->arrayNode('default')
                                            ->prototype('scalar')->end()
                                            ->defaultValue(['dhome'])
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('press')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Press::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(PressInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(PressController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->arrayNode('form')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('default')->defaultValue(PressType::class)->cannotBeEmpty()->end()
                                                ->scalarNode('choice')->defaultValue(ResourceChoiceType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                                ->arrayNode('validation_groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->arrayNode('default')
                                            ->prototype('scalar')->end()
                                            ->defaultValue(['dhome'])
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('press_category')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(PressCategory::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(PressCategoryInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->arrayNode('form')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('default')->defaultValue(PressCategoryType::class)->cannotBeEmpty()->end()
                                                ->scalarNode('choice')->defaultValue(ResourceChoiceType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                                ->arrayNode('validation_groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->arrayNode('default')
                                            ->prototype('scalar')->end()
                                            ->defaultValue(['dhome'])
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
