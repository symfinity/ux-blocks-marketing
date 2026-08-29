<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig;

use Symfony\Component\HttpKernel\KernelInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class UxBlocksMarketingTwigExtension extends AbstractExtension
{
    public function __construct(
        private readonly KernelInterface $kernel,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('ux_blocks_marketing_extended_available', $this->isExtendedAvailable(...)),
        ];
    }

    public function isExtendedAvailable(): bool
    {
        // Post-054: marketing flyouts compose live-tier DropdownMenu (stl), not extended compounds.
        $bundleClass = 'Symfinity\\UxBlocksLive\\SymfinityUxBlocksLiveBundle';

        if (!class_exists($bundleClass)) {
            return false;
        }

        foreach ($this->kernel->getBundles() as $bundle) {
            if ($bundle::class === $bundleClass) {
                return true;
            }
        }

        return false;
    }
}
