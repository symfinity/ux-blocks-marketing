<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * 120 SC-003 — primary role selector inventory for coverage measurement.
 */
final class RoleSelectorInventoryTest extends TestCase
{
    /**
     * Literal selector inventory — scanned by {@see \Symfinity\UxBlocks\DevTools\CssSelectorCoverageReporter}.
     */
    private const SELECTOR_INVENTORY = <<<'SELECTORS'
[data-ui-role="banner"]
[data-ui-role="bento-grid"]
[data-ui-role="comparison-section"]
[data-ui-role="content-section"]
[data-ui-role="cookie-consent"]
[data-ui-role="cta-band"]
[data-ui-role="error-page-404"]
[data-ui-role="faq"]
[data-ui-role="feature-section"]
[data-ui-role="flyout-menu-marketing"]
[data-ui-role="footer"]
[data-ui-role="header-marketing"]
[data-ui-role="hero"]
[data-ui-role="integrations-section"]
[data-ui-role="landing-page"]
[data-ui-role="logo-cloud"]
[data-ui-role="newsletter"]
[data-ui-role="pricing-section"]
[data-ui-role="stats-band"]
[data-ui-role="status-band"]
[data-ui-role="team"]
[data-ui-role="testimonials"]
SELECTORS;

    private static function bundleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function bundleIncludesPrimaryRoleSelectors(): void
    {
        $css = self::bundleCss();

        foreach (self::inventoryRoles() as $role) {
            self::assertTrue(
                str_contains($css, '[data-ui-role="' . $role . '"]')
                || str_contains($css, '[data-ui-role=' . $role . ']'),
                $role,
            );
        }
    }

    /**
     * @return list<string>
     */
    private static function inventoryRoles(): array
    {
        preg_match_all('/\[data-ui-role="([^"]+)"\]/', self::SELECTOR_INVENTORY, $matches);

        return $matches[1];
    }
}
