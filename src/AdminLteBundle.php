<?php

namespace DigipolisGent\AdminLteBundle;

use DigipolisGent\AdminLteBundle\DependencyInjection\Compiler\WidgetCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AdminLteBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new WidgetCompilerPass());
    }
}
