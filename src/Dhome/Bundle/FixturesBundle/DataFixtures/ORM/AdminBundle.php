<?php

namespace Dhome\Bundle\FixturesBundle\DataFixtures\ORM;

use Dhome\Bundle\AdminBundle\Model\PressCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\PressInterface;
use Dhome\Bundle\AdminBundle\Model\ProductCollectionCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\ProductCollectionInterface;
use Dhome\Bundle\AdminBundle\Model\ProjectCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\ProjectInterface;
use Dhome\Bundle\AdminBundle\Model\VisionInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dhome\Bundle\FixturesBundle\DataFixtures\DataFixture;

class AdminBundle extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $manager->persist($this->createVision($i));
        }

        for ($i = 1; $i <= 4; $i++) {
            $manager->persist($this->createProjectCategory($i));
        }

        for ($i = 1; $i <= 20; $i++) {
            $manager->persist($this->createProject($i));
        }

        for ($i = 1; $i <= 4; $i++) {
            $manager->persist($this->createCollectionCategory($i));
        }

        for ($i = 1; $i <= 20; $i++) {
            $manager->persist($this->createCollection($i));
        }

        for ($i = 1; $i <= 4; $i++) {
            $manager->persist($this->createPressCategory($i));
        }

        for ($i = 1; $i <= 20; $i++) {
            $manager->persist($this->createPress($i));
        }

        $manager->flush();
    }

    /**
     * @param $i
     *
     * @return VisionInterface
     */
    protected function createVision($i)
    {
        /**
         * @var VisionInterface $vision
         */
        $vision = $this->container->get('dhome.factory.vision')->createNew();
        $vision->setTitle($this->faker->text(100));
        $vision->setSubTitle($this->faker->text(150));
        // todo faker html content
        $vision->setContent($this->faker->text(200));

        $this->setReference('vision' . $i, $vision);

        return $vision;
    }

    /**
     * @param $i
     *
     * @return ProjectCategoryInterface
     */
    protected function createProjectCategory($i)
    {
        // 4 cate.
        /**
         * @var ProjectCategoryInterface $projectCategory
         */
        $projectCategory = $this->container->get('dhome.factory.project_category')->createNew();
        $projectCategory->setName($this->faker->word);
        $projectCategory->setIcon($this->faker->randomElement(['beer', 'bars', 'cloud']));

        $this->setReference('project_category' . $i, $projectCategory);

        return $projectCategory;
    }

    /**
     * @param $i
     *
     * @return ProjectInterface
     */
    protected function createProject($i)
    {
        /**
         * @var ProjectInterface $project
         */
        $project = $this->container->get('dhome.factory.project')->createNew();
        $project->setName($this->faker->text(70));
        $project->setShortDescription($this->faker->text(100));
        // todo faker html content
        $project->setContent($this->faker->text(200));

        /** @var ProjectCategoryInterface $category */
        $category = $this->getReference('project_category' . rand(1, 4));
        $project->setCategory($category);

        $this->setReference('project' . $i, $project);

        return $project;
    }

    /**
     * @param $i
     *
     * @return ProductCollectionCategoryInterface
     */
    protected function createCollectionCategory($i)
    {
        /**
         * @var ProductCollectionCategoryInterface $collectionCategory
         */
        $collectionCategory = $this->container->get('dhome.factory.collection_category')->createNew();
        $collectionCategory->setName($this->faker->word);
        $collectionCategory->setIcon($this->faker->randomElement(['beer', 'bars', 'cloud']));

        $this->setReference('collection_category' . $i, $collectionCategory);

        return $collectionCategory;
    }

    /**
     * @param $i
     *
     * @return ProductCollectionInterface
     */
    protected function createCollection($i)
    {
        /**
         * @var ProductCollectionInterface $collection
         */
        $collection = $this->container->get('dhome.factory.collection')->createNew();
        $collection->setName($this->faker->text(70));
        $collection->setShortDescription($this->faker->text(100));
        // todo faker html content
        $collection->setContent($this->faker->text(200));

        /** @var ProductCollectionCategoryInterface $category */
        $category = $this->getReference('collection_category' . rand(1, 4));
        $collection->setCategory($category);

        $this->setReference('collection' . $i, $collection);

        return $collection;
    }

    /**
     * @param $i
     *
     * @return PressCategoryInterface
     */
    protected function createPressCategory($i)
    {
        /**
         * @var PressCategoryInterface $pressCategory
         */
        $pressCategory = $this->container->get('dhome.factory.press_category')->createNew();
        $pressCategory->setName($this->faker->word);
        $pressCategory->setIcon($this->faker->randomElement(['beer', 'bars', 'cloud']));

        $this->setReference('press_category' . $i, $pressCategory);

        return $pressCategory;
    }

    protected function createPress($i)
    {
        /**
         * @var PressInterface $press
         */
        $press = $this->container->get('dhome.factory.press')->createNew();
        $press->setName($this->faker->text(70));
        $press->setShortDescription($this->faker->text(100));
        // todo faker html content
        $press->setContent($this->faker->text(200));

        /** @var PressCategoryInterface $category */
        $category = $this->getReference('press_category' . rand(1, 4));
        $press->setCategory($category);

        $this->setReference('press' . $i, $press);

        return $press;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        // todo: user is 1
        return 2;
    }
}
