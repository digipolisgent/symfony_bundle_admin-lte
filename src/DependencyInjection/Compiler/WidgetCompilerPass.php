<?php

namespace Avdb\AdminLteBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Avdb\AdminLteBundle\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\Reference;

class WidgetCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $manager = $container->getDefinition(Configuration::WIDGET_MANAGER);

        foreach($container->findTaggedServiceIds(Configuration::TAG_WIDGET) as $id => $config) {
            $manager->addMethodCall('add', [new Reference($id), isset($config[0]['priority']) ? $config[0]['priority'] : null]);
        }
    }
}
