<?php

declare(strict_types=1);

namespace ISAAC\GazeSymfonyBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class ISAACGazeSymfonyExtension extends ConfigurableExtension
{
    /**
     * @param mixed[] $mergedConfig
     * @param ContainerBuilder $container
     * @throws Exception
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../config')
        );
        $loader->load('services.xml');

        $this->replacePublisherArguments($mergedConfig, $container);
    }

    /**
     * @param string[][] $config
     * @param ContainerBuilder $container
     */
    private function replacePublisherArguments(array $config, ContainerBuilder $container): void
    {
        $definition = $container->getDefinition('isaac_gaze_symfony.gazepublisher');
        $definition->replaceArgument(0, $config['publisher']['gazehub_url']);
        $definition->replaceArgument(1, $config['publisher']['private_key_content']);
    }
}
