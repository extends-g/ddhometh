<?php

namespace Dhome\Bundle\FixturesBundle\DataFixtures\ORM;

use Dhome\Bundle\AdminBundle\Model\InspirationInterface;
use Dhome\Bundle\AdminBundle\Model\PressCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\PressInterface;
use Dhome\Bundle\AdminBundle\Model\ProductCollectionCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\ProductCollectionInterface;
use Dhome\Bundle\AdminBundle\Model\ProjectCategoryInterface;
use Dhome\Bundle\AdminBundle\Model\ProjectInterface;
use Dhome\Bundle\MediaBundle\Model\CollectionImageInterface;
use Dhome\Bundle\MediaBundle\Model\InspirationImageInterface;
use Dhome\Bundle\MediaBundle\Model\PressImageInterface;
use Dhome\Bundle\MediaBundle\Model\ProjectImageInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dhome\Bundle\FixturesBundle\DataFixtures\DataFixture;
use Sylius\Component\User\Model\UserInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdminBundle extends DataFixture
{
    protected $path = '/../../Resources/fixtures';

    /**
     * @return null|UserInterface
     */
    public function getDemoUser()
    {
        return $this->container
            ->get('sylius.repository.user')
            ->findOneBy(['username' => 'admin'])
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $add = true;;
        $imageDummy = null;

        $finder = new Finder();
        foreach ($finder->files()->in(__DIR__.$this->path) as $dummy) {
            if ($add == true) {
                $imageDummy = $dummy;
            }

            $add = false;
        }

        for ($i = 1; $i <= 10; $i++) {
            $manager->persist($this->createInspirationImage($i, $imageDummy));
            $manager->persist($this->createInspiration($i));
        }

        for ($i = 1; $i <= 4; $i++) {
            $manager->persist($this->createProjectCategory($i));
        }

        for ($i = 1; $i <= 20; $i++) {
            $manager->persist($this->createProject($i));

            $finder = new Finder();
            foreach ($finder->files()->in(__DIR__.$this->path) as $img) {
                $manager->persist($this->createProjectImage($i, $img->getFilename(), $img));
            }
        }

        for ($i = 1; $i <= 4; $i++) {
            $manager->persist($this->createCollectionCategory($i));
        }

        for ($i = 1; $i <= 20; $i++) {
            $manager->persist($this->createCollection($i));
            $finder = new Finder();
            foreach ($finder->files()->in(__DIR__.$this->path) as $img) {
                $manager->persist($this->createCollectionImage($i, $img->getFilename(), $img));
            }
        }

        for ($i = 1; $i <= 4; $i++) {
            $manager->persist($this->createPressCategory($i));
        }

        for ($i = 1; $i <= 20; $i++) {
            $manager->persist($this->createPress($i));
            $finder = new Finder();
            foreach ($finder->files()->in(__DIR__.$this->path) as $img) {
                $manager->persist($this->createPressImage($i, $img->getFilename(), $img));
            }
        }

        $manager->flush();
    }

    protected function createInspirationImage($i, $img)
    {
        $uploader = $this->container->get('dhome.image_uploader');

        /** @var InspirationImageInterface  $image */
        $image = $this->container->get('dhome.factory.inspiration_image')->createNew();

        $image->setFile(new UploadedFile($img->getRealPath(), $img->getFilename()));
        $uploader->upload($image);

        $this->setReference('inspiration_image' . $i, $image);

        return $image;
    }

    /**
     * @param $i
     *
     * @return InspirationInterface
     */
    protected function createInspiration($i)
    {
        /**
         * @var InspirationInterface $inspiration
         */
        $inspiration = $this->container->get('dhome.factory.inspiration')->createNew();
        $inspiration->setTitle($this->faker->text(30));
        $inspiration->setSubTitle($this->faker->text(100));
        // todo faker html content
        $inspiration->setContent($this->faker->text(200));

        $inspiration->setUser($this->getDemoUser());
        $inspiration->setImage($this->getReference('inspiration_image' . $i));

        $this->setReference('inspiration' . $i, $inspiration);

        return $inspiration;
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
        $project->setName($this->faker->text(30));
        $project->setShortDescription($this->faker->text(100));
        // todo faker html content
        $project->setContent($this->faker->text(200));

        /** @var ProjectCategoryInterface $category */
        $category = $this->getReference('project_category' . rand(1, 4));
        $project->setCategory($category);
        $project->setUser($this->getDemoUser());

        $this->setReference('project' . $i, $project);

        return $project;
    }


    protected function createProjectImage($i, $filename, $img)
    {
        $uploader = $this->container->get('dhome.image_uploader');

        /** @var ProjectImageInterface $image */
        $image = $this->container->get('dhome.factory.project_image')->createNew();

        $image->setFile(new UploadedFile($img->getRealPath(), $img->getFilename()));
        $uploader->upload($image);

        $image->setProject($this->getReference('project' . $i));

        $this->setReference('project_image' . $i . $filename, $image);

        return $image;
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
        $collection->setName($this->faker->text(30));
        $collection->setShortDescription($this->faker->text(100));
        // todo faker html content
        $collection->setContent($this->faker->text(200));

        /** @var ProductCollectionCategoryInterface $category */
        $category = $this->getReference('collection_category' . rand(1, 4));
        $collection->setCategory($category);
        $collection->setUser($this->getDemoUser());

        $this->setReference('collection' . $i, $collection);

        return $collection;
    }

    protected function createCollectionImage($i, $filename, $img)
    {
        $uploader = $this->container->get('dhome.image_uploader');

        /** @var CollectionImageInterface  $image */
        $image = $this->container->get('dhome.factory.collection_image')->createNew();

        $image->setFile(new UploadedFile($img->getRealPath(), $img->getFilename()));
        $uploader->upload($image);

        $image->setCollection($this->getReference('collection' . $i));

        $this->setReference('collection_image' . $i . $filename, $image);

        return $image;
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
        $press->setName($this->faker->text(30));
        $press->setShortDescription($this->faker->text(100));
        // todo faker html content
        $press->setContent($this->faker->text(200));

        /** @var PressCategoryInterface $category */
        $category = $this->getReference('press_category' . rand(1, 4));
        $press->setCategory($category);
        $press->setUser($this->getDemoUser());

        $this->setReference('press' . $i, $press);

        return $press;
    }

    protected function createPressImage($i, $filename, $img)
    {
        $uploader = $this->container->get('dhome.image_uploader');

        /** @var PressImageInterface  $image */
        $image = $this->container->get('dhome.factory.press_image')->createNew();

        $image->setFile(new UploadedFile($img->getRealPath(), $img->getFilename()));
        $uploader->upload($image);

        $image->setPress($this->getReference('press' . $i));

        $this->setReference('press_image' . $i . $filename, $image);

        return $image;
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
