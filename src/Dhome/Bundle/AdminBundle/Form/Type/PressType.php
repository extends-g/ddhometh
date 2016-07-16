<?php

namespace Dhome\Bundle\AdminBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class PressType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', 'dhome_press_category_choice', [
                'required' => true,
                'choice_label' => 'name',
                'empty_value' => 'Please select press category.',
                'label' => 'Press category'
            ])

            ->add('name', 'text', [
                'label' => 'Name',
                'required' => true
            ])

            ->add('shortDescription', 'text', [
                'label' => 'Short description',
                'required' => true
            ])

            ->add('content', 'textarea', [
                'label' => 'content',
                'attr' => array(
                    'class' => 'tinymce',
                ),
                'required' => true,
            ])

            ->add('videoLink', 'url', [
                'required' => false,
                'label' => 'Video link'
            ])

            ->add('images', 'collection', [
                'type' => 'dhome_press_image',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'Press image',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dhome_press';
    }
}
