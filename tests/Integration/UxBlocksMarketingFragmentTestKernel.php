<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Integration;

use Symfinity\UxBlocksCore\SymfinityUxBlocksCoreBundle;
use Symfinity\UxBlocksExtended\SymfinityUxBlocksExtendedBundle;
use Symfinity\UxBlocksMarketing\SymfinityUxBlocksMarketingBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\UX\StimulusBundle\StimulusBundle;
use Symfony\UX\TwigComponent\TwigComponentBundle;

/**
 * Stage B opt-in kernel: enables data-ui-fragment emission so composition
 * tests can assert composed-atom fragment ids (107 fragments default off).
 */
final class UxBlocksMarketingFragmentTestKernel extends Kernel
{
    use MicroKernelTrait;

    public function getProjectDir(): string
    {
        return \dirname(__DIR__, 2);
    }

    public function getCacheDir(): string
    {
        return $this->getProjectDir() . '/var/cache/fragment-' . $this->environment;
    }

    public function registerBundles(): array
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new StimulusBundle(),
            new TwigComponentBundle(),
            new SymfinityUxBlocksCoreBundle(),
            new SymfinityUxBlocksExtendedBundle(),
            new SymfinityUxBlocksMarketingBundle(),
        ];
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->extension('framework', [
            'secret' => 'test-secret',
            'test' => true,
            'router' => ['utf8' => true],
            'php_errors' => ['log' => false],
            'form' => false,
        ]);

        $container->extension('symfinity_ux_blocks_core', [
            'fragment_ids' => true,
        ]);

        $container->extension('twig_component', [
            'anonymous_template_directory' => 'components',
            'defaults' => [
                'Symfinity\\UxBlocksCore\\' => [
                    'template_directory' => 'components',
                    'name_prefix' => '',
                ],
                'Symfinity\\UxBlocksExtended\\' => [
                    'template_directory' => 'components',
                    'name_prefix' => '',
                ],
            ],
        ]);
    }
}
