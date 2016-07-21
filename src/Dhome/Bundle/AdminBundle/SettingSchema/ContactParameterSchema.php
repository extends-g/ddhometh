<?php

namespace Dhome\Bundle\AdminBundle\SettingSchema;

use Sylius\Bundle\SettingsBundle\Schema\SchemaInterface;
use Sylius\Bundle\SettingsBundle\Schema\SettingsBuilderInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactParameterSchema implements SchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildSettings(SettingsBuilderInterface $builder)
    {
        $builder
            ->setDefaults(array(
                'webName' => 'DDHOMETH',
                'companyNameTH' => 'บริษัท ดี ดีไซต์ แอท โฮม',
                'companyNameEN' => 'DDesign at home',
                'address' => 'DD DESIGN AT HOME Minburi Minburi, Bangkok 11111',
                'tel' => '+662-345-6789',
                'fax' => '-345-6789',
                'email' => 'info@ddhometh.com',
                'website' => 'https://www.ddhometh.com',
                'latitude' => '13.8888909',
                'longitude' => '100.8028104',
                'facebook' => 'http://facebook.com/ddhometh',
                'facebook_app' => 'http://app.facebook.com/ddhometh',
                'twitter' => 'http://twitter.com/ddhometh',
                'twitter_app' => 'http://app.twitter.com/ddhometh',
                'instagram' => 'http://instagram.com/ddhometh',
                'instagram_app' => 'http://app.instagram.com/ddhometh',
                'line' => 'http://line.com/ddhometh',
                'line_app' => 'http://app.line.com/ddhometh',
            ))
            ->setAllowedTypes(array(
                'webName' => array('string', 'null'),
                'companyNameTH' => array('string', 'null'),
                'companyNameEN' => array('string', 'null'),
                'address' => array('string', 'null'),
                'tel' => array('string', 'null'),
                'fax' => array('string', 'null'),
                'email' => array('string', 'null'),
                'website' => array('string', 'null'),
                'latitude' => array('string', 'null'),
                'longitude' => array('string', 'null'),
                'facebook' => array('string', 'null'),
                'facebook_app' => array('string', 'null'),
                'twitter' => array('string', 'null'),
                'twitter_app' => array('string', 'null'),
                'instagram' => array('string', 'null'),
                'instagram_app' => array('string', 'null'),
                'line' => array('string', 'null'),
                'line_app' => array('string', 'null'),
            ))
        ;
    }

    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder)
    {
        $builder
            ->add('webName', 'text', array(
                'label' => 'Web name',
                'constraints' => array(
                    new NotBlank(),
                ),
            ))
            ->add('companyNameTH', 'text', array(
                'label' => 'Company name (TH)',
                'constraints' => array(
                    new NotBlank(),
                ),
            ))
            ->add('companyNameEN', 'text', array(
                'label' => 'Company name (EN)',
                'constraints' => array(
                    new NotBlank(),
                ),
            ))
            ->add('address', 'textarea', array(
                'label' => 'Address',
                'constraints' => array(
                    new NotBlank(),
                ),
            ))
            ->add('tel', 'text', array(
                'label' => 'Tel',
                'constraints' => array(
                    new NotBlank(),
                ),
            ))
            ->add('fax', 'text', array(
                'label' => 'Fax',
                'required' => false
            ))
            ->add('email', 'email', array(
                'label' => 'E-Mail',
                'required' => false
            ))
            ->add('website', 'url', array(
                'label' => 'Website',
                'required' => false,
            ))
            ->add('latitude', 'text', array(
                'label' => 'Latitude',
                'required' => false,
            ))
            ->add('longitude', 'text', array(
                'label' => 'Longitude',
                'required' => false,
            ))
            ->add('facebook', 'url', array(
                'label' => 'Facebook',
                'required' => false
            ))
            ->add('facebook_app', 'text', array(
                'label' => 'Facebook App',
                'required' => false
            ))
            ->add('twitter', 'url', array(
                'label' => 'Twitter',
                'required' => false
            ))
            ->add('twitter_app', 'text', array(
                'label' => 'Twitter App',
                'required' => false
            ))
            ->add('instagram', 'text', array(
                'label' => 'Instagram',
                'required' => false
            ))
            ->add('instagram_app', 'text', array(
                'label' => 'Instagram App',
                'required' => false
            ))
            ->add('line', 'text', array(
                'label' => 'LINE',
                'required' => false
            ))
            ->add('line_app', 'text', array(
                'label' => 'LINE App',
                'required' => false
            ))
        ;
    }
}
