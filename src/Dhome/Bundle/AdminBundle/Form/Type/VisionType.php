<?php

namespace Dhome\Bundle\AdminBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class VisionType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', [
                'label' => 'Title',
            ])
            ->add('subTitle', 'text', [
                'label' => 'Sub Title',
            ])
            ->add('content', 'textarea', [
                'label' => 'content',
                'attr' => array(
                    'class' => 'tinymce',
                )
            ])
            ->add('images', 'collection', [
                'type' => 'dhome_vision_image',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'Vision image',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dhome_vision';
    }
}
