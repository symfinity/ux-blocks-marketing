<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class BlocksMarketingCssTest extends TestCase
{
    private static function bundleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function bundleIncludesMarketingR2RoleSelectors(): void
    {
        $css = self::bundleCss();

        foreach (['comparison-section', 'status-band', 'hero', 'stats-band'] as $role) {
            self::assertStringContainsString('[data-ui-role=' . $role . ']', $css, $role);
        }

        self::assertStringContainsString('[data-ui-status-tone=operational]', $css);
    }
}
