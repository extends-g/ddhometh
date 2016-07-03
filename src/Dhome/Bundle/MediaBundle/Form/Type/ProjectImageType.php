<?php

namespace Dhome\Bundle\MediaBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class ProjectImageType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dhome_project_image';
    }
}
