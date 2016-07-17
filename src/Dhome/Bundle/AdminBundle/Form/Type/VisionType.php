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
                'required' => true,
            ])

            ->add('subTitle', 'text', [
                'label' => 'Sub Title',
                'required' => true,
            ])

            ->add('content', 'textarea', [
                'label' => 'content',
                'attr' => array(
                    'class' => 'tinymce',
                ),
                'required' => true,
            ])

            ->add('image', 'dhome_vision_image', [
                'required' => false,
                'label' => 'Vision image'
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
