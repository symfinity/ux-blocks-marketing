<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class MarketingGlassShellCssTest extends TestCase
{
    private static function bundleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function heroAndContentSectionGlassShellUsesPhysicsHoverLift(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role=hero][data-ui-surface=glass]', $css);
        self::assertStringContainsString('[data-ui-role=content-section][data-ui-surface=glass]', $css);
        self::assertStringContainsString('translateY(var(--ui-physics-hover-lift))', $css);
    }
}
