<?php

namespace Dhome\Bundle\FixturesBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker\Factory as FakerFactory;
use Faker\Generator;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Doctrine\Common\Persistence\ObjectManager;

abstract class DataFixture extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * Container.
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Alias to default language faker.
     *
     * @var Generator
     */
    protected $faker;

    /**
     * Faker.
     *
     * @var Generator
     */
    protected $fakers;

    /**
     * Default locale.
     *
     * @var string
     */
    protected $defaultLocale;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;

        if (null !== $container) {
            $this->defaultLocale = $container->getParameter('locale');
            $this->fakers[$this->defaultLocale] = FakerFactory::create($this->defaultLocale);
            $this->faker = $this->fakers[$this->defaultLocale];
        }

        $this->fakers['en_US'] = FakerFactory::create('en_US');
    }

    public function __call($method, $arguments)
    {
        $matches = [];
        if (preg_match('/^get(.*)Repository$/', $method, $matches)) {
            return $this->get('dhome.repository.'.$matches[1]);
        }
        if (preg_match('/^get(.*)Factory$/', $method, $matches)) {
            return $this->get('dhome.factory.'.$matches[1]);
        }

        return call_user_func_array([$this, $method], $arguments);
    }

    /**
     * Dispatch an event.
     *
     * @param string $name
     * @param object $object
     */
    protected function dispatchEvent($name, $object)
    {
        return $this->get('event_dispatcher')->dispatch($name, new GenericEvent($object));
    }

    /**
     * Get service by id.
     *
     * @param string $id
     *
     * @return object
     */
    protected function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * A string to underscore.
     *
     * @param string $id The string to underscore
     *
     * @return string The underscored string
     */
    public static function underscore($id)
    {
        return strtolower(preg_replace(array('/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/'), array('\\1_\\2', '\\1_\\2'), strtr($id, '_', '.')));
    }

    protected function generate($ObjFactory, array $object, $loop = 1, ObjectManager $manager)
    {

        for ($a = 0; $a < $loop; $a++) {
            $factory = $this->container->get($ObjFactory)->createNew();

            foreach ($object as $obj) {
                if (!isset($obj[2])) {
                    var_dump('No param');
                    $factory->$obj[0]($this->faker->$obj[1]);
                } else {
                    var_dump('Have param->'.$obj[2]);
                    $factory->$obj[0](
                        call_user_func_array(array($this->faker, $obj[1]), $obj[2])
                    );
                }
            }

            $this->setReference($ObjFactory . '.' . $a, $factory);
            var_dump($ObjFactory . '.' . $a);
            $manager->persist($factory);
        }
    }
}
