<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Css;

final class BlocksMarketingCssProvider
{
    public function __construct(
        private readonly string $packageDir,
    ) {
    }

    public function assetPath(): string
    {
        return 'ux-blocks-marketing/styles/blocks-marketing.css';
    }

    public function stylesheet(): string
    {
        $bundle = $this->packageDir . '/assets/styles/roles/_bundle.css';
        if (!is_readable($bundle)) {
            return '';
        }

        return (string) file_get_contents($bundle);
    }
}
