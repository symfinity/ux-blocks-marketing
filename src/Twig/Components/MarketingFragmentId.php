<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Twig\Components;

final class MarketingFragmentId
{
    public static function forRole(string $role, int $instance = 1): string
    {
        $base = 'blocks.marketing.' . $role;

        return $instance <= 1 ? $base : $base . '.' . $instance;
    }
}
