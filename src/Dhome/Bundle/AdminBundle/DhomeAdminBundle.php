<?php

namespace Dhome\Bundle\AdminBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class DhomeAdminBundle extends AbstractResourceBundle
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

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace()
    {
        return 'Dhome\Bundle\AdminBundle\Model';
    }
}
