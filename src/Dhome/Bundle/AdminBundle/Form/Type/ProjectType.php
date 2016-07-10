<?php

namespace Dhome\Bundle\AdminBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class ProjectType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', 'dhome_project_category_choice', [
                'required' => true,
                'choice_label' => 'name',
                'empty_value' => 'Please select project category.',
                'label' => 'Project category'
            ])

            ->add('name', 'text', [
                'label' => 'Name',
                'required' => true
            ])

            ->add('shortDescription', 'text', [
                'label' => 'Short description',
                'required' => false
            ])

            ->add('content', 'textarea', [
                'label' => 'content',
                'attr' => array(
                    'class' => 'tinymce',
                )
            ])

            ->add('videoLink', 'url', [
                'required' => false,
                'label' => 'Video link'
            ])

            ->add('images', 'collection', [
                'type' => 'dhome_project_image',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'Project image',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dhome_project';
    }
}
