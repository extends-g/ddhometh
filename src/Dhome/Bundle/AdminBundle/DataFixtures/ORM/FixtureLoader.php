<?php

namespace Dhome\Bundle\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;

class FixtureLoader extends DataFixtureLoader implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getFixtures()
    {
        return array(
            __DIR__.'/Group.yml',
            __DIR__.'/Customer.yml',
            __DIR__.'/User.yml',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
