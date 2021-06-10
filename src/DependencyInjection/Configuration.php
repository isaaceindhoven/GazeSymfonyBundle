<?php

declare(strict_types=1);

namespace ISAAC\GazeSymfonyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('isaac_gaze_symfony');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('publisher')
                    ->children()
                        ->scalarNode('gazehub_url')->end()
                        ->scalarNode('private_key_content')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
