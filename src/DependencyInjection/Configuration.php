<?php

namespace Avdb\AdminLteBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    const ROOT_NODE      = 'avdb_admin_lite';
    const TAG_WIDGET     = 'admin_lte.widget';
    const WIDGET_MANAGER = 'admin_lte.widget.manager';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root(self::ROOT_NODE);

        return $treeBuilder;
    }
}
