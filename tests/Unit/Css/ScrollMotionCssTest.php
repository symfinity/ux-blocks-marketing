<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksMarketing\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ScrollMotionCssTest extends TestCase
{
    private static function motionCss(string $file): string
    {
        $path = \dirname(__DIR__, 3) . '/assets/styles/motion/' . $file;
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    #[DataProvider('scrollViewRoleCssProvider')]
    public function scrollViewRolesUseDoubleGateAndFillModeBoth(string $file, string $selector): void
    {
        $css = self::motionCss($file);

        self::assertStringContainsString('@media (prefers-reduced-motion: no-preference)', $css);
        self::assertStringContainsString('@supports (animation-timeline: view()) and (animation-range: 0% 100%)', $css);
        self::assertStringContainsString($selector, $css);
        self::assertStringContainsString('animation-fill-mode: both', $css);
        self::assertStringContainsString('animation-timeline: view()', $css);
    }

    /** @return array<string, array{0: string, 1: string}> */
    public static function scrollViewRoleCssProvider(): array
    {
        return [
            'hero fade-up' => ['hero.css', '.ux-motion-hero--fade-up'],
            'hero blur-in' => ['hero.css', '.ux-motion-hero--blur-in'],
            'cta slide-in' => ['cta-band.css', '.ux-motion-cta--slide-in'],
            'bento stagger' => ['bento-grid.css', '.ux-motion-bento--stagger-reveal [data-ui-motion-item]'],
            'stats stagger-fade' => ['stats-band.css', '.ux-motion-stats--stagger-fade [data-ui-motion-item]'],
        ];
    }

    #[Test]
    public function heroGradientShiftUsesTimeBasedCssOnly(): void
    {
        $css = self::motionCss('hero.css');

        self::assertStringContainsString('.ux-motion-hero--gradient-shift', $css);
        self::assertStringContainsString('animation-iteration-count: infinite', $css);
        self::assertDoesNotMatchRegularExpression(
            '/\\.ux-motion-hero--gradient-shift\\s*\\{[^}]*animation-timeline:/s',
            $css,
        );
    }

    #[Test]
    public function ctaPulseGlowUsesTimeBasedKeyframes(): void
    {
        $css = self::motionCss('cta-band.css');

        self::assertStringContainsString('@keyframes ux-motion-cta-pulse-glow', $css);
        self::assertStringContainsString('.ux-motion-cta--pulse-glow', $css);
        self::assertDoesNotMatchRegularExpression(
            '/\\.ux-motion-cta--pulse-glow\\s*\\{[^}]*animation-timeline:/s',
            $css,
        );
    }

    #[Test]
    public function staggerRolesUseStaggerIndexToken(): void
    {
        foreach (['bento-grid.css', 'stats-band.css'] as $file) {
            $css = self::motionCss($file);
            self::assertStringContainsString(
                'calc(var(--ux-motion-stagger-index, 0) * var(--ui-motion-duration-fast))',
                $css,
                $file,
            );
        }
    }

    #[Test]
    public function reducedMotionBaseStillSuppressesMarketingMotionClasses(): void
    {
        $css = (string) file_get_contents(\dirname(__DIR__, 3) . '/assets/styles/motion/_motion-base.css');

        self::assertStringContainsString('@media (prefers-reduced-motion: reduce)', $css);
        self::assertStringContainsString('.ux-motion-hero--fade-up', $css);
        self::assertStringContainsString('.ux-motion-bento--stagger-reveal', $css);
        self::assertStringContainsString('animation: none !important', $css);
    }
}
