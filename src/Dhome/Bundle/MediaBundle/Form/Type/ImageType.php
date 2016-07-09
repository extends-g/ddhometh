<?php

namespace Dhome\Bundle\MediaBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;

class ImageType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dhome_image';
    }
}
