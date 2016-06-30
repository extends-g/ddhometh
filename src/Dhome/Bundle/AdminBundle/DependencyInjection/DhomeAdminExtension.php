<?php

namespace Dhome\Bundle\AdminBundle\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class DhomeAdminExtension extends AbstractResourceExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $config = $this->processConfiguration($this->getConfiguration($config, $container), $config);
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $this->registerResources('dhome', $config['driver'], $config['resources'], $container);

        // ถ้ามีไฟล์ config อื่นๆ มาเพิ่มในนี้
        $configFiles = [
            'services.yml',
        ];

        foreach ($configFiles as $configFile) {
            $loader->load($configFile);
        }

        // ถ้ามี class อื่นๆ ที่ custom เอามาเพิ่มในนี้ ดูตัวอย่างใน sylius เช่น
        /*$definition = $container->findDefinition('sylius.context.locale');
        $definition->replaceArgument(0, new Reference($config['storage']));

        $container
            ->getDefinition('sylius.form.type.locale_choice')
            ->setArguments([new Reference('sylius.repository.locale')])
        ;*/
    }
}
