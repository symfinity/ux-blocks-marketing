<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class SymfinityUxBlocksMarketingExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container): void
    {
        $container->prependExtensionConfig('twig', [
            'paths' => [
                \dirname(__DIR__, 2) . '/templates' => 'UxBlocksMarketing',
            ],
        ]);

        $container->prependExtensionConfig('twig_component', [
            'defaults' => [
                'Symfinity\\UxBlocksMarketing\\Twig\\Components\\' => [
                    'template_directory' => 'components',
                ],
            ],
        ]);
    }

    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(\dirname(__DIR__, 2) . '/config'));
        $loader->load('services.yaml');
    }
}
