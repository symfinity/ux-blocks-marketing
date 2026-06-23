<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig;

use Symfinity\UxBlocksMarketing\Css\BlocksMarketingCssProvider;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class BlocksMarketingStylesExtension extends AbstractExtension
{
    public function __construct(
        private readonly BlocksMarketingCssProvider $cssProvider,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('ux_blocks_marketing_stylesheet', $this->cssProvider->stylesheet(...), ['is_safe' => ['html']]),
        ];
    }
}
