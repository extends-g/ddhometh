<?php

namespace Dhome\Bundle\FixturesBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class DhomeFixturesBundle extends AbstractResourceBundle
{
    protected $mappingFormat = self::MAPPING_YAML;

    /**
     * {@inheritdoc}
     */
    public function getSupportedDrivers()
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ];
    }
}
