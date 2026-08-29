<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Css;

/**
 * Wraps tier role CSS in the Chameleon {@code blocks.marketing} cascade layer without requiring ui-kernel.
 */
final class TierCascadeLayerWrap
{
    public const BLOCKS_MARKETING = 'blocks.marketing';

    public static function wrap(string $layerName, string $css): string
    {
        $css = trim($css);
        if ($css === '') {
            return '';
        }

        if (str_starts_with(ltrim($css), "@layer {$layerName}")) {
            return $css;
        }

        return "@layer {$layerName} {\n{$css}\n}";
    }
}
